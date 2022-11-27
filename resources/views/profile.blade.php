@extends('layouts.app')

@section('content')

<div class="container">
    {{-- <h2>Welcome {{auth()->user()->name}}</h2> --}}
    <h2 class="text-center text-uppercase">Your Orders</h2>
    
    @foreach ($orders as $order)
    @php
        $order_items = $order->order_items;
        $created_at = strtotime($order->created_at);
        $converted_date = date("j F y, g:i a ", $created_at);
        $order_address = \App\Models\OrderAddress::where('order_id', '=', $order->id)->first();

    @endphp
        <div class="row my-4 justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"> 
                        <div class="row">
                            <div class="col-12 px-2 col-md-4 text-secondary text-uppercase">Order placed:
                                 <span class="text-dark px-1 text-capitalize">{{$converted_date}}</span>
                            </div>
                            <div class="col-12 px-2 col-md-2 text-secondary text-uppercase">Total
                                <span class="text-dark px-1 text-capitalize">{{" £".$order->price}}</span>
                            </div>
                            <div class="col-12 px-2 col-md-4 text-secondary">DELIVER TO 
                                <span class="text-primary h5 px-1">{{$order_address->firstname}}</span> 
                                <span class="text-primary h5 ">{{$order_address->lastname}}</span>
                            </div>
                            <div class="col-12 px-2 col-md-2 text-end text-uppercase">Order #: {{$order->id}}</div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        {{-- $item is the array of order items stored as json inside the database --}}
                        <li class="list-group-item">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                    @foreach ($order_items as $item)
                                        <tr>
                                            <td>{{$item['name']}}</td>
                                            <td>{{$item['price']}}</td>
                                            <td>{{$item['qty']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection