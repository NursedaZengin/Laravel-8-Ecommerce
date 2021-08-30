@extends('layouts.master')
@section('title','Ecommerce - Checkout')
@section('content')
      <div class="container mt-20" >
      	<div class="col-md-12 mb-70  pddng0">
      	   <div class="col-md-12 pddng0"><h2 class="check-h">Checkout</h2></div>
      	     <div class="col-md-12 pddng0">
      		      <div class="col-md-5 pddng0" >
      		          <h4 class="check-h4">Billing Details</h4>
      		          <form method="POST" action="">
                      <div class="row pl-15">
                          <label for="email" value="" class="form-label w-full" />E-Mail Address</br>
                          <input id="email" class=" w-full" type="email" name="email" :value="" required autofocus />
                      </div>
                      <div class="row pl-15">
                          <label for="name" value="" class="form-label w-full" />Name</br>
                          <input id="name" class=" w-full" type="text" name="name" required />
                      </div>
                			<div class="row pl-15">
                          <label for="address" value="" class="form-label w-full" />Address</br>
                          <input id="address" class=" w-full" type="text" name="address" required />
                      </div>
              			  <div class="row pl-15">
                				<div class="col-md-6  pl-0">
                					<label for="city" value="" class="form-label w-full" />City</br>
                					<input id="city" class=" w-full" type="text" name="city" required />
                				 </div>
                				 <div class="col-md-6  pr-0">
                					<label for="province" value="" class="form-label w-full" />Province</br>
                					<input id="province" class=" w-full" type="text" name="province" required />
                				</div>
                			</div>
              			  <div class="row pl-15">
              				 <div class="col-md-6  pl-0">
                          <label for="posta" value="" class="form-label w-full" />Posta Code</br>
                          <input id="posta" class=" w-full" type="text" name="posta" required />
                       </div>
              			   <div class="col-md-6  pr-0">
                          <label for="phone" value="" class="form-label w-full" />Phone</br>
                          <input id="phone" class=" w-full" type="text" name="phone" required />
                       </div>
                      </div>
                      <div  class="row pl-15 mt-10 mb-30">
                          <button class="ml-4 login-btn">Buy </button>
                      </div>
                  </form>
		            </div>
            		<div class="col-md-4 ml-150">
              		<h4 class="check-h4">Your Order</h4>
              		<table class="table table-bordererd table-hover cart-table">
              		    <tr>
                          <td style="width:120px;">
                            <a href="">
                            <img src="img/tel.png" class="check-img">
                            </a>
                          </td>
                          <td>
                            <span>Phone 8</span>
            				        <p class="check-p">64 GB, 5,8 inch screen ,4 GHz Quad Core</p>
            				        <span>$1077.31</span>
                          </td>
                          <td class="x-middle">
                              <span class="check-qntty">1</span>
                          </td>
                        </tr>
            			      <tr>
                          <td style="width:120px;">
                            <a href="">
                             <img src="img/laptop.png" class="check-img">
                            </a>
                          </td>
                          <td>
                            <span>Laptop 1</span>
          				          <p class="check-p">14 inch, 3 TB SSD, 32 GB RAM</p>
          				          <span> $1973.61</span>
                          </td>
                          <td class="x-middle">
                              <span class="check-qntty">1</span>
                          </td>
                        </tr>
			                  <tr>
                          <td style="width:120px;">
                            <a href="">
                             <img src="img/tel.png" class="check-img">
                           </a>
                          </td>
                          <td>
                            <span>Phone 2</span>
          				          <p class="check-p">64 GB, 5,7 inch screen ,4 GHz Quad Core</p>
          				          <span>$1397.92</span>
                          </td>
                          <td class="x-middle">
                              <span class="check-qntty">1</span>
                          </td>
                      </tr>
                  </table>
          		</div>
          	</div>
        		<div class="col-md-12">
          		<div class="col-md-6"></div>
            		<div class="col-md-4">
            			<table class="w-full">
            			   <tr>
            					<td class="text-right">Subtotal</td>
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
        	</div>
        </div>
        @endsection
