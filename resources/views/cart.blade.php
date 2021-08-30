@extends('layouts.master')
@section('title','Ecommerce - Cart')
@section('content')
      <div class="container mt-20" >
        <span> <a href="index.html" class="product-a">Home</a></span> > <span>Shopping Cart</span>
        <hr>
      	 <div class="col-md-10 mb-70 mt-50 pddng0">
      		 <h5 class="text-bold mb-30">3 İtem(s) in Shopping Cart</h5>
      		   <table class="table table-bordererd table-hover cart-table">
      		       <tr>
                    <td style="width:120px;">
                      <a href="">
                         <img src="img/tel.png" class="w-full">
                      </a>
                    </td>
                    <td>
                      <span>Phone 8</span>
      				            <p>64 GB, 5,8 inch screen ,4 GHz Quad Core</p>
                    </td>
                    <td class="text-right">
                        <form action="" method="post">
                          <input type="submit" class="cart-btn" value="Remove">
                        </form>
      				          <form action="" method="post">
                          <input type="submit" class="cart-btn" value="Save for Later">
                        </form>
      				      </td>
                    <td>
                        <a href="#" class="btn btn-xs btn-default " data-id="" data-adet="">-</a>
                        <span style="padding: 10px 20px">1</span>
                        <a href="#" class="btn btn-xs btn-default " data-id="" data-adet="">+</a>
                    </td>
                    <td class="text-right">
                         $1077.31
                    </td>
                </tr>
    			      <tr>
                  <td style="width:120px;">
                    <a href="">
                     <img src="img/laptop.png" class="w-full">
                    </a>
                   </td>
                  <td>
                    <span>Laptop 1</span>
  				          <p>14 inch, 3 TB SSD, 32 GB RAM</p>
                  </td>
                  <td class="text-right">
                    <form action="" method="post">
                      <input type="submit" class="cart-btn" value="Remove">
                    </form>
  				          <form action="" method="post">
                      <input type="submit" class="cart-btn" value="Save for Later">
                    </form>
				          </td>
                  <td>
                      <a href="#" class="btn btn-xs btn-default " data-id="" data-adet="">-</a>
                      <span style="padding: 10px 20px">1</span>
                      <a href="#" class="btn btn-xs btn-default " data-id="" data-adet="">+</a>
                  </td>
                  <td class="text-right">
                       $1973.61
                  </td>
              </tr>
  			      <tr>
                <td style="width:120px;">
                  <a href="">
                    <img src="img/tel.png" class="w-full">
                  </a>
                </td>
                <td>
                  <span>Phone 2</span>
				          <p>64 GB, 5,7 inch screen ,4 GHz Quad Core</p>
                </td>
                <td class="text-right">
                  <form action="" method="post">
                    <input type="submit" class="cart-btn" value="Remove">
                  </form>
        				  <form action="" method="post">
                      <input type="submit" class="cart-btn" value="Save for Later">
                  </form>
        				</td>
                <td>
                    <a href="#" class="btn btn-xs btn-default urun-adet-azalt" data-id="" data-adet="">-</a>
                    <span style="padding: 10px 20px">1</span>
                    <a href="#" class="btn btn-xs btn-default urun-adet-artir" data-id="" data-adet="">+</a>
                </td>
                <td class="text-right">
                     $1397.92
                </td>
            </tr>
        </table>
		    <div class="col-md-12">
    			<div class="col-md-6">
    			     <p> Shipping is free because we're awesome like that. Also because that's additional stuff don't feel like figuring out :)
    			</div>
    			<div class="col-md-6 ">
      			<table class="w-full">
      			   <tr>
      					<td class="text-right">Subtotal</td><!-- sepetteki tüm ürünlerin toplam değeri-->
      					<td class="text-right"> $4448.84</td>
      				</tr>
      				<tr>
      					<td class="text-right">Tax(13%)</td>
      					<td class="text-right"> $578.35</td>
      				</tr>
      				<tr>
      					<th  class="text-right">Total</th>
      					<td class="text-right text-bold">$5027.19</td>
      				</tr>
      			</table>
    			</div>
    		</div>
    		<div class="col-md-12 mt-40">
    		  <a href="urunler.html" class="shop-btn " >Continue Shopping</a>
    			<a href="login.html" class="shop-check-btn">Proceed to Checkout</a>
			</div>
	</div>
</div>
@endsection
