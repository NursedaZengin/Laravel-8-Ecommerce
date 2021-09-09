@extends('layouts.master')
@section('title','Ecommerce - Forgot Password')
@section('content')
    <div class="container mt-20" >
    @include('layouts.partials.alert')
    @include('layouts.partials.success')
    @include('layouts.partials.info')
    <span>Login</span>
      <form method="POST" action="{{ route('forgotpassword')}}">
        @csrf
          <div class="row pl-15">
              <label for="email" value="" class="form-label w-full" />E-Mail Address</br>
              <input id="email" class=" w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
          </div>
          <div  class="row pl-15 mt-10 mb-30">
            <button class="ml-4 login-btn">Recover Acount </button>
          </div>
          </form>
      </div>
    @endsection
