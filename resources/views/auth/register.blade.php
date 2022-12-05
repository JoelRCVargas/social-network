@extends('layouts.app')

@section('content')
<!-- page-wrapper Start-->
<section>         
      <!--@yield('content')-->
      <div class="container-fluid p-0"> 
        <div class="row m-0">
          <div class="col-12 p-0">    
            <div style="display: block; height: 100%;" class="login-card">
                <form method="POST"  class="theme-form login-form" action="{{ route('register') }}">
                        @csrf
                <h4>{{ __('Register') }}</h4>
                <h6>Ingresa tus datos personales para crear una cuenta</h6>
                <div class="form-group">
                  <label>{{ __('Name') }}</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-user"></i></span>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Tu nombre">
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('E-Mail Address') }}</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-email"></i></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ejemplo@dominio.com">

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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="**********">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label>{{ __('Confirm Password') }}</label>
                  <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="**********">
                  </div>
                </div>
                <div class="login-social-title">                
                  <h5>Datos administrativos</h5>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="media p-20">
                              <div class="radio radio-primary me-3">
                                <input id="radio1" type="radio" name="adm" value="1" checked>
                                <label for="radio1"></label>
                              </div>
                              <div class="media-body">
                                <h6 class="mt-0 mega-title-badge">Individual<span class="badge badge-primary pull-right digits">1</span></h6>
                                <p>Administra tu red propia.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="media p-20">
                              <div class="radio radio-secondary me-3">
                                <input id="radio2" type="radio" name="adm" value="2" >
                                <label for="radio2"></label>
                              </div>
                              <div class="media-body">
                                <h6 class="mt-0 mega-title-badge">Colaborativo<span class="badge badge-secondary pull-right digits">2</span></h6>
                                <p>Administra tu red y 20 Sub-redes.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                     
                      
                        <!--<div class="col-sm-6">
                          <div class="card">
                            <div class="media p-20">
                              <div class="radio radio-primary me-3">
                                <input id="radio3" type="radio" name="adm" value="3">
                                <label for="radio3"></label>
                              </div>
                              <div class="media-body">
                                <h6 class="mt-0 mega-title-badge">Colaborativo Plus<span class="badge badge-primary pull-right digits">3</span></h6>
                                <p>Administra tu red y 50 Sub-redes.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="card">
                            <div class="media p-20">
                              <div class="radio radio-secondary me-3">
                                <input id="radio4" type="radio" name="adm" value="4">
                                <label for="radio4"></label>
                              </div>
                              <div class="media-body">
                                <h6 class="mt-0 mega-title-badge">Colaborativo Pro<span class="badge badge-secondary pull-right digits">4</span></h6>
                                <p>Administra tu red y Sub-redes ilimitadas.</p>
                              </div>
                            </div>
                          </div>
                        </div>-->
                       </div>
                <div class="form-group">
                  
                    <label class="text-muted" for="checkbox1">Al registrarte aceptas nuestras <span>Politicas de privacidad de datos</span></label>
                  
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-block" type="submit">Crear cuenta</button>
                </div>
                <div class="login-social-title">                
                  <h5>Mi candidato App</h5>
                </div>
                <p>Ya tienes una cuenta?<a class="ms-2" href="{{ route('login') }}">Ingresa Aquí</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--@yield('content')--> 
    </section>
    <!-- page-wrapper end-->
@endsection
