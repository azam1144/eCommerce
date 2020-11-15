<?php

namespace App\Jobs;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var $orderData
     */
    protected $orderData;

    /**
     * @var $payment
     */
    protected $payment;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($orderData, $payment)
    {
        $this->orderData = $orderData;
        $this->payment = $payment;
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
//                'card_cvc' => $request->card_cvc, 'planPrice' => $request->planPrice, 'interest' => $request->interest,
//                'plan' => $request->plan,  'product_id' => $request->product_id];
//
//            dd($this->orderData['id_email']);

            $order = Order::Create(
                [
                    'user_id' => Auth::user()->id,
                    'sessionId' => Session::getId(),
                    'token' => sha1(time()),
                    'status' => 'New',
                    'total' => $this->payment->original['productPrice'],
                    'subTotal' => $this->payment->original['netTotal'],
                    'firstName' => $this->orderData['id_first_name'],
                    'lastName' => $this->orderData['id_last_name'],
                    'mobile' => $this->orderData['id_phone'],
                    'email' => $this->orderData['id_email'],
                    'line1' => $this->orderData['id_address_line_1'],
                    'city' => $this->orderData['id_city'],
                    'province' => $this->orderData['id_state'],
                    'country' => $this->orderData['id_state'],
                    'paytabsPageId' => $this->payment->original['p_id'],
                ]
            );

            $product_id = $this->orderData['product_id'];
            $order->products()->attach($product_id, [
                'sku' => $this->payment->original['productSku'],
                'price' => $this->payment->original['productPrice']
            ]);

            return ['status' => true, 'message' => 'data is saved'];
        }catch (Exception $e){
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
