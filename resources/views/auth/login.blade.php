@extends('layouts.app')

@section('content')
<div class="container">
 
<div class="row">
<div class="mb-12">
<div class="mb-2" style="float:left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
<div class="mb-4" style="float:left">
<div class="img" >
	<img src="{{ URL('images/image_6487327.JPG')}}" height="400"/>
</div>
</div>
<div class="mb-5 " style="float:left; margin-left:50px;"> 
<h3 class="text-center">{{ __('Login') }}</h3>

<div class=" ">
<p class="social-media d-flex justify-content-end">
<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
</p>
</div>
 
<form method="POST" action="{{ route('login') }}">
                        @csrf
                       
                          <div class="form-group">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 ">{{ __('Password') }}</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                             
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                
                            </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                       </div>
                       <div class="form-group" style="margin-top:100px;">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                Not a member? <a data-toggle="tab" href="#signup">Sign Up</a>
                        </div>
                    </form>
 
</div>
 
</div>
</div>
 
</div>
@endsection
