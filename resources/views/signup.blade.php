@extends('layouts.master')
@section('title','Ecommerce - Signup')
@section('content')
    <div class="container mt-20" >
    @include('layouts.partials.alert')
    <span>Login</span>
    <form method="POST" action="{{ route('signup')}}">
      @csrf
        <div class="row pl-15">
            <label for="email" value="" class="form-label w-full" />E-Mail Address</br>
            <input id="email" class=" w-full" type="email" name="email" value="{{ old('email') }}" required autofocus />
        </div>
        <div class="row pl-15">
            <label for="name" value="" class="form-label w-full" />Name</br>
            <input id="name" class=" w-full" type="text" name="name" value="{{ old('name') }}" required  />
        </div>
        <div class="row pl-15">
            <label for="password" value="" class="form-label w-full" />Password</br>
            <input id="password" class=" w-full" type="password" name="password" required autocomplete="current-password" />
        </div>
        <div class="row pl-15">
            <label for="password_confirmation" value="" class="form-label w-full" />Password</br>
            <input id="password_confirmation" class=" w-full" type="password" name="password_confirmation" required autocomplete="current-password" />
        </div>
        <div  class="row pl-15 mt-10 mb-30">
          <button class="ml-4 login-btn">Signup </button>
       </div>
     </form>
  </div>
@endsection
