@extends('layouts.app')

@section('content')
<head>
    <h1> Capitano Clothing</h1>
  <img src="{{URL('images/banner.gif')}}"  alt="Banner Image" style="width:100%; height:400px" data-mdb-toggle="animation"/>
  
  
</head>
<br> <br>

<body>

<section id="ProductsOnSale" class="p-3 mb-2 bg-danger text-white">

<h2>Products on Sale</h2> 


<div  id="carouselProducts"  class="carousel slide">

<div class="carousel-inner">
 <div class="carousel-item active">
 <div class="text-center">
  <img class="img-thumbnail" src="{{url('images/sale.jpg')}}" alt="On Sale" style= "width: 50%; height:350px">
  <div class="text"><p>Hurry up and grab our products at a discounted price! For a limited time only. 
      Offering quality at an affordable price. Browse through to see our amazing collection</p> </div>
</div>
 </div>

  <div class="carousel-item">
  <div class="text-center">
    <img class="img-thumbnail" src="{{URL('images/productWomen.jpg')}}" alt="On Sale" style= "width: 50%; height:450px">
    <div class="text"><p>Women's matching sports bra and leggins-£30</p>NOTE: WHEN CUSTOMER CLICKS ON PRODUCT, IT LEADS TO THE SINGLE PRODUCT'S PAGE</div>
  </div>
</div>

  <div class="carousel-item">
  <div class="text-center">
    <img class="img-thumbnail" src="{{URL('images/productMen.jpg')}}" alt="On Sale" style= "width: 50%; height:450px">
    <div class="text"><p>Men's Joggers-£15</p></div>
  </div>
</div>

  <div class="carousel-item">
  <div class="text-center">
    <img class="img-thumbnail" src="{{URL('images/productWomen1.jpg')}}" alt="On Sale" style= "width: 50%; height:450px">
    <div class="text"><p>Women's crop top and leggins-£30<p></div>
  </div>
  </div>

 
 

</div>

 <!--next and previous buttons-->

<button class="carousel-control-prev" type="button" role="button" data-bs-target="#carouselProducts"
            data-bs-slide="prev" >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </button> 
        
        <button class="carousel-control-next" type="button" data-bs-target="#carouselProducts"
            data-bs-slide="next" >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button> 


</section>

<br><br>


<section class="companyNews">
  <h2 style="text-align:center">Company News</h2> <br>
<div class="container-fluid">
  <div class="row">
   <div class="col-md-6">
    <div class="card">
   <div class="card-body">
     <h3 class="card-title" style="text-align:center">New Launch</h3>
     <p class="card-text" >Capitano Clothing launches a brand new collection in collaboration with award winning designer Regina Geller. 
     Behind every design is an entire story and a purpose, and we love sharing what makes each one so special!
     Our new collection added small touches to your favorite staples to make them even more special, while mixing in something new as well.
     Additionally, YOU requested more leggings and neutrals, so we started there.
     Our collection is designed to give you a luxurious workout experience.</p>
   </div>
    </div>
   </div>
   <div class="col-md-6">
   <div class="card">
   <div class="card-body">
     <h3 class="card-text" style="text-align:center">Giving back to the community</h3>
     <p>To celebrate its four year anniversary since opening, Capitano Clothing orgarnised a charity fair. The company raised £100 thousand pounds 
      for the Youth Sport Trust which is the UK's leading charity, improving every young person's education and development through sport and play.
      In addition, Capitano Clothing gave out vouchers for people to spend on its website. We also hosted a free webinar. 
    </p>
   </div>
 </div>
</section>
</body>

<br><br><br><br>

<section class="linkToShop" style=" position: relative; text-align: center;color: white;">


<img src="{{URL('images/barbell.jpg')}}" class="rounded float-left" alt="Shop" style= "width: 100%; height:550px">
<div style="position: absolute;top: 8px;left: 60px;color:white; font-size:50px">Step Up Capitano</div>
<div style="position: absolute;top: 70px;left: 60px;color:white; font-size:30px">Always providing the best!</div>
<button type="button" class="btn btn-light"  style="position: absolute;top: 130px;left: 90px;"> <a href="/men">Shop Men</a></button>
<button type="button" class="btn btn-light"  style="position: absolute;top: 130px;left: 200px;"> <a href="/women">Shop Women</a></button>
</section>



@endsection