﻿<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Admin Dashboard" name="description">
        <meta content="ThemeDesign" name="author">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Appzia - Responsive Admin Dashboard Template</title>

        <link rel="shortcut icon" href="{{asset('admin\images\favicon.ico')}}">
        
        <link href="{{asset('admin\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin\css\icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin\css\style.css')}}" rel="stylesheet" type="text/css">

    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">

                <div class="card-body">
                    <h3 class="text-center m-t-0 m-b-15">
                        <a href="index.html" class="logo"><img src="{{asset('admin\images\logo_white.png')}}" alt="logo-img"></a>
                    </h3>
                    <h4 class="text-muted text-center m-t-0"><b>Sign In</b></h4>

                    <form class="form-horizontal m-t-20" action="{{route('login')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" name="email" id="fname" class="form-control" placeholder="Email address" value="{{ old('email') }}" required autofocus>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" name="password" id="fname" class="form-control" placeholder="Password" required>
                              @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>                                   
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group row m-t-30 m-b-0">
                            <div class="col-sm-7">
                                <a href="pages-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a href="pages-register.html" class="text-muted">Create an account</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>



        <!-- jQuery  -->
        <script src="assets\js\jquery.min.js"></script>
        <script src="assets\js\bootstrap.min.js"></script>
        <script src="assets\js\modernizr.min.js"></script>
        <script src="assets\js\detect.js"></script>
        <script src="assets\js\fastclick.js"></script>
        <script src="assets\js\jquery.slimscroll.js"></script>
        <script src="assets\js\jquery.blockUI.js"></script>
        <script src="assets\js\waves.js"></script>
        <script src="assets\js\wow.min.js"></script>
        <script src="assets\js\jquery.nicescroll.js"></script>
        <script src="assets\js\jquery.scrollTo.min.js"></script>

        <script src="assets\js\app.js"></script>

    </body>
</html>