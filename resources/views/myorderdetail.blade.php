@extends('layouts.master')
@section('title','Ecommerce - My Order Detail')
@section('content')
<div class="container mt-20" >
  <div class="col-md-12 mb-70  pddng0">
     <div class="col-md-12 pddng0"><h2 class="check-h">MyOrder Detail</h2></div>
       <div class="col-md-12 pddng0">
         <div class="col-md-5 pddng0" >
           <h4 class="check-h4">My Order Details</h4>
             <div>
               <p>Order Mail:{{ $order->email }}</br>
                  Order No: {{ $order->id }}</br>
                  Person to deliver: {{ $order->name }}</br>
                  Order Status: {{ $order->status }}</br>
                  Total: ${{ $order->total }}</br>
                  Order Date: {{ $order->created_at}}</br>
                  {{ $orderquantity }} product(s)</p>
                </p>
               <p>Address:
                 {{ $order->address }} </br>
                 {{ $order->province }} / {{ $order->city }} </br>
                  Postacode: {{ $order->postacode }}</br>
                 Contact: {{ $order->phone }}</p>
            </div>
         </div>
         <div class="col-md-4 ml-150">
           <h4 class="check-h4">Your Order</h4>
         <table class="table table-bordererd table-hover cart-table">
           @foreach ($orderdetail as $orderproduct)
             @foreach ($products as $product)
            <tr>
              @if($product->id == $orderproduct->product_id)
                <td style="width:120px;">
                  <img src="{{ asset('img/'. $product->image) }}" class="check-img">
                </td>
                <td>
                  <span>{{ $product->name }}</span>
                  <p class="check-p">{{ $product->properties }}</p>
                  <span>${{ $product->price }}</span>
                </td>
                <td class="x-middle">
                    <span class="check-qntty">{{ $orderproduct->quantity }}</span>
                </td>
                @endif
              </tr>
              @endforeach
              @endforeach
         </table>

       </div>
     </div>
   </div>
   </div>
   @endsection
