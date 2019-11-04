<?php

namespace App\Http\Controllers;

use App\User;
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
        $users = User::where('id', $id)->first();

        $data = [
            'page' => 'AdminUsers',
            'user' => $users
        ];
        return view('admin.trans', $data);
    }

    public function add_credit(Request $request)
    {
        $user = User::where('id', $request->user)->first();

        $new = $request->credit + $user->credit;

        User::where('id', $user->id)->update([
            'credit' => $new,
        ]);

        \Session::flash('message', 'Top Up Successfully Done' );

        return back();
    }
}
