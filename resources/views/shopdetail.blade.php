@extends('layouts.master')
@section('title','Ecommerce - Shop Detail')
@section('content')
      <div class="container mt-20" >
      <span> <a href="{{ route('index')}}" class="product-a">Home</a></span> > <span><a href="{{ route('shop')}}" class="product-a">Shop</a></span> > <span>{{ $product->name}}</span>
      <hr>
      	<div class="col-md-12 mx-70 pddng0">
      		<div class="col-md-6 border text-center">
      			<img src="/img/{{ $product->image}}" class="product-img-detail" />
      		</div>
      		<div class="col-md-6 pl-70">
      			<h2 class="mb-30">{{ $product->name}}</h2>
      			<p> {{ $product->properties}}</p>
      			<span class="text-bold product-price">${{ $product->price}}</span>
      			<p class="product-p">{{ $product->description}}</p>
            <form action="{{ route('store') }}" method="post" >
                 @csrf
                 <input type="hidden" name="id" value="{{ $product->id }}">
                 <input type="hidden" name="name" value="{{ $product->name }}">
                 <input type="hidden" name="price" value="{{ $product->price }}">
                 <input type="submit" class="add-btn" value="Add to Cart">
               </form>
      		</div>
      	</div>
      </div>
@endsection
