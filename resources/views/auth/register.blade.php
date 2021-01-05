@extends('layouts.app')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <img src="/modernadmin/app-assets/images/logo/logo-dark.png" alt="branding logo">
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Formulario de registro</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal"  method="POST" action="{{ route('register') }}" >
                      @csrf
                      <fieldset class="form-group position-relative has-icon-left">
                        <select class="form-control" name="rol" id="rol">
                            <option value="" selected disabled>Selecione un rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Vendedor</option>
                        </select>
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        @error('rol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nombre Completo">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Correo" required="">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control" id="password" name="password"  placeholder="Escribir contraseña" required="">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña" required="">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </fieldset>
                      <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-user"></i> Registrarse</button>
                    </form>
                  </div>
                  <div class="card-body">
                    <a href="{{ route('login') }}" class="btn btn-outline-danger btn-block"><i class="ft-unlock"></i> Iniciar Sesión</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>

@endsection
