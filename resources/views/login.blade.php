@extends('layouts.master')
@section('title','Ecommerce - Login')
@section('content')
    <div class="container mt-20" >
    @include('layouts.partials.alert')
    @include('layouts.partials.success')
    @include('layouts.partials.info')
    <span>Login</span>
      <form method="POST" action="{{ route('authenticate')}}">
        @csrf
          <div class="row pl-15">
              <label for="email" value="" class="form-label w-full" />E-Mail Address</br>
              <input id="email" class=" w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
          </div>
          <div class="row pl-15">
              <label for="password" value="" class="form-label w-full" />Password</br>
              @if (Auth::viaRemember())
                <input id="password" class=" w-full" type="password" name="password" value="{{ auth()->user()->password }}" required autocomplete="current-password" />
              @else
                <input id="password" class=" w-full" type="password" name="password" value="{{ old('password') }}" required autocomplete="current-password" />
              @endif
          </div>
    			<div class="form-check mt-30">
             <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} > Remember Me
    			</div>
          <div  class="row pl-15 mt-10 mb-30">
            <button class="ml-4 login-btn">Login </button>
    				<span><a href="{{ route('forgotpassword')}}" class="product-a">Forgot Your Password?</a> <a href="{{ route('guestCheckOut')}}" class="product-a">Checkout as a Guest</a></span>
         </div>
       </form>
      </div>
@endsection
