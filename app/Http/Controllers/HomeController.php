<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Session;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\User;
use App\Message;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $balance = 0;
        $wait = 0;
        $messages = Transaction::where('payload', $user->id)->orderby('id', 'desc')->take(5)->get();
        $trans = Transaction::where('payload', $user->id)->where('status', '100')->get();
        $waiting = Transaction::where('payload', $user->id)->where('status', '0')->get();

        foreach($trans as $item){
            $balance += $item->amountf;
        }

        foreach($waiting as $item){
            $wait += $item->amountf;
        }


        $data = [
            'page' => 'Dashboard',
            'message' => $messages,
            'user' => $user,
            'balance' => $balance,
            'wait' => $wait
        ];
        return view('dashboard.index', $data);
    }

    public function user()
    {
        $user = auth()->user();

        $data = [
            'page' => 'User',
            'user' => $user
        ];
        return view('user.index', $data);
    }

    public function transactions()
    {
        $user = auth()->user();
        $trans = Transaction::where('payload', $user->id)->orderby('id','desc')->paginate(10);
        $data = [
            'page' => 'Transactions',
            'trans' => $trans
        ];
        return view('user.transactions', $data);
    }

    public function user_update(Request $request)
    {
        $user = auth()->user();
        try {
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'lname' => $request->lname,
                'city' => $request->city,
                'state' => $request->state,
                'about' => $request->about,
            ]);
            \Session::flash('message', 'Your details has been successfully saved' );

        }catch (\Exception $e) {
            \Session::flash('error', 'There was an error while saving your details, Please try again' );

        }

        return back();
    }

    public function adminUsers()
    {
        $user = auth()->user();
        dd($user);

        $data = [
            'page' => 'User',
            'user' => $user
        ];
        return view('user.index', $data);
    }

    public function add_trans(Request $request)
    {
        $user = auth()->user();
        $transaction['amountTotal'] = (FLOAT) $request->amount;
        $transaction['note'] = 'Note for your transaction';
        $transaction['buyer_email'] = $user->email;
        $transaction['redirect_url'] = url('/transaction');
        $transaction['currency2'] = 'BTC';
      
        /*
        *   @required true
        *   @example first item
        */
        $transaction['items'][] = [
          'itemDescription' => 'Product one',
          'itemPrice' => (FLOAT) $request->amount, // USD
          'itemQty' => (INT) 1,
          'itemSubtotalAmount' => (FLOAT) $request->amount // USD
        ];

      
        $transaction['payload'] = $user->id;
      
        $link = \CoinPayment::generatelink($transaction);

        return redirect($link);
    }

}
