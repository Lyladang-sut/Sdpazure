@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center bg-white" style="padding:10px">
        
            <div class="col-md-8" style="background:url(images/bg.png)">
                
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        

                    </div>

                    <div class="card-body">
                    
                        <div class="user">
                            <div id="esp-user-profile" data-percent="65" style="height: 130px; width: 130px; line-height: 100px; padding: 15px;" class="easy-pie-chart">
                            </div>
                            <h4 class="fs-16 mt-15 mb-5 fw-300 no-margin">SDP TVET Database</h4>
                            <p class="mb-0 text-muted">Management System</p>
                        </div>



                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="panel-body">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Username" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="panel-body">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif   
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        
    </div>
</div>
@endsection
