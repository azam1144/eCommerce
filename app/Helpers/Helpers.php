<?php

namespace App\Helpers;

class Helpers
{
    public static function computeNetTotal($productPrice, $planPrice){
        $planPrice = number_format($planPrice, 2, '.', '');
        $productPrice = number_format($productPrice, 2, '.', '');

        $netTotal = $productPrice;
        if ($productPrice > $planPrice)
            $netTotal = $productPrice - $planPrice;

        return $netTotal;
    }

    public static function getSecretKey(){
        return "Yusfazi8ox9YaohFQNhNiNPmkxo6srcrWFH6eZfCxoBINSnEGFsYshlMOKThb6J8LqfZqvBYUdGH53mMIOLb66YVQRd2XWbInqHN";
    }

    public static function getMerchantKey(){
        return "azam.arid1144@gmail.com";
    }

    public static function getReturnUrl(){
        return env('APP_URL')."/payment/transaction/success";
    }

    public static function getSiteUrl(){
        return "https://dmdmax.com";
    }

}
