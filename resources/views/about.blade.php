@extends('layouts.app')

@section('content')
    <h1>About us</h1>
    <br>
    <!--
     <p> ideas: use banners for vision/mission. Have pictures related to working out and motivating people.
        check other sport websites for  inspiration </p>

        -Links to partner charities and brands (encourage people to donate to sport charities)
        -Communicate the story of your business and why you started it.
        -Describe the customers or the cause that your business serves.
        -Explain your business model or how your products are made.
        -Put a face to your business, featuring the founders or the people on your team.
        -Incorporate persuasive content (e.g., an explainer video, data visualizations, links to blog posts) that might otherwise clutter your homepage.
-->

<div class="container">
<div class="row">

<div class="col">

<img src="{{URL('images/motivation2.jpg')}}"alt="motivation" style= "width: 110%; height:300px">
</div>
<div class="col">
        <h3 class="text-center" style="font-size:50px">Values</h3>
       
    <ul  class="text-center">
        <li class="list-group-item list-group-item-primary" style="font-size:30px" >Integrity</li> 
        <li class="list-group-item list-group-item-success" style="font-size:30px">Team Spirit</li>
        <li class="list-group-item list-group-item-danger" style="font-size:30px">Be ethical</li>
        <li class="list-group-item list-group-item-warning" style="font-size:30px">Diversity</li>
        <li class="list-group-item list-group-item-secondary" style="font-size:30px">Inclusivity</li>
    </ul>   
</div>

<div class="col">

<img src="{{URL('images/motivation3.jpg')}}"  alt="motivation" style= "width: 110%; height:300px">
</div>
</div>
<br><br>

<div class="row">
<div class="col">
    <h2 style="color: red"> Make a difference in children's life. Donate below</h2>
 <a href="https://www.unitedthroughsport.org/how-you-can-help/donate/">
<img src="{{ URL('images/donate.png')}}" alt="donate" style= "width: 100%; height: 300px"> </a>
</div>
<div class="col">


<h3  style="font-size:50px">Mission</h3>
     <p  style="font-size:25px">Our mission is to promote health and physical acitivity amongst young adults by
        offering a wide range of high quality, comfortable workout clothes at a reasonable price.
        We strive to improve our competitive position and become the market leader, thus we are
        constantly strengthening our brand and products. </p>
</div>
</div>

<br><br>

<div class="row">
    <div class="col">
    <h3 style="font-size:50px">Vision</h3>
     <p style="font-size:28px">Capitano Clothing strives to be the world leader in sustainable fitness clothes. Our vision is to bring people
        together, enrich lives and enhance people's ambitions globally- making sports wear accessible to young adults. 
     </p>
    </div>
    <div class="col">
    <img src="{{URL('images/motivation1.jpg')}}"  alt="motivation" style= "width: 90%; height:340px">
</div>
    
</div>

<br><br>

    <h3>Company History (can remove)</h3>
    <p>Capitano clothing was launched in 2020Capitano Clothing sources all of its supplies from ethical suppliers. All of our products are enviromentally friendly</p>
    

    <h3>Our Founders</h3>
    <div class="container">
     <div class="row">
     <div class="col-sm">
     <img  class="rounded-circle" src="{{url('images/founder1.jpg')}}" alt="our founder" style= "width: 20%; height:150px">
    <p>Emily Rodriguez
        Education: Masters Degree in Computer Science

    </p>
    </div>
   <div class="col-sm">
    <img class="rounded-circle"  src="{{url('images/founder2.jpg')}}" alt="our founder" style= "width: 20%; height:150px">
    <p>Jonas Rodriguez
        Education: Bacherlors in Business Management </p>
   </div>
</div>
    <br> <br>
    
    <h3>FAQs (optional)</h3>
    </div>
@endsection