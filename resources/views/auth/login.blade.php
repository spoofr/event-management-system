@extends('layouts.app') @section('content')
<style>
    body{
        background-color: #212121 !important;
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card mt-5 login-card">

                <div class="card-body mt-3">
                    <div style="font-size:3em; color:White" class="text-center">
                        <i class="far fa-user login-icon"></i>
                    </div>
                    <h2 class="text-center mt-3 mb-5">Log In</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row" style="padding: 0 7px 0 7px">
                            <div class="col-md-12">
                                <input id="email" type="email" class="login-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                    value="{{ old('email') }}" placeholder="Email" required autofocus> @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style="padding: 0 7px 0 7px">
                            <div class="col-md-12">
                                <input id="password" type="password" class="login-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" placeholder="Password" required> @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6" style="padding: 6px;">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" name="remember" {{ old( 'remember') ? 'checked' : '' }} for="customCheck1"> Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row" style="padding: 0 7px 0 7px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block mt-2">
                                    Login
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection