<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Mail;
use Hash;
use App\Models\User;

class ForgotPasswordController extends Controller
{
  public function index()
  {
    return view('forgotpassword');
  }

  public function forgot(Request $request)
  {
    $request->validate([
          'email' => 'required|email|exists:users',
      ]);

      $token = Str::random(60);

      DB::table('passwordReset')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => now()]
      );

      Mail::send('mailreset',['token' => $token], function($message) use ($request) {
                $message->from($request->email);
                $message->to('yazilimisleri2030@gmail.com');
                $message->subject('Reset Password Notification');
             });

      return back()->with('alert-success', 'We have e-mailed your password reset link!');
  }

  public function getReset($token) {

       return view('resetpassword', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('passwordReset')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('passwordReset')->where(['email'=> $request->email])->delete();

          return redirect('/login')->with('message', 'Your password has been changed!');
    }


}
