@extends('layouts.app')

@section('content')
    @php
        $count = count($orders);
    @endphp

{{-- <h2>Welcome {{auth()->user()->name}}</h2> --}}
<div class="container-fluid w-50 px-0 mt-4">
    <div class="row">
        <div class="col-6"><h2 class="text-bold font-weight-bold text-secondary h4">Your Orders</h2></div>
        <div class="col-6 text-end h5"><span class="">{{$count}}
            @if ($count > 1 or $count ==0)
            orders
            @else
            order
            @endif
        </span></div>
    </div>
    <hr class="my-4">
</div>

<div class="container w-50 mt-5">
    @foreach ($orders as $order)
    @php
        $order_items = $order->order_items;
        $created_at = strtotime($order->created_at);
        $converted_date = date("j F y, g:i a ", $created_at);
        $order_address = \App\Models\OrderAddress::where('order_id', '=', $order->id)->first();

    @endphp
        <div class="row my-4 justify-content-center">
            <div class="col-md-12">
                <div class="card rounded-0">
                    <div class="card-header"> 
                        <div class="row">
                            <div class="col-12 px-2 col-lg-5 text-secondary text-uppercase">Order placed:
                                 <span class="text-dark px-1 text-capitalize">{{$converted_date}}</span>
                            </div>
                            <div class="col-12 px-2 col-lg-2 text-secondary text-uppercase">Total
                                <span class="text-dark px-1 text-capitalize">{{" £".$order->price}}</span>
                            </div>
                            <div class="col-12 px-2 col-lg-3 text-secondary">DELIVER TO 
                                <span class="text-primary h5 px-1">{{$order_address->firstname}}</span> 
                                <span class="text-primary h5 ">{{$order_address->lastname}}</span>
                            </div>
                            <div class="col-12 px-2 col-lg-2 text-end text-uppercase">Order #: {{$order->id}}</div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        {{-- $item is the array of order items stored as json inside the database --}}
                        <li class="list-group-item">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class=" ">
                                        <tr class="">
                                            <th scope="col">Product</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        @foreach ($order_items as $item)
                                        @php
                                            $imageURL = \App\Models\Product::where('id','=', $item['id'])->first()->image;
                                            $product = \App\Models\Product::where('id','=', $item['id'])->first();
                                        @endphp
                                
                                                <tr class="align-middle">
                                                    <td>
                                                        <a href="{{route('showProduct', ['product' => $product])}}">
                                                            <img height="100" src="{{$imageURL}}" alt="">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none text-dark" href="{{route('showProduct', ['product' => $product])}}">
                                                        {{$item['name']}}
                                                        </a>
                                                    </td>
                                                    <td>{{$item['price']}}</td>
                                                    <td>{{$item['qty']}}</td>
                                                </tr>
                                
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection