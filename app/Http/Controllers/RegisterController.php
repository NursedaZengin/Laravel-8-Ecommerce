<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{

  public function index()
  {
      return view('signup');
  }

  //kullanıcı ekleme
  public function create(array $data)
  {
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);
  }

   public function signup(Request $request)
  {
      $request->validate([ //verilerin kontrollerini yapar
        'name' => 'required|string|max:190',
        'email' => 'required|string|email|max:190|unique:users',
        'password' => 'required|string|min:4|confirmed', //password eşleşmesi için blade sayfasındaki diğer password alanı password_confirmation  şeklinde adlandırılmalıdır
      ]);

      $data = $request->all();//istekten gelen verileri alır
      $check = $this->create($data); // create methodu ile bu verileri kaydeder

      return redirect('login')->with([
       'alert-success' => 'You have signed-in.',
     ]);
  }


}
