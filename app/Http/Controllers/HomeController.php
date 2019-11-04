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
        $messages = Message::where('user_id', $user->id)->orderby('id', 'desc')->take(5)->get();
        $data = [
            'page' => 'Dashboard',
            'message' => $messages,
            'user' => $user
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

    public function messages($value = null)
    {
        if (!$value) {
            $count = 0 ;
            $details = "";
        }else{
            $count = 1 ;
            $details = Message::where('id', $value)->first();
        }
        $user = auth()->user();
        $messages = Message::where('user_id', $user->id)->where('status', 'successful')->orderby('id', 'desc')->paginate(3);
        $failed = Message::where('user_id', $user->id)->where('status', 'failed')->orderby('id', 'desc')->paginate(3);


        $data = [
            'page' => 'Messages',
            'message' => $messages,
            'failed' => $failed,
            'count' => $count,
            'details' => $details

        ];
        return view('user.messages', $data);
    }

    public function transactions()
    {
        $user = auth()->user();
        $trans = Transaction::where('user_id', $user->id)->orderby('id','desc')->paginate(10);
        $data = [
            'page' => 'Transactions',
            'trans' => $trans
        ];
        return view('user.transactions', $data);
    }

    public function csvUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        try {
            Excel::load($request->file, function ($reader) {

                foreach ($reader->toArray() as $row) {
                    dd($row);
                }
            });
            \Session::flash('success', 'Users uploaded successfully.');
        } catch (\Exception $e) {
            \Session::flash('error', $e->getMessage());
        }

        return back();
    }

    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numbers' => 'required',
            'message' => 'required',
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $user = auth()->user();
        $explode_id = array_map('intval', explode(',', $request->numbers));
        $serializedArr = serialize($explode_id);
        $creditSend = count($explode_id);
        $messagLen = strlen($request->message) ;
        if($messagLen > 918){
            \Session::flash('error', 'Sorry Your SMS character message is more than 918 characters');
            return back();

        }

        if($messagLen <= 160){
            $pages = 1 ;
        }elseif(($messagLen >= 161) AND ($messagLen <= 306)){
            $pages = 2 ;
        }elseif(($messagLen >= 307) AND ($messagLen <= 459)){
            $pages = 3 ;
        }elseif(($messagLen >= 460) AND ($messagLen <= 612)){
            $pages = 4 ;
        }elseif(($messagLen >= 613) AND ($messagLen <= 765)){
            $pages = 5 ;
        }else{
            $pages = 6 ;
        }
        $message = $request->message;
        $sender = $request->name;

        try {

            $credit = $creditSend * $pages ;
            if ($credit > $user->credit){
                \Session::flash('error', 'OPZZZ!!! Am sorry, you do not have enough credits to send messages to '. $creditSend.' numbers. PLEASE TOP UP YOUR ACCOUNT ('.$user->credit.')');

                return back();
            }
            $stripped = trim(preg_replace('/\s+/', '', $request->numbers));

            $client = new Client();
            $url = "https://smartsmssolutions.com/api/json.php?";


            $to = $stripped;
            $token = "OdwuM3ffA3TUmInAvZu0dLhkGJTZUXeMej5EVmGf4f2wLJvKheyUeRJNKtAQthQsR4qSd8bYmBNCuc317mPZnRU8EbEeV4DRG1Bi";

            $query = $url.'message='.$message.'&to='.$to.'&sender='.$sender.'&type=0&routing=3&token='.$token ;

            $request = $client->post($query);
            $response = $request->getBody()->getContents();
            $manage = json_decode($response, true);
//            $manage =  [
//                      "code" => "1000",
//                      "successful" => "2347062542461",
//                      "basic_successful" => "2347062542461",
//                      "corp_successful" => "",
//                      "simserver_successful" => "",
//                      "simserver_shared" => "",
//                      "simserver_failed" => "",
//                      "simserver_distribution" => [],
//                      "failed" => "",
//                      "insufficient_unit" => "",
//                      "invalid" => "",
//                      "all_numbers" => "2347062542461",
//                      "nondnd_numbers" => "2347062542461",
//                      "dnd_numbers" => "",
//                      "units_used" => 1,
//                      "basic_units" => 1,
//                      "corp_units" => 0,
//                      "units_before" => "61.83",
//                      "units_after" => "60.83",
//                      "sms_pages" => 1,
//                      "simhost" => "",
//                      "message_id" => "msg-20190919-Bs4wF280X4C2SlHvTbC0QXlSEFaqxYbMbenIGLU",
//                      "ref_id" => null,
//                      "comment" => "Message could not be sent to 0 phone number(s) because of DND. Completed Successfully"
//                    ];
            $unitUsed = $manage["units_used"];
            $numberSent = $manage["units_used"] / $manage["sms_pages"] ;
            $newBalance = $user->credit - $manage["units_used"] ;
            $used = $user->used +  $manage["units_used"];

            User::where('id', $user->id)->update([
                'credit' => $newBalance,
                'used' => $used
            ]);

            $messageData = new Message;
            $messageData->user_id = $user->id;
            $messageData->sender = $sender;
            $messageData->message = $message;
            $messageData->credit = $manage["units_used"];
            $messageData->numbers = $serializedArr;
            $messageData->status = "successful";
            $messageData->page = $pages;

            $messageData->save();

            \Session::flash('message', 'Your message successfully sent to '.$numberSent.' numbers and '.$unitUsed.' units was used' );
            \Session::flash('dnd', 'DND Numbers: $manage["dnd_numbers"]' );

        } catch (\Exception $e) {
            $messageData = new Message;
            $messageData->user_id = $user->id;
            $messageData->sender = $sender;
            $messageData->message = $message;
            $messageData->credit = 0;
            $messageData->numbers = $serializedArr;
            $messageData->status = "failed";
            $messageData->page = $pages;

            $messageData->save();
            \Session::flash('error', $e->getMessage());
        }

        return back();
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
        $amount = $request->credit * 2 ;
        $type = $request->type;
        if ($type == "online") {
            dd($type);
        }else{
            $messageData = new Transaction;
            $messageData->user_id = $user->id;
            $messageData->credit = $request->credit;
            $messageData->amount = $amount;
            $messageData->status = "pending";

            $messageData->save();
            \Session::flash('message', 'Your Transaction  has been successfully Save. Please click on payment details to get the account details to make payment to. THANKS' );

        }

        $data = [
            'page' => 'transaction'
        ];
        return back();
    }

}
