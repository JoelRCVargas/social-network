@extends('layouts.app')
@section('content')
<!-- page-wrapper Start-->
<section>         
      <!--@yield('content')-->
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <div class="login-card">
              <form class="theme-form login-form"method="POST" action="{{ route('login') }}">
                        @csrf
                <h4>{{ __('Login') }}</h4>
                <h6>Welcome back! Log in to your account.</h6>
                <div class="form-group">
                  <label>{{ __('E-Mail Address') }}</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('Password') }}</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <input id="checkbox1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="checkbox1">{{ __('Remember Me') }}</label>
                  </div> @if (Route::has('password.request'))
                                    <a class="link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">{{ __('Login') }}</button>
                </div>
                <div class="login-social-title">                
                  <h5>Mi Candidato App</h5>
                </div>
                <p>No tiene una cuenta?<a class="ms-2" href="{{ route('register') }}">Crear una cuenta</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--@yield('content')-->
    </section>
    <!-- page-wrapper end-->
@endsection
