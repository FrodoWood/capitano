@extends('layouts.app')

<head>
<style>
  body{
    background-image: url('https://images.pexels.com/photos/715134/pexels-photo-715134.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') ;
  }
 /* #form-container{
    background-image: url('https://img.freepik.com/free-vector/royal-watercolor-valentine-red-background_1340-4006.jpg?w=360') ;
    
  } */
  </style>
</head>

@section('content')

<div class="container">
  <form class="container form-control center contactForm" id="form-container">
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
      <div class ="container">
      <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </form>
  </div>
</div>

@endsection












