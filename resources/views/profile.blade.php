@extends('layouts.app')

@section('content')
    @php
        $count = count($orders);
    @endphp

{{-- <h2>Welcome {{auth()->user()->name}}</h2> --}}

@if($count !=0)
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
        $orderStatus = "In progress";
        $badgeStatus = "bg-warning";
        if($order->status == 0){
            $orderStatus = "In progress";
            $badgeStatus = "bg-warning";
        }elseif ($order->status == 1) {
            $orderStatus = "Completed";
            $badgeStatus = "bg-success";

        }else{
            $orderStatus = "Canceled";
            $badgeStatus = "bg-danger";
        }
    @endphp
        <div class="row my-4 mb-5 pb-2 justify-content-center">
            <div class="col-md-12">
                <div class="card rounded-0">
                    <div class="card-header"> 
                        <div class="row">
                            <div class="col-12 px-2 col-xl-5 text-secondary text-uppercase">Order placed:
                                 <span class="text-dark px-1 text-capitalize">{{$converted_date}}</span>
                            </div>
                            <div class="col-12 px-2 col-xl-2 text-secondary text-uppercase">Total
                                <span class="text-dark px-1 text-capitalize">{{" £".$order->price}}</span>
                            </div>
                            <div class="col-12 px-2 col-xl-3 text-secondary">DELIVER TO 
                                <span class="text-primary h5 px-1">{{$order_address->firstname}}</span> 
                                <span class="text-primary h5 ">{{$order_address->lastname}}</span>
                            </div>
                            <div class="col-12 px-2 col-xl-2 text-end text-uppercase"><span class="badge {{$badgeStatus}}">{{$orderStatus}}</span></div>
                            <div class="col-12 px-2 col-xl-2 text-uppercase">Order #: {{$order->id}}</div>
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

                    <div class="card-body">
                        <h5>Delivery</h5>
                        <h6 class="text-secondary">Address</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <p>
                                    {{$order_address->address1}} {{" ".$order_address->address2}} {{" ".$order_address->county}} {{" ".$order_address->postcode}} {{" ".$order_address->country}}
                                </p>
                            </div>
                            @if($order->status == 0)
                            <div class="col-lg-6 text-end">
                                <button class="btn btn-outline-danger cancel-order rounded-0" type="button" data-id="{{$order->id }}">Cancel Order</button>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

</div>
@else

{{-- If there's no orders --}}

<div class="row text-center w-100 mt-5">
    <div class="col-12 h3">
        <i class="bi bi-bag-plus"></i> <span>It looks like you have no orders</span>
    </div>
    <div class="col-12">
        <a class="btn btn-dark rounded-0 mt-2" href="{{route('home')}}">Continue shopping</a>
    </div>
</div>

<div class="container w-100 px-0 mt-5 py-5">
    <h2 class="text-bold text-center font-weight-bold text-secondary">Discover the latest</h2>
    <div class="card-deck card-container justify-content-between">
                @foreach ($products as $product)
                @if($loop->index >= 4)
                    @break
                @else
                <div class="card product-card my-4 rounded-0">
                    <a href="{{route('showProduct', ['product' => $product])}}">
                    <img class="card-img-top rounded-0" src="{{$product -> image}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$product-> title}}</h5>
                        <p class="card-text">{{$product-> description}}</p>
                    </div>
                    <div class="card-footer mb-2">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <p class="card-text h5 ">£{{$product-> price}}</p>
                            </div>
                            <div class="col-8 btn-group">
                                <button class="add-to-cart btn btn-outline-dark rounded-0" type="button" class="btn btn-sm btn-outline-secondary" 
                                        data-id="{{$product->id}}" data-name="{{$product->title}}" data-price="{{$product->price}}">Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                @endforeach
                    
            </div>
  </div>

@endif

@endsection

@section('footer-scripts')
<script type="module">
    $(document).ready(function(){
        $('.cancel-order').on('click', function(event){
            var index = $(this).data("id");
            console.log('cancel order check')

            $.ajax('/cancelOrder',
                {
                    type: 'POST',
                    data: {"_token": "{{ csrf_token() }}","index": index},
                    success:function(){
                        console.log("Order cancelled correctly");
                    }
                }
            )
        })
    })
</script>
@endsection