<?php

namespace App\Http\Controllers;

use App\User;
use App\Transaction;
use Illuminate\Http\Request;
use Session;


class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminUsers()
    {
        $users = User::orderby('id', 'desc')->paginate(10);

        $data = [
            'page' => 'AdminUsers',
            'users' => $users
        ];
        return view('admin.users', $data);
    }

    public function user_trans($id)
    {
        $user = auth()->user();
        $trans = Transaction::where('payload', $id)->orderby('id','desc')->paginate(10);
        $data = [
            'page' => 'Transactions',
            'trans' => $trans,
            'wallet' => $user->wallet
        ];
        return view('user.transactions', $data);
    }

    public function accept_payment($id)
    {
        try {
            Transaction::where('id', $id)->update([
                'payment' => 'completed',
            ]);
            \Session::flash('message', 'Transaction successfully Updated' );

        }catch (\Exception $e) {
            \Session::flash('error', 'There was an error while saving your details, Please try again' );

        }
        return back();
    }

}
