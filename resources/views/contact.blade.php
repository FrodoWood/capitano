@extends('layouts.app')

<!-- <head>
<style>
  body{
    background-image: url('https://images.unsplash.com/photo-1567360425618-1594206637d2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cmVkJTIwYmFja2dyb3VuZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=1000&q=60') ;
  }
  </style>
</head> -->

@section('content')

<div class="container">
  <form class="container form-control center contactForm rounded-0" id="form-container">
  <div class="container form-control-lg  mt-4">
    <h1 class = "h1- responsive text-center mx-auto">Get In Touch</h1>
    <p class ="text-center responsive mx-auto mb-4"> Enter your details below along with your query and we will contact you back as soon as possible!</p>
    <form action="/action_page.php">
      <div class="mb-4">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
      </div>
      <div class="mb-4">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
      </div>
      <div class = "mb-4">
        <label for= "number">Phone number</label>
        <input type="phone number" class="form-control" id="number" placeholder="Enter phone number" name="number" required>
      </div>
      <div class="mb-4">
        <label for ="text area">Comments:</label>
        <textarea class ="form-control" id="text area" rows= "3"placeholder="Please enter reason for contacting us" required></textarea>
      </div>
      <div class ="mb-4">
        <label>How would you like us to contact you?</label>
        <select name ="contact" class ="form-control" id="dropdown" required>
          <option disabled selected="">Choose option</option>
          <option>Email</option>
          <option>Phone</option>
        </select>
      </div>
      </div>
      <div class=" mb-4 text-center ">
        <label>If you require immediate assistance please contact us on our 24/7 helpline on:  </label>
        <span class ="contact-more-highlight"> +01902 839 929</span>

      </div>
      <div class ="container">
      <button type="submit" class="btn btn-dark">Send</button>
      </div>
    </form>
  </div>
</div>

@endsection












