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

<div id="banner-carousel" class="homepage-banner-carousel carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

    <div class="carousel-item active">
        <video autoplay loop src="{{URL('videos/woman_yoga_3.mp4')}}" class="d-block w-100 carousel-banner-img"></video>
    </div>
      <div class="carousel-item ">
        <img src="{{URL('images/banner/woman_sitting_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_running_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
          <img src="{{URL('images/banner/woman_pose_wide_2.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
        </div>
        <div class="carousel-item">
          <img src="{{URL('images/banner/man_pose_1.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
        </div>
        <div class="carousel-item">
            <img src="{{URL('images/banner/man_woman_exercise_wide_2.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
        </div>
        <div class="carousel-item">
        <img src="{{URL('images/banner/woman_exercise_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
        </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/man_woman_exercise_wide.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_pose_6.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
      </div>
      <div class="carousel-item">
        <img src="{{URL('images/banner/woman_exercise_2.jpg')}}" class="d-block w-100 carousel-banner-img" alt="">
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

{{-- Women Products section --}}

<div class="container-fluid w-75 px-0">
    <h2 class="text-bold text-center font-weight-bold">Trending Now</h2>
    <div class="card-deck card-container justify-content-between">
                @foreach ($womenProducts as $womenProduct)
                @if($loop->index >= 4)
                    @break
                @else
                <div class="card product-card my-4 rounded-0">
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
                                        data-id="{{$womenProduct->id}}" data-name="{{$womenProduct->title}}" data-price="{{$womenProduct->price}}">Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                @endforeach
                    
            </div>
</div>
{{-- Banner --}}
<div class="container-fluid w-75 bg-danger my-5">
    <div class="row">
        <div class="col-12 p-0 m-0">
            <a href="{{url('/women')}}"><img class="img w-100 banner-img" src="{{url('images/black_friday_sale.jpg')}}" alt="On Sale"></a>
        </div>
    </div>
</div>

{{-- More products --}}
<div class="container-fluid w-75 px-0">


    <h2 class="text-bold text-center font-weight-bold">Unmissable Deals</h2>
    <div class="card-deck card-container justify-content-between">
                @foreach ($menProducts as $menProduct)
                @if($loop->index >= 4)
                    @break
                @else
                <div class="card product-card my-4 rounded-0">
                    <a href="{{route('showProduct', ['product' => $menProduct])}}">
                    <img class="card-img-top rounded-0" src="{{$menProduct -> image}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$menProduct-> title}}</h5>
                        <p class="card-text">{{$menProduct-> description}}</p>
                    </div>
                    <div class="card-footer mb-2">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <p class="card-text h5 ">£{{$menProduct-> price}}</p>
                            </div>
                            <div class="col-8 btn-group">
                                <button class="add-to-cart btn btn-outline-dark rounded-0" type="button" class="btn btn-sm btn-outline-secondary" 
                                        data-id="{{$menProduct->id}}" data-name="{{$menProduct->title}}" data-price="{{$menProduct->price}}">Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
                @endforeach
                    
            </div>
</div>

{{-- Men and women selection --}}
<div class="container-fluid w-75 px-0 my-5">
    <div class="row text-center text-uppercase h3">
        <div class="col-6 order-first">Shop women's</div>
        <div class="col-6">Shop men's</div>
    </div>
<div class="row">
    <div class="col-6 order-first">
        <a href="{{url('/women')}}"><img class="img w-100 carousel-banner-img" src="{{URL('images/woman_standing_tall_1.jpg')}}" alt="Women" ></a>
    </div>
    <div class="col-6">
        <a href="{{url('/men')}}"><img class="img w-100 carousel-banner-img" src="{{URL('images/man_standing_tall_4.jpg')}}" alt="Men" ></a>
    </div>
</div>
</div>


<div class="container-fluid w-75 px-0 my-5 ">
  <h2 class="text-center">Company News</h2>
<div class="container-fluid mt-4">
  <div class="row">
   <div class="col-md-6 mb-3">
    <div class="card rounded-0">
   <div class="card-body">
     <h3 class="card-title text-center">New Launch</h3>
     <p class="card-text" >Capitano Clothing launches a brand new collection in collaboration with award winning designer Regina Geller. 
     Behind every design is an entire story and a purpose, and we love sharing what makes each one so special!
     Our new collection added small touches to your favorite staples to make them even more special, while mixing in something new as well.
     Additionally, YOU requested more leggings and neutrals, so we started there.
     Our collection is designed to give you a luxurious workout experience.</p>
   </div>
    </div>
   </div>
   <div class="col-md-6 mb-3">
   <div class="card rounded-0">
   <div class="card-body">
    <h3 class="card-title text-center">Giving back to the community</h3>
     <div class="card-text">
        To celebrate its four year anniversary since opening, Capitano Clothing orgarnised a charity fair. The company raised £100 thousand pounds 
      for the Youth Sport Trust which is the UK's leading charity, improving every young person's education and development through sport and play.
      In addition, Capitano Clothing gave out vouchers for people to spend on its website. We also hosted a free webinar.
     </div>
   </div>
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


