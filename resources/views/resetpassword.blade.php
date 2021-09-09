@extends('layouts.master')
@section('title','Ecommerce - Reset Password')
@section('content')
<div class="container mt-20" >
@include('layouts.partials.alert')
@include('layouts.partials.success')
@include('layouts.partials.info')
<span>Reset Password</span>
  <form method="POST" action="{{ route('resetpassword')}}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
      <div class="row pl-15">
          <label for="email" value="" class="form-label w-full" />E-Mail Address</br>
          <input id="email" class=" w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
      </div>
      <div class="row pl-15">
          <label for="password" value="" class="form-label w-full" />Password</br>
            <input id="password" class=" w-full" type="password" name="password"  required autocomplete="current-password" />
      </div>
      <div class="row pl-15">
          <label for="password_confirmation" value="" class="form-label w-full" />Confirm Password</br>
            <input id="password_confirmation" class=" w-full" type="password" name="password_confirmation"  required autocomplete="current-password" />
      </div>
      <div  class="row pl-15 mt-10 mb-30">
        <button class="ml-4 login-btn">  Reset Password </button>  </div>
      </form>
      </div>
@endsection
