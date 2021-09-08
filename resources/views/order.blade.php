@extends('layouts.master')
@section('title','Ecommerce - Order')
@section('content')
<div class="container mt-20" >
   <div class="col-md-10 mb-70 mt-50 pddng0">
      @include('layouts.partials.success')
      @include('layouts.partials.info')
      @include('layouts.partials.alert')
      @auth
      <a href="{{ route('myorders') }}" class="shop-btn " >My Orders </a>
      @endauth
      @guest
      <a href="{{ route('myorder') }}" class="shop-btn " >Order Detail </a>
      @endguest
    </div>
</div>
@endsection
