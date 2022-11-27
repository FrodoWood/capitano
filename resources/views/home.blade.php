@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('warning') }}
                        </div>
                    @endif

                    @if (session('fail'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('fail') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> 
{{-- end dashboard container --}}

{{-- Cart button and text --}}
<div class="container pt-4">
    <a class="btn btn-success" href="">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </svg>
        <span id="items-in-cart">0</span> items in cart
    </a>
</div>
    
    <h1 class="text-center">Store</h1>

{{-- Products section --}}
<div class="container">


    <div class="card-deck card-container">
            
                @foreach ($womenProducts as $womenProduct)
                    
                        <a href="{{route('showProduct', ['product' => $womenProduct])}}">

                            <div class="card product-card mb-5 m-4 ">
                                <img class="card-img-top" src="{{$womenProduct -> image}}" alt="Card image cap">
                        </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{$womenProduct-> title}}</h5>
                                    <p class="card-text">{{$womenProduct-> description}}</p>
                                </div>
                                <div class="card-footer mb-2">
                                    <div class="row align-items-center">
                                        <div class="col-4">
                                            <p class="card-text h5 ">£{{$womenProduct-> price}}</p>
                                        </div>
                                        <div class="col-8 btn-group">
                                            <input type="number" value="1" min="1" max="100">
                                            <button class="add-to-cart" type="button" class="btn btn-sm btn-outline-secondary" 
                                                    data-id="{{$womenProduct->id}}" data-name="{{$womenProduct->title}}" data-price="{{$womenProduct->price}}">Add to Cart</button>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                    @endforeach
                    
            </div>
    </div>

@endsection

@section('footer-scripts')

<script>
        function myFunction(){
        alert("Hello js is working!");
        }
</script>

<script type="module">
    $(document).ready(function(){
        window.cart = <?php echo json_encode($cart) ?>;
            updateCartButton();
            $('.add-to-cart').on('click', function(event){
                var cart = window.cart || [];
                cart.push({'id':$(this).data('id'), 'name':$(this).data('name'), 'price':$(this).data('price'), 'qty':$(this).prev('input').val()});
                window.cart = cart;
                $.ajax('/home/add',
                {
                    type: 'POST',
                    data: {"_token": "{{ csrf_token() }}", "cart":cart},
                    success: function(data, status, xhr){
                    }
                });
                updateCartButton();
            });
        })
        function updateCartButton(){
            var count = 0;
            window.cart.forEach(function(item, i){
                count+= Number(item.qty);
            });
            $('#items-in-cart').html(count);
            console.log(cart);
        }

</script>

@endsection


