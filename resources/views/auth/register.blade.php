@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-9" style="background:aliceblue; padding:30px;margin-left:17%;padding-bottom:0px;">
    <div class="col-5" style="float:left">
    <div class="img" > <img src="{{ URL('images/image_6487327.JPG')}}" height="400"/> </div>
  </div>
  <div class="col-5 " style="float:left; margin-left:50px;">
    <h3 class="text-center">{{ __('Register') }}</h3>
    <div class=" ">
      <p class="social-media d-flex justify-content-end"> <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a> <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a> </p>
    </div>
    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class=" ">{{ __('Name') }}</label>

                         
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                         <div class="form-group">
                            <label for="password" class="">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             
                        </div>

                         <div class="form-group">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                        </div>

                        <div class="form-group">
                            <br>
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('Register') }}
                                </button>
                           
                        </div>
                    </form>
    
    	
    
  </div>
</div>
</div>
</div>
@endsection 