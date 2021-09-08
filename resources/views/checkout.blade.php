@extends('layouts.master')
@section('title','Ecommerce - Checkout')
@section('content')
      <div class="container mt-20" >
      	<div class="col-md-12 mb-70  pddng0">
      	   <div class="col-md-12 pddng0"><h2 class="check-h">Checkout</h2></div>
      	     <div class="col-md-12 pddng0">
      		      <div class="col-md-5 pddng0" >
      		          <h4 class="check-h4">Billing Details</h4>
      		          <form method="post" action="{{ route('order')}}">
                      @csrf
                      <div class="row pl-15">
                          <label for="email" value="" class="form-label w-full" />E-Mail Address</br>
                          @if(auth()->user())
                          <input id="email" class=" w-full" type="email" name="email" value="{{ auth()->user()->email}}" required autofocus readonly/>
                          @else
                          <input id="email" class=" w-full" type="email" name="email" value="{{ old('email')}}" required autofocus />
                          @endif
                      </div>
                      <div class="row pl-15">
                          <label for="name" value="" class="form-label w-full" />Name</br>
                          <input id="name" class=" w-full" type="text" name="name" value="{{ old('name')}}" required />
                      </div>
                			<div class="row pl-15">
                          <label for="address" value="" class="form-label w-full" />Address</br>
                          <input id="address" class=" w-full" type="text" name="address" value="{{ old('address')}}" required />
                      </div>
              			  <div class="row pl-15">
                				<div class="col-md-6  pl-0">
                					<label for="city" value="" class="form-label w-full" />City</br>
                					<input id="city" class=" w-full" type="text" name="city" value="{{ old('city')}}" required />
                				 </div>
                				 <div class="col-md-6  pr-0">
                					<label for="province" value="" class="form-label w-full" />Province</br>
                					<input id="province" class=" w-full" type="text" name="province" required />
                				</div>
                			</div>
              			  <div class="row pl-15">
              				 <div class="col-md-6  pl-0">
                          <label for="postacode" value="" class="form-label w-full" />Posta Code</br>
                          <input id="postacode" class=" w-full" type="text" name="postacode" value="{{ old('postacode')}}" required />
                       </div>
              			   <div class="col-md-6  pr-0">
                          <label for="phone" value="" class="form-label w-full" />Phone</br>
                          <input id="phone" class=" w-full" type="text" name="phone" value="{{ old('phone')}}" required />
                       </div>
                      </div>
                      <div class="row pl-15">
                        <span class="note">Pay at the door only</span>
                      </div>
                      <div  class="row pl-15 mt-10 mb-30">
                          <button class="ml-4 login-btn">Buy </button>
                      </div>
                  </form>
		            </div>
            		<div class="col-md-4 ml-150">
              		<h4 class="check-h4">Your Order</h4>
              		<table class="table table-bordererd table-hover cart-table">
                     @foreach (Cart::content() as $item)
              		    <tr>
                          <td style="width:120px;">
                            <img src="{{ asset('img/'. $item->model->image) }}" class="check-img">
                          </td>
                          <td>
                            <span>{{ $item->model->name }}</span>
            				        <p class="check-p">{{ $item->model->properties }}</p>
            				        <span>${{ $item->model->price }}</span>
                          </td>
                          <td class="x-middle">
                              <span class="check-qntty">{{ $item->qty}}</span>
                          </td>
                        </tr>
                        @endforeach
                  </table>
          		</div>
          	</div>
        		<div class="col-md-12">
          		<div class="col-md-6"></div>
            		<div class="col-md-4">
            			<table class="w-full">
            			   <tr>
            					<td class="text-right">Subtotal</td>
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
        	</div>
        </div>
        @endsection
