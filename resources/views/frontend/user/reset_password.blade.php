<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Accounts 313</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('public/assets/frontend/css/simple-sidebar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/css/style.css') }}">

    <script src="{{ asset('public/assets/frontend/vendor/fontawesome/fontawesome7a97927ccc.js') }}" type="application/javascript"></script>
    <link rel="stylesheet" href="{{ asset('public/assets/frontend/vendor/fonts/lato/stylesheet.css') }}">

</head>

<body>

<div class="container-fluid company-login">
    <div class="row">
        <div class="col-12 text-center py-4">
            <img src="{{ asset('public/assets/frontend/images/logo.png') }}" alt="">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-xl-6 col-lg-6 col-md-12 col-sm-12 loginDetails">
                <div class="row">
                    <div class="SignInTop text-center col">
                        <h4>Forgot Password</h4>
                        <p>Today is {{ \Carbon\Carbon::now()->format('l d-F-Y  h:i:s A') }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="@if(empty($check_token)) text-center @endif SignInBody col-xl-10 col-lg-10 col-md-11 col-sm-12 mx-auto pt-0 pb-4">
                        @if ($message = \Illuminate\Support\Facades\Session::get('error'))
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @elseif ($message = \Illuminate\Support\Facades\Session::get('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if(!empty($check_token))
                        {!! Form::open(array('route' => 'reset_now','id' => 'LoginUser','class'=>'form-horizontal auth-form my-4','files' => true)) !!}
                                <div class="form-group col-md-12">
                                    <label for="inputlname">Enter New Password<span>*</span></label>
                                    <input type="password" name="password" class="form-control" id="password" required="">
                                </div>
                                <input type="hidden" name="remember_token" value="{{ $code }}">
                                <div class="form-group col-md-12">
                                    <label for="inputlname">Confirm New password <span>*</span></label>
                                    <input type="password" name="cpassword" class="form-control" id="cpassword" required="">
                                </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right w-100">Reset Now</button>
                        </div>
                        {{ Form::close() }}
                        @else
                            <label for="username">Link has expired or already been visited..</label>
                        @endif
                        <div class="my-4 text-center col p-0">
                            <p class="textLight">By clicking Sign in, you agree to our<br>
                                <span class="text-dark">Terms</span> and have read and acknowledge our US <span
                                    class="text-dark">Privacy Statement.</span></p>
                        </div>
                        <div class="mt-4 mb-2 forgotPassword text-center col">
                            <a href="{{ \Illuminate\Support\Facades\URL::to('/') }}" class="text-center">login here.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('public/assets/frontend/vendor/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('public/assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


<script src="{{ asset('public/assets/frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/frontend/js/additional-methods.min.js') }}"></script>
<script type="application/javascript">
    $("#LoginUser").validate({
        rules: {
            "password": {
                required: true,
                minlength: 6
            },"cpassword": {
                required: true,
                equalTo : "#password",
                minlength: 6,
            }
        },
        messages: {
            "password": {
                required: "Please, enter an password",
                password: "Password Must contain 6 characters.",
            },
            "cpassword": {
                required: "Please, enter an password",
                confirm_password: "Password Must contain 6 characters.",
                equalTo: "Please enter the same password as above"
            }
        },
        submitHandler: function (form) {
            return true;
        }
    });
</script>

</body>
</html>
