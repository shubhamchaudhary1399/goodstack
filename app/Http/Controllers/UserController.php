<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Mail;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){
        Log::info($request);
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            return view('home');
        }
        else{
            return Redirect::back ();
        }
    }

    public function loginWithOtp(Request $request){
        Log::info($request);
        $user  = User::where([['email','=',request('email')],['otp','=',request('otp')]])->first();
        if( $user){
            Auth::login($user, true);
            User::where('email','=',$request->email)->update(['otp' => null]);
            return view('home');
        }
        else{
            return Redirect::back ();
        }
    }

    public function sendOtp(Request $request){
        $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
        $user = User::where('email','=',$request->email)->update(['otp' => $otp]);
        // send otp to email using email api
        $to_name = 'Shubham';
        $to_email = 'shubhamluck998@gmail.com';
        $data = array('name'=>"Dear user", "body" => "Thanks for using goodstack otp service for login. Your OTP is: ".$otp.". Never share OTP with anyone.");

        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
    $message->to($to_email, $to_name)
            ->subject('Artisans Web Testing Mail');
            $message->from('pankaj.pk120@gmail.com','Artisans Web');
});
        return response()->json([$user],200);
    }
}
