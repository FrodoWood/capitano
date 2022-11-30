@extends('layouts.app')

@section('content')
    

<div class="container mt-5">
    {{-- <h1 class="text-uppercase text-center my-4">Your bag</h1> --}}
    @if($cart != [])
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                </tr>
            </thead>
        
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($cart as $item)
                @php
                    $total += $item['price']*$item['qty'];
                    $imageURL = \App\Models\Product::where('id','=', $item['id'])->first()->image;
                    $product = \App\Models\Product::where('id','=', $item['id'])->first();
                @endphp
                    <tr class="align-middle">
                        <td>
                            <div class="row">
                                <div class="col-xl-2">
                                    <a href="{{route('showProduct', ['product' => $product])}}">
                                    <img height="100" src="{{$imageURL}}" alt="">
                                    </a>
                                </div>
                                <div class="col-xl-4 align-self-center">
                                    <a class="text-decoration-none text-dark" href="{{route('showProduct', ['product' => $product])}}">
                                    {{$item['name']}}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td>{{$item['price']}}</td>
                        <td>{{$item['qty']}}</td>
                        <td>
                            <button class="btn btn-danger remove-from-cart rounded-0" type="button" data-id="{{$index = $loop->index }}">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    <p class="h5 my-3">
        Total: £{{$total}}
    </p>
    <a class="btn btn-success rounded-0" href="{{route('checkout')}}">
        <i class="bi bi-lock-fill"></i>
        Checkout Securely
    </a>
    @else
    {{-- When cart is empty --}}
        <div class="row text-center w-100 mt-4 pb-4">
            <div class="col-12 h3">
                <i class="bi bi-bag-plus"></i> <span>Your bag is empty!</span>
            </div>
            <div class="col-12">
                <a class="btn btn-dark rounded-0 mt-2" href="{{route('home')}}">Continue shopping</a>
            </div>
        </div>

        <div class="container-fluid w-100 px-0 mt-5 py-5">
            <h2 class="text-bold text-center font-weight-bold text-secondary">These popular items might interest you</h2>
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

    
    
        
    
</div>
@endsection

@section('footer-scripts')

@include('addToCart')


<script type="module">
    $(document).ready(function(){
        window.cart = <?php echo json_encode($cart) ?>;
        $('.remove-from-cart').on('click', function(event){
            var index = $(this).data("id");
            var cart = window.cart;
            $(this).closest("tr").remove();
            cart.splice(index,1);


            $.ajax('/cart/delete',
                {
                    type: 'POST',
                    data: {"_token": "{{ csrf_token() }}", "cart":cart, "index": index},
                    success:function(){
                        console.log("Item deleted correctly");
                         window.location.href = "cart";
                    }
                }
            )
        })
    })
</script>
@endsection