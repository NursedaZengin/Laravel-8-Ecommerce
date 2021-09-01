<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('login');
  }

  public function authenticate(Request $request)//gelen isteği alır
    {
        $credentials = $request->validate([ //validationlar kontrol edilir
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials))//kullanıcı varsa
        {
            $request->session()->regenerate();//istekteki session yenilenir
            echo "login";
            return redirect()->intended();//anasayfaya geri yönlendirilir
        }
        else
        {
          return back()->withErrors([
           'email' => 'The provided credentials do not match our records.',
         ]);
        }
   }

   public function logout(Request $request)
  {
        Auth::logout();
        $request->session()->invalidate(); //sessionı siler
        $request->session()->regenerateToken(); // sessionın idsini sıfırlar
        return redirect('/');
  }
}
