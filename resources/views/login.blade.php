@extends('layouts.master')
@section('title','Ecommerce - Login')
@section('content')
    <div class="container mt-20" >
    @include('layouts.partials.alert')
    <span>Login</span>
      <form method="POST" action="{{ route('authenticate')}}">
        @csrf
          <div class="row pl-15">
              <label for="email" value="" class="form-label w-full" />E-Mail Address</br>
              <input id="email" class=" w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
          </div>
          <div class="row pl-15">
              <label for="password" value="" class="form-label w-full" />Password</br>
              <input id="password" class=" w-full" type="password" name="password" required autocomplete="current-password" />
          </div>
    			<div class="form-check mt-30">
    				<label class="form-label" for="exampleCheck1">Remember Me</label>
    				<input type="checkbox" class="form-check-input" id="exampleCheck1">
    			</div>
          <div  class="row pl-15 mt-10 mb-30">
            <button class="ml-4 login-btn">Login </button>
    				<span>Forgot Your Password? <a href="{{ route('guestCheckOut')}}" class="product-a">Checkout as a Guest</a></span>
         </div>
       </form>
      </div>
@endsection
