<?php

namespace App\Transformers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class OrderTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrderTransformer
{
    /**
     * Transform the Order entity.
     *
     * @param $request
     *
     * @return array
     */
    public function transform($request, $paytabsPage)
    {
        return [
            'user_id' => Auth::user()->id,
            'sessionId' => Session::getId(),
            'token' => sha1(time()),
            'status' => $request->status? $request->status : 'New',
            'total' => $paytabsPage->original['productPrice'],
            'subTotal' => $paytabsPage->original['netTotal'],
            'discount' => $request->discount ? $request->discount : 0,
            'itemDiscount' => $request->itemDiscount ? $request->itemDiscount : 0,
            'tax' => $request->tax ? $request->tax : 0,
            'grandTotal' => $request->grandTotal ? $request->grandTotal : 0,
            'promo' => $request->promo ? $request->promo : null,
            'content' => $request->content ? $request->content : '',
            'shipping' => $request->shipping ? $request->shipping : 0,
            'firstName' => $request->id_first_name,
            'lastName' => $request->id_last_name,
            'mobile' => $request->id_phone,
            'email' => $request->id_email,
            'line1' => $request->id_address_line_1,
            'line2' => $request->id_address_line_2 ? $request->id_address_line_2 : '',
            'city' => $request->id_city,
            'province' => $request->id_state,
            'country' => $request->id_state,
            'paytabsPageId' => $paytabsPage->original['p_id'],
            'product_id' => $request->product_id
        ];
    }
}
