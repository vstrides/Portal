@extends('layouts.app')

@section('content')
<div class="row">
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <a class="hiddenanchor" id="reset"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
              <h1>Login Form</h1>
              {{ csrf_field() }}
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        
                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="checkbox">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="pull-">Remember Me
                                    </div>                        
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-default pull-right">
                                    Login
                                </button> 
                            </div>    
                        </div>
                        <a class="to_register" href="#reset">
                                    Lost your Password ?
                        </a>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>
              </div>
            </form>
          </section>
        </div>
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <h1>Create Account</h1>
                        
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Name" required autofocus>
                        
                        
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                               
                        
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        
                        <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-default pull-right">
                                    Register
                                </button>    
                        </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>
              </div>
            </form>
          </section>
        </div>
        <div id="reset" class="animate form reset_form">
          <section class="login_content">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <h1>Reset Password</h1>
                        
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                        
                        <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    Send Password Reset Link
                                </button>
                        </div>
              <div class="clearfix"></div>
              <div class="separator">
                <p class="change_link">Back to
                  <a href="#signin" class="to_register">Log in </a>
                </p>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
@endsection
