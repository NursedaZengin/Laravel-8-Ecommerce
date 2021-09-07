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
                      <!--<div class="quantity buttons_added">
                        <input type="button" value="-" class="minus" data-id="{{ $item->model->rowId}}" data-adet="{{ $item->model->quantity - 1}}">
                        <input type="number" id="adet" step="1" min="1" max="" name="quantity"  title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">{{ $item->model->qty}}
                        <input type="button" value="+" class="plus" data-id="{{ $item->model->rowId}}" data-adet="{{ $item->model->quantity + 1}}">
                      </div>-->
                      <a href="#" class="btn btn-xs btn-default"  wire:click.prevent="qtyPlus('{{ $item->rowId}}')">-</a>
                      <!-- data-alanadi ile o tablodeki bi alanı jquery ile kullanabilmek için tanımlayabiliriz -->
                      <span style="padding: 10px 20px">{{ $item->qty }}</span><!-- adet-->
                      <a href="" class="btn btn-xs btn-default " wire:click.prevent="qtyPlus('{{ $item->rowId}}')">+</a>
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



function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});
</script>
@endsection
