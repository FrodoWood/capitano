@extends('layouts.app')

@section('content')
<head>
    <h1> Capitano Clothing</h1>
  <img src="{{URL('images/drew-beamer-Vc1pJfvoQvY-unsplash.jpg')}}"  alt="Banner Image" style="width:90%; height:300px" data-mdb-toggle="animation"/>
  
</head>

<body>

<section class="ProductsOnSale">

<h2>Products on Sale</h2> 


<div  id="carouselExampleCaptions"  class="carousel slide">
<div class="carousel-inner">
 <div class="carousel-item active">
  <img src="{{url('images/sale.jpg')}}" alt="On Sale" style= "width: 50%; height:350px">
  <div class="text">Hurry up and grab our products at a discounted price! For a limited time only. 
      Offering quality at an affordable price. Browse through to see our amazing collection </div>
</div>

  <div class="carousel-item">
    <img src="{{URL('images/productWomen.jpg')}}" alt="On Sale" style= "width: 50%; height:450px">
    <div class="text">Women's matching sports bra and leggins</div>
  </div>

  <div class="carousel-item">
    <img src="{{URL('images/productMen.jpg')}}" alt="On Sale" style= "width: 50%; height:450px">
    <div class="text">Men's Joggers</div>
  </div>

  <div class="carousel-item">
    <img src="{{URL('images/productWomen1.jpg')}}" alt="On Sale" style= "width: 50%; height:450px">
    <div class="text">Women's crop top and leggins</div>
  </div>

  <!--delete before submitting
PROB: Only previous button works-->
<!-- https://www.fundaofwebit.com/ecommerce-template/how-to-make-ecommerce-slider-design-using-html-css-and-bootstrap  -->

  <button class="carousel-control-prev" type="button" role="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev" >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" role="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
</div>

  <!-- Next and previous buttons 
  <a class="previous" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a> -->

  
  


<!-- put in a separate js file then link-->
<!--it doesnt work when I put it in a separate page

<script>
let Index = 1;
displaySlides(Index);

// Next& previous controls
function plusSlides(n) {
  displaySlides(Index += n);
}



function displaySlides(n) {
  let slides = document.getElementsByClassName("Products");
  if (n > slides.length) {Index = 1}
  if (n < 1) {Index = slides.length}
  for (let index = 0; index < slides.length; index++) {
    slides[index].style.display = "none";
  }
  slides[Index-1].style.display = "block";
  
}

</script> -->

</section>

<br><br>

<section class="companyNews">
<div class="container">
  <div class="row">
   <div class="col-sm">
     <h2>New Launch</h2>
     <p>Capitano Clothing launches a brand new collection of leggins in collaboration with award winning designer Regina Geller.</p>
   </div>
   <div class="col-sm">
     <h2>Giving back to the community</h2>
     <p>To celebrate its four year anniversary since opening, capitano clothing orgarnised a charity fair. The company raised £100 thousand pounds 
      for the Youth Sport Trust which is the UK's leading charity, improving every young person's education and development through sport and play.</p>
   </div>
 </div>
</section>
</body>

<br><br><br><br>

<section class="linkToShop" style=" position: relative; text-align: center;color: white;">


<img src="{{URL('images/barbell.jpg')}}" class="rounded float-left" alt="Shop" style= "width: 95%; height:450px">
<div style="position: absolute;top: 8px;left: 60px;color:white; font-size:50px">Step Up Capitano</div>
<div style="position: absolute;top: 70px;left: 60px;color:white; font-size:30px">Always providing the best!</div>
<button type="button" class="btn btn-light"  style="position: absolute;top: 130px;left: 90px;"> <a href="/men">Shop Men</a></button>
<button type="button" class="btn btn-light"  style="position: absolute;top: 130px;left: 200px;"> <a href="/women">Shop Women</a></button>
<!-- Delete before submitting
  reason y I put those href: web.php line 33 + 34 -->
</section>

<footer>
 
  <a href=" https://www.instagram.com/capitano.clothing_/"> Instagram</a>
  <a href="//twitter.com/CapitanoCloth"> Twitter </a>
   <img src="{{URL('images/copyright.jpg')}}"  alt="copyright" style="width:150px" /> 
</footer>

@endsection