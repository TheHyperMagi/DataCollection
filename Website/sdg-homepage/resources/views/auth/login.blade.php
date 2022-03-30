<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 19:49:04 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{url('frontend')}}/img/favicon.png">
    <title>Sign In - BOP Hub</title>

    <link rel="stylesheet" type="text/css" href="{{url('frontend')}}/vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="{{url('frontend')}}/vendor/slick/slick-theme.min.css" />

    <link href="{{url('frontend')}}/vendor/icons/feather.css" rel="stylesheet" type="text/css">

    <link href="{{url('frontend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{url('frontend')}}/css/style.css" rel="stylesheet">
</head>

<body>
    <style>
        .text-green {
            background: green;
            color: white;
            padding: 15px 100px;
        }

        .mb-44 {
            background: #ff0000ba;
            padding: 12px 10px;
            color: #fff;
        }

        .message {
            padding: 11px 11px;
            background: red;
            color: #fff;
        }
    </style>
    <div class="bg-white">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex vh-100">

                <div class="col-md-4 mx-auto">
                    <div class="osahan-login py-4">
                        <x-jet-validation-errors class="mb-44 message"/>
                        @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="text-center mb-4">
                            <h5 class="font-weight-bold mt-3">Sign-In to BOP Hub</h5>
                        </div>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label class="mb-1">Email</label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-at-sign position-absolute"></i>
                                    <input type="email" name="email" class="form-control" :value="old('email')">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="mb-1">Password </label>
                                <div class="position-relative icon-form-control">
                                    <i class="feather-unlock position-absolute"></i>
                                    <input type="password" name="password" class="form-control" autocomplete="current-password">
                                </div>
                            </div>

                            <button class="btn btn-primary btn-block text-uppercase" type="submit"> Login </button>
                        </form>

                        <div class="py-3 d-flex align-item-center">
                            <a href="{{route('password.request')}}">Forgot password?</a>
                            <span class="ml-auto"> No a Registered User? <a class="font-weight-bold" href="{{url('register')}}">Sign Up</a></span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{url('frontend')}}/vendor/jquery/jquery.min.js" type="a4afd556160c34b9797c32b6-text/javascript"></script>
    <script src="{{url('frontend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js" type="a4afd556160c34b9797c32b6-text/javascript"></script>

    <script type="a4afd556160c34b9797c32b6-text/javascript" src="{{url('frontend')}}/vendor/slick/slick.min.js"></script>

    <script src="{{url('frontend')}}/js/osahan.js" type="a4afd556160c34b9797c32b6-text/javascript"></script>
    <script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="a4afd556160c34b9797c32b6-|49" defer=""></script>
    <script defer src="../../../../static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"6ada84c449853378","version":"2021.11.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 19:49:04 GMT -->

</html>