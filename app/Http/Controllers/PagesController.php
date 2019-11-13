<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function welcome()
    {
        return view('welcome');
    }

    public function back_to_tarnsaction()
    {
        dd($response->result);

    }
    public function tryout()
    {
        $user = auth()->user();
        $transaction['amountTotal'] = (FLOAT) 37.5;
        $transaction['note'] = 'Note for your transaction';
        $transaction['buyer_email'] = 'buyer@mailinator.com';
        $transaction['redirect_url'] = url('/back_to_tarnsaction');
        $transaction['currency2'] = 'BTC';
      
        /*
        *   @required true
        *   @example first item
        */
        $transaction['items'][] = [
          'itemDescription' => 'Product one',
          'itemPrice' => (FLOAT) 7.5, // USD
          'itemQty' => (INT) 1,
          'itemSubtotalAmount' => (FLOAT) 7.5 // USD
        ];
      
        /*
        *   @example second item
        */
        $transaction['items'][] = [
          'itemDescription' => 'Product two',
          'itemPrice' => (FLOAT) 10, // USD
          'itemQty' => (INT) 1,
          'itemSubtotalAmount' => (FLOAT) 10 // USD
        ];
      
        /*
        *   @example third item
        */
        $transaction['items'][] = [
          'itemDescription' => 'Product Three',
          'itemPrice' => (FLOAT) 10, // USD
          'itemQty' => (INT) 2,
          'itemSubtotalAmount' => (FLOAT) 20 // USD
        ];
      
        $transaction['payload'] = $user->id;
      
        $link = \CoinPayment::generatelink($transaction);

        return redirect($link);
    }
}
