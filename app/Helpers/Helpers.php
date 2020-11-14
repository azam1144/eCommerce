<?php
/**
 * Created by PhpStorm.
 * User: Bilal
 * Date: 12/17/2018
 * Time: 11:01 AM
 */
namespace App\Helpers;

use App\Models\Shop;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Helper
{
    public static function computeNetTotal($productPrice, $planPrice){
        $planPrice = number_format($planPrice, 2, '.', '');
        $productPrice = number_format($productPrice, 2, '.', '');

        $netTotal = $productPrice;
        if ($productPrice > $planPrice)
            $netTotal = $productPrice - $planPrice;

        return $netTotal;
    }
}
