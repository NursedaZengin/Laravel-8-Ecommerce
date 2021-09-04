@extends('layouts.master')
@section('title','Ecommerce - Cart')
@section('content')
      <div class="container mt-20" >
        <span> <a href="{{ route('index')}}" class="product-a">Home</a></span> > <span>Shopping Cart</span>
        <hr>
      	 <div class="col-md-10 mb-70 mt-50 pddng0">
          @include('layouts.partials.success')
          @include('layouts.partials.alert')
          @if(Cart::count()>0)
      		 <h5 class="text-bold mb-30">{{ Cart::count() }} İtem(s) in Shopping Cart</h5>
      		   <table class="table table-bordererd table-hover cart-table">
               @foreach(Cart::content() as $item)
      		       <tr>
                    <td style="width:120px;">
                      <a href="{{ route('shopdetail',$item->model->slug)}}">
                         <img src="{{ asset('img/'. $item->model->image) }}" class="w-full">
                      </a>
                    </td>
                    <td>
                      <span>{{ $item->model->name}}</span>
      				            <p>{{ $item->model->properties}}</p>
                    </td>
                    <td class="text-right">
                        <form action="{{ route('remove',$item->rowId) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <input type="submit" class="cart-btn" value="Remove">
                        </form>
      				          <form action="" method="post">
                          <input type="submit" class="cart-btn" value="Save for Later">
                        </form>
      				      </td>
                    <td>
                        <a href="" class="btn btn-xs btn-default urun-adet-azalt " data-id="{{ $item->model->id}}" data-adet="1">-</a>
                        <span style="padding: 10px 20px">1</span>
                        <a href="" class="btn btn-xs btn-default urun-adet-artir" data-id="{{ $item->model->id}}" data-adet="1">+</a>
                    </td>
                    <td class="text-right">
                         ${{ $item->model->price}}
                    </td>
                </tr>
                @endforeach
        </table>
		    <div class="col-md-12">
    			<div class="col-md-6">
    			     <p> Shipping is free because we're awesome like that. Also because that's additional stuff don't feel like figuring out :)
    			</div>
    			<div class="col-md-6 ">
      			<table class="w-full">
      			   <tr>
      					<td class="text-right">Subtotal</td><!-- sepetteki tüm ürünlerin toplam değeri-->
      					<td class="text-right"> ${{ Cart::subtotal() }}</td>
      				</tr>
      				<tr>
      					<td class="text-right">Tax(13%)</td>
      					<td class="text-right"> ${{ Cart::tax() }}</td>
      				</tr>
      				<tr>
      					<th  class="text-right">Total</th>
      					<td class="text-right text-bold">${{ Cart::total() }}</td>
      				</tr>
      			</table>
    			</div>
    		</div>
    		<div class="col-md-12 mt-40">
    		  <a href="{{ route('shop')}}" class="shop-btn " >Continue Shopping</a>
    			<a href="{{ route('checkout')}}" class="shop-check-btn">Proceed to Checkout</a>
			</div>
      @else
      <h5>No İtems in Cart</h5>
      @endif
	</div>
</div>
@endsection
@section('js')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
//ajax kullanabilmak için
  $(function(){
    $('.urun-adet-artir, .urun-adet-azalt').on('click', function(){
    	var id=$(this).attr('data-id');//jquery ile id alınır değişkene atılır
    	var adet=$(this).attr('data-adet');
    	$.ajax({//ajax ile veriler güncellenir
    		type: 'PATCH',
    		url: '{{ url('cart') }}/' + id,//gelen id ile sayfaya yönlendirme için link tanımlanır
    		data: {adet:adet}, //değişen adet bilgisi gönderilir
        traditional: true,
        success: function(){
          window.location.href = '{{ route('cart') }}';//tekrar sepet sayfasına yönlendirilir
        }
    	});
    });
  });
</script>
@endsection
