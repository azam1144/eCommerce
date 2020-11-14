<?php

namespace App\Services;

use App\Helpers\Helper;
use App\Repositories\ProductRepository;

class PaymentProcessService
{
    /**
     * @var ProductRepository
     */
    protected $repository;

    public function __construct(ProductRepository $repository){
        $this->repository = $repository;
    }

    /**
     *
     * @return array | null
     */
    public function performPayment($request)
    {
        // [id_email, id_first_name, id_last_name, id_phone, id_address_line_1, id_address_line_2, id_city, id_state, id_postalcode]
        // [name_on_card, card_number, card_exp_month, card_exp_year, card_cvc]
        try {
            $product = $this->repository->find( $request->product_id);
            $netTotal = Helper::computeNetTotal($product->price, $request->planPrice);

        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }
}
