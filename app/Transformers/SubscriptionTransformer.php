<?php

namespace App\Transformers;

use Illuminate\Support\Facades\Auth;

/**
 * Class SubscriptionTransformer.
 *
 * @package namespace App\Transformers;
 */
class SubscriptionTransformer
{
    /**
     * Transform the Subscription entity.
     *
     * @param $request
     *
     * @return array
     */
    public function transform($request)
    {
        return [
            'plan' => $request->plan,
            'plan_price' => $request->planPrice,
            'interest' => $request->interest,
            'user_id' => Auth::user()->id,
            'order_id' => '',
        ];
    }
}
