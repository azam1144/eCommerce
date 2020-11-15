<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Order;

/**
 * Class OrderTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{
    /**
     * Transform the Order entity.
     *
     * @param \App\Models\Order $model
     *
     * @return array
     */
    public function transform($request)
    {
        return [
            'id_email' => $request->id_email,
            'id_first_name' => $request->id_first_name,
            'id_last_name' => $request->id_last_name,
            'id_phone' => $request->id_phone,
            'id_address_line_1' => $request->id_address_line_1,
            'id_city' => $request->id_city,
            'id_state' => $request->id_state,
            'id_postalcode' => $request->id_postalcode,
            'name_on_card' => $request->name_on_card,
            'card_number' => $request->card_number,
            'card_exp_month' => $request->card_exp_month,
            'card_exp_year' => $request->card_exp_year,
            'card_cvc' => $request->card_cvc,
            'planPrice' => $request->planPrice,
            'interest' => $request->interest,
            'plan' => $request->plan,
            'product_id' => $request->product_id
        ];
    }
}
