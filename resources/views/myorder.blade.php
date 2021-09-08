@extends('layouts.master')
@section('title','Ecommerce - My Order')
@section('content')
<div class="container mt-20" >
  <div class="col-md-12 mb-70  pddng0">
     <div class="col-md-12 pddng0"><h2 class="check-h">MyOrder</h2></div>
       <div class="col-md-12 pddng0">
         @auth
         <h5 class="text-bold mb-30">My Order</h5>
           <table class="table table-bordererd table-hover cart-table">
             <tr>
               <th>Order Id </th>
               <th>Order Status </th>
               <th>Total </th>
               <th>Date </th>
               <th></th>
             </tr>
            @foreach($orders as $item)
                 <tr>
                     <td>
                          <p>{{ $item->id}}</p>
                     </td>
                     <td>
                          <p>{{ $item->status}}</p>
                    </td>
                     <td>
                        <p>${{ $item->total}}</p>
                     </td>
                     <td >
                       <p>{{ $item->created_at}}</p>
                     </td>
                     <td >
                        <a class="product-a" href="{{ route('myorderdetail',$item->id)}}">Order Detail</a>
                     </td>
                 </tr>
               @endforeach
             </table>
         @endauth
         @guest
          <div class="col-md-5 pddng0" >
            <h4 class="check-h4">My Order Details</h4>
              <div>
                <p>Order Mail:{{ $orders->email }}</br>
                   Order No: {{ $orders->id }}</br>
                   Person to deliver: {{ $orders->name }}</br>
                   Order Status: {{ $orders->status }}</br>
                   Total: ${{ $orders->total }}</br>
                   Order Date: {{ $orders->created_at}}</br>
                   {{ $orderquantity }} product(s)</p>
                 </p>
                <p>Address:
                  {{ $orders->address }} </br>
                  {{ $orders->province }} / {{ $orders->city }} </br>
                   Postacode: {{ $orders->postacode }}</br>
                  Contact: {{ $orders->phone }}</p>
             </div>
          </div>
          <div class="col-md-4 ml-150">
            <h4 class="check-h4">Your Order</h4>
            <table class="table table-bordererd table-hover cart-table">
              @foreach ($orderproducts as $orderproduct)
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
          @endguest
        </div>
      </div>
    </div>
@endsection
