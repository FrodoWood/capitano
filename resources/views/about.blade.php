@extends('layouts.app')

@section('content')
    <h1>About us</h1>
     <p> ideas: use banners for vision/mission. Have pictures related to working out and motivating people.
        check other sport websites for  inspiration </p>

        -Links to partner charities and brands (encourage people to donate to sport charities)
        -Communicate the story of your business and why you started it.
        -Describe the customers or the cause that your business serves.
        -Explain your business model or how your products are made.
        -Put a face to your business, featuring the founders or the people on your team.
        -Incorporate persuasive content (e.g., an explainer video, data visualizations, links to blog posts) that might otherwise clutter your homepage.
    <h3>Values</h3>
    <ul>
        <li>Integrity</li>
        <li>Team Spirit</li>
        <li>Be ethical</li>
        <li>Diversity</li>
        <li>Inclusivity</li>
    </ul>    

    <h3>Mission</h3>
     <p>Our mission is to promote health and physical acitivity amongst young adults by
        offering a wide range of high quality, comfortable workout clothes at a reasonable price.
        We strive to improve our competitive position and become the market leader, thus we are
        constantly strengthening our brand and products. </p>

    <h3>Vision</h3>
     <p>Capitano Clothing strives to be the world leader in sustainable fitness clothes. Our vision is to bring people
        together, enrich lives and enhance people's ambitions globally- making sports wear accessible to young adults. 
     </p>


    <h3>Company History (can remove)</h3>
    <p>Capitano Clothing sources all of its supplies from ethical suppliers. All of our products are enviromentally friendly</p>
    

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
@endsection