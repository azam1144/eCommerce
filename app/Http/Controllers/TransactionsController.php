<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TransactionCreateRequest;
use App\Http\Requests\TransactionUpdateRequest;
use App\Repositories\TransactionRepository;
use App\Validators\TransactionValidator;
use App\Services\PaymentProcessService;
use App\Jobs\OrderJob;

/**
 * Class TransactionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class TransactionsController extends Controller
{
    /**
     * @var PaymentProcessService
     */
    protected $repositoryService;

    /**
     * @var TransactionRepository
     */
    protected $repository;

    /**
     * @var TransactionValidator
     */
    protected $validator;

    /**
     * TransactionsController constructor.
     *
     * @param TransactionRepository $repository
     * @param TransactionValidator $validator
     */
    public function __construct(TransactionRepository $repository, TransactionValidator $validator, PaymentProcessService $repositoryService)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->repositoryService  = $repositoryService;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $transactions = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $transactions,
            ]);
        }

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TransactionCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(TransactionCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $transaction = $this->repository->create($request->all());

            $response = [
                'message' => 'Transaction created.',
                'data'    => $transaction->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $transaction,
            ]);
        }

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = $this->repository->find($id);

        return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TransactionUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(TransactionUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $transaction = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Transaction updated.',
                'data'    => $transaction->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Transaction deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Transaction deleted.');
    }


    /**
     * Create Paytab Page & order here.
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function paytabsPage(Request $request)
    {
        $payment = $this->repositoryService->performPayment($request);
        if (request()->wantsJson()) {
            return response()->json([
                'data' => $payment,
            ]);
        }

        $orderData = ['id_email' => $request->id_email, 'id_first_name' => $request->id_first_name, 'id_last_name' => $request->id_last_name,
            'id_phone' => $request->id_phone, 'id_address_line_1' => $request->id_address_line_1, 'id_city' => $request->id_city,
            'id_state' => $request->id_state, 'id_postalcode' => $request->id_postalcode, 'name_on_card' => $request->name_on_card,
            'card_number' => $request->card_number, 'card_exp_month' => $request->card_exp_month, 'card_exp_year' => $request->card_exp_year,
            'card_cvc' => $request->card_cvc, 'planPrice' => $request->planPrice, 'interest' => $request->interest,
            'plan' => $request->plan,  'product_id' => $request->product_id];


        // queue job to create order - it will in background - asynchronous behaviour
        OrderJob::dispatch($orderData, $payment);
        return response()->json($payment);
    }

    /**
     * Create Transaction history on successful payment .
     *
     * @param  Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentSuccess(Request $request)
    {
       dd($request->payment_reference);
    }
}
