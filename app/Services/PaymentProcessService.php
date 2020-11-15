<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\PaytabService;
use App\Helpers\Helpers;

class PaymentProcessService
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    /**
     * @var PaytabService
     */
    protected $paytabService;

    public function __construct(ProductRepository $repository, PaytabService $paytabService){
        $this->repository = $repository;
        $this->paytabService = $paytabService;
    }

    /**
     *
     * @return array | null
     */
    public function createPaytabsPage($request)
    {
        try {
            $product = $this->repository->find( $request->product_id);
            $netTotal = Helpers::computeNetTotal($product->price, $request->planPrice);

            $this->paytabService->paytabs(Helpers::getMerchantKey(), Helpers::getSecretKey());
            $result = $this->paytabService->create_pay_page(array(
                'merchant_email' => Helpers::getMerchantKey(),
                'secret_key' => Helpers::getSecretKey(),
                'cc_first_name' => $request->name_on_card,
                'cc_last_name' => $request->id_last_name,
                'cc_phone_number' => '00971',
                'phone_number' => $request->id_phone,
                'email' => $request->id_email,

                'billing_address' => $request->id_address_line_1,
                'city' => $request->id_city,
                'state' => $request->id_state,
                'postal_code' => $request->id_postalcode,
                'country' => $request->id_state,

                'address_shipping' => $request->id_address_line_1,
                'city_shipping' => $request->id_city,
                'state_shipping' => $request->id_state,
                'postal_code_shipping' => $request->id_postalcode,
                'country_shipping' => $request->id_state,

                "products_per_title" => $product->title,
                'quantity' => 1,
                'unit_price' => $netTotal,
                "other_charges" => 0,

                'amount' => $netTotal,
                'discount'=> 0,
                'currency' => "AED",

                'title' => $request->id_first_name,
                "msg_lang" => "en",
                "reference_no" => "1231231",

                "site_url" => Helpers::getSiteUrl(),
                'return_url' => Helpers::getReturnUrl(),
                "cms_with_version" => "API USING PHP",
                "paypage_info" => "1"
            ));

            if ($result->response_code === '4012'){
                $res = [
                    'status' => true, 'p_id' => $result->p_id, 'response_code' => $result->response_code,
                    'payment_url' => $result->payment_url, 'result' => $result->result, 'netTotal' => $netTotal,
                    'productPrice' => $product->price, 'productSku' => $product->sku,
                ];
                return response()->json($res);
            }
            else{
                $res = [
                    'status' => false,
                    'response_code' => $result->response_code,
                ];
                return response()->json($res);
            }
        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     *
     * @return array | null
     */
    public function paytabsVerifyPayment($request)
    {
        try {

            $this->paytabService->paytabs(Helpers::getMerchantKey(), Helpers::getSecretKey());
            $result = $this->paytabService->verify_payment($request->payment_reference);
            $res = [
                'status' => true, 'p_id' => $request->payment_reference, 'pt_invoice_id' => $result->pt_invoice_id,
                'amount' => $result->amount, 'currency' => $result->currency, 'reference_no' => $result->reference_no,
                'transaction_id' => $result->transaction_id, 'response' => $result->result, 'response_code' => $result->response_code
            ];
            return response()->json($res);

            return response()->json([ 'status' => false ]);
        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
