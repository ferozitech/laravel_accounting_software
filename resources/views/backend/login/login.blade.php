<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no" />
    <meta content="Admin Login" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="{{ asset('public/assets/backend/images/favicon.ico') }}" />
    <link href="{{ asset('public/assets/backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/css/jquery-ui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/backend/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="account-body accountbg">
<!-- Log In page -->
<div class="container">
    <div class="row vh-100">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                <a href="#" class="logo logo-admin"><img src="{{ asset('public/assets/backend/images/logo-sm.png') }}" height="55" alt="logo" class="auth-logo" /></a>
                            </div>
                            <!--end auth-logo-box-->
                            <div class="text-center auth-logo-text">
                                <h4 class="mt-0 mb-3 mt-5">Accounts313</h4>
                                <p class="text-muted mb-0">Sign in to continue to Admin.</p>
                            </div>
                            @if ($message = \Illuminate\Support\Facades\Session::get('login_error'))
                                <div class="alert alert-danger" style="margin: 15px;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @elseif ($message = \Illuminate\Support\Facades\Session::get('log_out'))
                                <div class="alert alert-success" style="margin: 15px;">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            {!! Form::open(array('route' => 'SignInAdmin','id' => 'formSubmit','class'=>'form-horizontal auth-form my-4','files' => true)) !!}
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <div class="input-group mb-3">
                                        <span class="auth-form-icon"><i class="dripicons-user"></i> </span>
                                        <input id="email" type="email" class="form-control user @error('email')  is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Your Email" autofocus>
                                    </div>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <div class="input-group mb-3">
                                        <span class="auth-form-icon"><i class="dripicons-lock"></i> </span>
                                        <input id="password" type="password" class="form-control lock @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end form-group-->
                                <div class="form-group row mt-4">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-switch switch-success">
                                            <input type="checkbox" class="custom-control-input" id="customSwitchSuccess" /> <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-sm-6 text-right">
                                        <a href="auth-recover-pw.html" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end form-group-->
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end form-group-->
                        {{ Form::close() }}
                            <!--end form-->
                        </div>
                        <!--end /div-->
                        <div class="m-3 text-center text-muted">
                            <p class="">Don't have an account ? <a href="auth-register.html" class="text-primary ml-2">Free Resister</a></p>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
                <div class="account-social text-center mt-4">
                    <h6 class="my-4">Or Login With</h6>
                    <ul class="list-inline mb-4">
                        <li class="list-inline-item">
                            <a href="#" class=""><i class="fab fa-facebook-f facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class=""><i class="fab fa-twitter twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class=""><i class="fab fa-google google"></i></a>
                        </li>
                    </ul>
                </div>
                <!--end account-social-->
            </div>
            <!--end auth-page-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
<!--end container--><!-- End Log In page --><!-- jQuery  -->
<script src="{{ asset('public/assets/backend/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/metismenu.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/waves.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/feather.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/js/app.js') }}"></script>
</body>
</html>
