@extends('layouts.master')
@section('title','Ecommerce - Shop')
@section('content')
    <div class="container mt-20" >
      <span> <a href="{{ route('index')}}" class="product-a">Home</a></span> > <span>Shop</span>
      <hr>
      	<div class="row mt-30">
      		@include('layouts.partials.sidebar')
      		<div class="col-md-10">
      			<div class="col-md-12">
      				<div class="col-md-6"><h2 class="shop-h">Featured</h2></div>
      				<div class="col-md-6 text-right mt-20">
                <span class="text-bold">Price:</span>
                    <a href="{{ route('shop', ['category'=> request()->category, 'sort' => 'low_high']) }}" class="product-a ">Low to High</a> |
                    <a href="{{ route('shop', ['category'=> request()->category, 'sort' => 'high_low']) }}" class="product-a ">High to Low</a>
               </div>
      			</div>
      			<div class="col-md-12">
      				<div class="row">
                @if(count($products)<1)
                <div class="col-md-12"><p>Bu kategoriye ait ürün bulunmamaktadır.</p></div>
                @endif
                @foreach($products as $product)
      					<div class="col-md-4 text-center p-20">
      					  <a href="{{ route('shopdetail',$product->slug)}}" class="product-a ">
        						<img src="../img/{{{ $product->image}}}" class="product-img w-auto"/>
        						<p>{{ $product->product_name }}</p>
        						<span>${{ $product->price }}</span>
      						</a>
      					</div>
                @endforeach
      				</div>
			      </div>
		     </div>
	    </div>
   </div>
@endsection
