<!DOCTYPE html> 
<style>
  .column {
  float: left;
  width:47%;
  padding: 10px;
}

footer {
  text-align: right;
  padding: 3px;
  position:fixed;
  bottom:0;
  width: 100;
}

</style>
<nav>Navigation Bar will be here</nav>
<br>

<header class="header">
<h1> Capitano Clothing</h1>
  <img src="{{URL('images/drew-beamer-Vc1pJfvoQvY-unsplash.jpg')}}" alt="Banner Image" style="width:90%; height:300px"/>
</header>

<body>
<section class="companyNews">
  <div class="row">
   <div class="column">
     <h2>News 1</h2>
     <p>Details of news</p>
   </div>
   <div class="column">
     <h2>News 2</h2>
     <p>Details of news</p>
   </div>
 </div>
</section>
</body>


<footer>
  <p>footer</p>
  <a href=" https://www.instagram.com/capitano.clothing_/"> Instagram</a>
  <a href="//twitter.com/CapitanoCloth"> Twitter </a>
   <img src="{{URL('images/copyright.jpg')}}"  alt="copyright" style="width:150px" /> 
</footer>
