<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



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

    public function sendLogin(Request $request)
    {
      $check = User::where('email', $request->email)->where('tokenz', $request->token)->first();
      if(!$check){
        Session::flash('msg', 'Un-Authrized, Your Token is incorect');
        return back();
      }

      User::where('email',$request->email )->update([
        'tokenz' => 'a'
         ]);
        Auth::login($check);

        return redirect()->route('login');
      
    }

    public function sendToken1(Request $request)
    {
      return view('auth.token');
    }

    public function sendToken(Request $request)
    {

      $check = User::where('email', $request->email)->first();
      $token = Str::random();
      
      if (!Hash::check($request->password, $check->password)) {
        Session::flash('msg', 'Un-Authrized, Your Email or Pass is Incorrect');
        return back();
      }

      User::where('email',$request->email )->update([
        'tokenz' => $token
         ]);

      $user = User::where('email',$request->email )->first();
      $to_name = $user->name;
      $to_email = $user->email;
      $data = array('name'=> $to_name, "body" => "Your 2FA code is ".$token);
      Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
      $message->to($to_email, $to_name)->subject('Login 2FA');
      $message->from('rhemaxcoin@rhemaxconglomerate.com','Login 2FA');
      });
      
      $dataz = [
        'email' => $user->email,
        'password' => $request->password
    ];

      Session::flash('msg', 'successful, Please check your email for your 2FA code');
      return redirect()->route('sendToken1');
     
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
