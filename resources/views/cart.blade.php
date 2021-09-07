@extends('layouts.master')
@section('title','Ecommerce - Cart')
@section('head')
  <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
.quantity {display: inline-block; }
.quantity .input-text.qty {
width: 35px;
height: 39px;
padding: 0 5px;
text-align: center;
background-color: transparent;
border: 1px solid #efefef;}
.quantity.buttons_added {
text-align: left;
position: relative;
white-space: nowrap;
vertical-align: top; }
.quantity.buttons_added input {
display: inline-block;
margin: 0;
vertical-align: top;
box-shadow: none;}
.quantity.buttons_added .minus,
.quantity.buttons_added .plus {
padding: 7px 10px 8px;
height: 41px;
background-color: #ffffff;
border: 1px solid #efefef;
cursor:pointer;}
.quantity.buttons_added .minus {border-right: 0; }
.quantity.buttons_added .plus {border-left: 0; }
.quantity.buttons_added .minus:hover,.quantity.buttons_added .plus:hover {background: #eeeeee; }
.quantity input::-webkit-outer-spin-button,
.quantity input::-webkit-inner-spin-button {
-webkit-appearance: none;
-moz-appearance: none;
margin: 0; }
.quantity.buttons_added .minus:focus,.quantity.buttons_added .plus:focus {outline: none; }
</style>
@endsection
@section('content')
      <div class="container mt-20" >
        <span> <a href="{{ route('index')}}" class="product-a">Home</a></span> > <span>Shopping Cart</span>
        <hr>
      	 <div class="col-md-10 mb-70 mt-50 pddng0">
          @include('layouts.partials.success')
          @include('layouts.partials.info')
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
      				          <form action="{{ route('SaveFLater',$item->rowId) }}" method="post">
                          @csrf
                          <input type="submit" class="cart-btn" value="Save for Later">
                        </form>
      				      </td>
                    <td>
                       <a href="" class="btn btn-xs btn-default qtyPlus" data-id="{{ $item->rowId }}" data-adet="{{ $item->qty-1 }}">-</a>
                       <!-- data-alanadi ile o tablodeki bi alanı jquery ile kullanabilmek için tanımlayabiliriz -->
                       <span style="padding: 10px 20px">{{ $item->qty }}</span><!-- adet-->
                       <a href="" class="btn btn-xs btn-default qtyMinus" data-id="{{ $item->rowId }}" data-adet="{{ $item->qty+1 }}">+</a>
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
      @if(Cart::instance('saveForLater')->count()>0)
             <h5 class="text-bold mb-30">{{ Cart::instance('saveForLater')->count() }} İtem(s) in Save For Later</h5>
              <table class="table table-bordererd table-hover cart-table">
                @foreach(Cart::instance('saveForLater')->content() as $item)
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
                       <form action="{{ route('moveToCartDelete',$item->rowId) }}" method="post">
                         @csrf
                         {{ method_field('DELETE') }}
                         <input type="submit" class="cart-btn" value="Remove">
                       </form>
                       <form action="{{ route('moveToCart',$item->rowId) }}" method="post">
                         @csrf
                         <input type="submit" class="cart-btn" value="Move to cart">
                       </form>
                   </td>
                   <td class="text-right">
                        ${{ $item->model->price}}
                   </td>
               </tr>
               @endforeach
              </table>
              @endif
	</div>
</div>
@endsection
@section('js')

<script>//bilgilendirme kutulaının kaybolması için. çalışmıyor!!!!!!!!!!!!!!!!!!
setTimeOut(function(){
  $('.alert').slideUp(500);
},5000);
</script>

<script>
//ajax kullanabilmak için eklenir
//ayrıca head içine de: <meta name="csrf-token" content="{{ csrf_token() }}"> eklenir
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $(function(){
    $('.qtyMinus, .qtyPlus').on('click', function(){
    	var id=$(this).attr('data-id');//jquery ile id alınır değişkene atılır
    	var adet=$(this).attr('data-adet');
    	$.ajax({//ajax ile veriler güncellenir
    		type: 'PATCH',
    		url: '{{ url('/cart/update') }}/' + id,//gelen id ile sayfaya yönlendirme için link tanımlanır
    		data: {adet:adet}, //değişen adet bilgisi gönderilir
        traditional: true,
        success: function(){
          window.location.href = '{{ route('cart') }}';//tekrar cart sayfasına yönlendirilir
        }
    	});
    });
  });
</script>
@endsection
