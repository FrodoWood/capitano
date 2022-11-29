@extends('layouts.app')

@section('content')

{{-- <div class="container">
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
</div>  --}}
{{-- end dashboard container --}}

{{-- Banner --}}

<div id="banner-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_yoga_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_stretching_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item active">
        <img src="{{URL('images/banner/woman_sitting_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_running_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_pose_wide_2.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_running_wide_2.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_exercise_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_bicycle_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/man_woman_exercise_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/man_woman_exercise_wide_2.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#banner-carousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner-carousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

{{-- Products section --}}
<div class="container">


    <div class="card-deck card-container">
            
                @foreach ($womenProducts as $womenProduct)
                    
                
                <div class="card product-card mb-5 m-4 rounded-0">
                                <a href="{{route('showProduct', ['product' => $womenProduct])}}">
                                <img class="card-img-top rounded-0" src="{{$womenProduct -> image}}" alt="Card image cap">
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
                                            
                                            <button class="add-to-cart btn btn-outline-dark rounded-0" type="button" class="btn btn-sm btn-outline-secondary" 
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

<script type="module">
    $(document).ready(function(){
        window.cart = <?php echo json_encode($cart) ?>;
        updateCartButton();
        $('.add-to-cart').on('click', function(event){
                var quantity = 0;
                var cart = window.cart || [];
                if($('.quantity').val() == null){
                    quantity = 1;
                }else{
                    quantity = $('.quantity').val();
                }
                cart.push({'id':$(this).data('id'), 'name':$(this).data('name'), 'price':$(this).data('price'), 'qty':quantity});
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
            $('.cart-amount-nav').html(count);
            console.log(cart);
        }

</script>

@endsection


