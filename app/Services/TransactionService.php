<?php

namespace App\Services;

use App\Jobs\OrderJob;
use App\Models\User;
use App\Repositories\TransactionRepository;
use App\Transformers\TransactionTransformer;
use App\Transformers\OrderTransformer;
use App\Transformers\SubscriptionTransformer;
use App\Repositories\OrderRepository;
use App\Services\PaymentProcessService;

use Illuminate\Support\Facades\Notification;
use App\Notifications\TransactionsNotification;

class TransactionService
{
    /**
     * @var TransactionRepository
     */
    protected $repository;

    /**
     * @var TransactionTransformer
     */
    protected $transactionTransformer;

    /**
     * @var SubscriptionTransformer
     */
    protected $subscriptionTransformer;

    /**
     * @var OrderRepository
     */
    protected $orderRepository;

    /**
     * @var PaymentProcessService
     */
    protected $paymentProcessService;

    /**
     * @var OrderTransformer
     */
    protected $orderTransformer;

    public function __construct(
        TransactionRepository $repository,
        TransactionTransformer $transactionTransformer,
        OrderRepository $orderRepository,
        PaymentProcessService $paymentProcessService,
        OrderTransformer $orderTransformer,
        SubscriptionTransformer $subscriptionTransformer
    ){
        $this->repository = $repository;
        $this->orderRepository = $orderRepository;
        $this->paymentProcessService  = $paymentProcessService;
        $this->transactionTransformer  = $transactionTransformer;
        $this->orderTransformer  = $orderTransformer;
        $this->subscriptionTransformer  = $subscriptionTransformer;
    }

    /**
     *
     * @return array | null
     */
    public function paytabsPage($request)
    {
        try {
            //Create a new paytabs page
            $paytabsPage = $this->paymentProcessService->createPaytabsPage($request);

            //Transform the order-data to store a new order in db
            $orderData = $this->orderTransformer->transform($request, $paytabsPage);

            //Transform the subscription-data to store a new subscription in db
            $subscriptionData = $this->subscriptionTransformer->transform($request);

            // queue job to create order - it will in background - asynchronous behaviour
            OrderJob::dispatch( $paytabsPage, $orderData, $subscriptionData);

            return response()->json($paytabsPage);

        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
    /**
     *
     * @return array | null
     */
    public function transaction($request)
    {
        try {
            $order = $this->orderRepository->findWhere([ 'paytabsPageId' => $request->payment_reference ]);
            if (count($order) > 0){
                $order = $order[0];

                //varify paytabs payment to get transaction related information from paytabs API
                $payment = $this->paymentProcessService->paytabsVerifyPayment($request);

                //Transform the data to create a new transaction in db
                $transaction = $this->transactionTransformer->transform($order, $payment);
                $this->repository->create($transaction);

                $user = User::find($order->user_id);
                Notification::send($user, new TransactionsNotification($transaction));

                return ['status' => true];
            }

            return ['status' => false];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
