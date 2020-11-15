<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Jobs\SubscriptionJob;


class OrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var $paytabsPage
     */
    protected $paytabsPage;

    /**
     * @var $orderData
     */
    protected $orderData;

    /**
     * @var $subscriptionData
     */
    protected $subscriptionData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($paytabsPage, $orderData, $subscriptionData)
    {
        $this->paytabsPage = $paytabsPage;
        $this->orderData = $orderData;
        $this->subscriptionData = $subscriptionData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
//            $orderData = [
//                'id_postalcode' => $request->id_postalcode, 'name_on_card' => $request->name_on_card,
//                'card_number' => $request->card_number, 'card_exp_month' => $request->card_exp_month, 'card_exp_year' => $request->card_exp_year,
//                'card_cvc' => $request->card_cvc,];
//
//            dd($this->orderData['id_email']);

            $order = Order::Create($this->orderData);

            $product_id = $this->orderData['product_id'];
            $order->products()->attach($product_id, [
                'sku' => $this->paytabsPage->original['productSku'],
                'price' => $this->paytabsPage->original['productPrice']
            ]);

            // queue job to create subscription(plan)
            $this->subscriptionData['order_id'] = $order->id;
            SubscriptionJob::dispatch($this->subscriptionData);

            return ['status' => true, 'message' => 'data is saved'];
        }catch (Exception $e){
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
