<?php

namespace App\Transformers;

/**
 * Class TransactionTransformer.
 *
 * @package $request
 */
class TransactionTransformer
{

    public function transform($order, $payment)
    {
        return $transaction = [
            'user_id' => $order->user_id,
            'order_id' => $order->id,
            'mode' => 'Online',
            'response' => $payment->original['response'],
            'response_code' => $payment->original['response_code'],
            'amount' => $order->subTotal,
            'currency' => $payment->original['currency'],
            'pt_invoice_id' => $payment->original['pt_invoice_id'],
            'reference_no' => $payment->original['reference_no'],
            'transaction_id' => $payment->original['transaction_id']
        ];
    }
}
