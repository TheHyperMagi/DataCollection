<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/company-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 19:48:54 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="{{url('frontend')}}/img/favicon.png">
    <title>BOP Hub</title>

    <link rel="stylesheet" type="text/css" href="{{url('frontend')}}/vendor/slick/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="{{url('frontend')}}/vendor/slick/slick-theme.min.css" />

    <link href="{{url('frontend')}}/vendor/icons/feather.css" rel="stylesheet" type="text/css">

    <link href="{{url('frontend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{url('frontend')}}/css/style.css" rel="stylesheet">
</head>

<body>
    <style>
        .osahan-nav-top .osahan-list-dropdown .nav-link i {
            font-size: 16px;
        }

        .nav-link {
            float: left;
        }
    </style>
    <nav class="navbar navbar-expand navbar-dark bg-dark osahan-nav-top p-0">
        <div class="container">
            <a class="navbar-brand mr-2" href="{{url('/')}}"><img src="{{url('frontend')}}/img/mylogo.png" alt="">
            </a>
            <!--form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control shadow-none border-0" placeholder="Search people, jobs & more..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn" type="button">
                            <i class="feather-search"></i>
                        </button>
                    </div>
                </div>
            </!--form-->
            <ul class="navbar-nav ml-auto d-flex align-items-center">
                @if (Route::has('login'))
                @auth

                @if(Auth::user()->type === 'ADM')
                <li class="nav-item">
                    <a href="{{url('admin-dashboard')}}" class="btn btn-primary"> <i class="feather-plus"></i> Visit Dashboard </a>
                </li>&nbsp;&nbsp;
                <li class="nav-item"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                <form action="{{route('logout')}}" method="POST" id="logout-form">
                    @csrf
                </form>
                @elseif(Auth::user()->type === 'EMP')
                <li class="nav-item">
                    <a href="{{url('employee-dashboard', Auth::user()->name)}}" class="btn btn-primary"> <i class="feather-plus"></i> Visit Dashboard </a>
                </li>&nbsp;&nbsp;
                <li class="nav-item"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                <form action="{{route('logout')}}" method="POST" id="logout-form">
                    @csrf
                </form>
                @else
                <li class="nav-item">
                    <a href="{{url('candidate-dashboard', Auth::user()->name)}}" class="btn btn-primary"> <i class="feather-plus"></i> Visit Dashboard </a>
                </li>&nbsp;&nbsp;
                <li class="nav-item"><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-primary"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
                <form action="{{route('logout')}}" method="POST" id="logout-form">
                    @csrf
                </form>
                @endif

                @else
                <li class="nav-item">
                    <a href="{{url('login')}}" class="btn btn-primary"> <i class="feather-plus"></i> Sign In </a>
                </li>&nbsp;&nbsp;
                <li class="nav-item">
                    <a href="{{url('register')}}" class="btn btn-primary"> <i class="feather-plus"></i> Sign Up </a>
                </li>
                @endif
                @endif


                <li class="nav-item dropdown no-arrow mx-1 osahan-list-dropdown">
                    <a class="nav-link" href="https://www.facebook.com/squarespace">
                        <i class="feather-facebook"></i>&nbsp;&nbsp;
                    </a>
                    <a class="nav-link" href="https://www.linkedin.com/company/squarespace/">
                        <i class="feather-linkedin"></i>&nbsp;&nbsp;
                    </a>
                    <a class="nav-link" href="https://www.instagram.com/bop_hub/">
                        <i class="feather-instagram"></i>&nbsp;&nbsp;
                    </a>

                </li>

            </ul>
        </div>
    </nav>
    <div class="profile-cover text-center">
        <img class="img-fluid" src="{{url('frontend')}}/img/SDG-logo-horizontal.png" width="85%" alt="">
    </div>
    <style>
        .bg-white {
            background-color: #0086fa !important;
        }

        @media only screen and (max-width: 600px) {
            .navbar .navbar-light {
                padding: 0px 0px;
            }

            .profile-left .navbar-brand img {
                width: 50px;
                margin-left: 20px;
            }

            .profile-left .navbar a {
                font-size: 12px !important;
            }
        }
    </style>
    <div class="bg-white shadow-sm border-bottom mybg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <style>
                            .profile-left .navbar a {
                                color: white;
                                font-size: 15px;
                                font-weight: 500;
                            }

                            .navbar-light .navbar-brand:focus,
                            .navbar-light .navbar-brand:hover {
                                color: rgb(0 85 138);
                            }
                        </style>
                        <div class="profile-left">

                            <nav class="navbar navbar-light">
                                <a style="margin-left: -35px;" class="navbar-brand mr-2" href="{{url('/')}}"><img src="{{url('frontend')}}/img/mylogo.png" width="105px;" alt="">
                                </a>&nbsp;&nbsp;
                                <a class="navbar-brand" href="{{url('/')}}">SDG Goals</a>
                                <a class="navbar-brand" href="#">Be More</a>
                                <a class="navbar-brand" href="#">Feel More</a>
                                <a class="navbar-brand" href="#">Do More</a>
                                <a class="navbar-brand" href="#">Collaborate More</a>
                                <a class="navbar-brand" href="#">BOP Hub</a>
                                <a class="navbar-brand" href="#">Events</a>
                                <a class="navbar-brand" href="#">Contact Us</a>
                            </nav>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>





    @yield('content')

    <!-- footer section -->
    <div class="mt-4" style="background-color: #edeae5;">
        <footer class="container py-5">
            <div class="row">
                <div class="col-md-2">
                    <h5>BOP Hub Limited</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2 mt-3">The SDG Centre
                            26 Ubi Rd 4 #02-00
                            Singapore 408613</li>
                        <li class="nav-item mb-2"><a href="mailto:info@bophub.com" class="nav-link p-0">INFO@bophub.org</a></li>
                    </ul>
                </div>

                <div class="col-md-2">
                    <h5>Our Work</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Feel More</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Do More</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Collaborate More</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">SDG Goals</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5>Important Link</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Login</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Register</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <form>
                        <h5>Subscribe to our newsletter</h5>
                        <p>Monthly digest of whats new and exciting from us.</p>
                        <div class="d-flex w-100 gap-2">
                            <label for="newsletter1" class="visually-hidden">Email address</label>
                            <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                            <button class="btn btn-primary" type="button">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="d-flex justify-content-between py-4 my-4 border-top border-dark">
                <p> &copy; 2021 BOP Hub Limited. All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a class="link-dark h4" href="#"><i class="bi bi-linkedin"></i></a></li>
                    <li class="ms-3"><a class="link-dark h4" href="#"><i class="bi bi-facebook"></i></a></li>
                    <li class="ms-3"><a class="link-dark h4" href="#"><i class="bi bi-instagram"></i></a></li>
                </ul>
            </div>
        </footer>
    </div>



    <script src="{{url('frontend')}}/vendor/jquery/jquery.min.js" type="f4af15ac958706780efff2c0-text/javascript"></script>
    <script src="{{url('frontend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js" type="f4af15ac958706780efff2c0-text/javascript"></script>

    <script type="f4af15ac958706780efff2c0-text/javascript" src="{{url('frontend')}}/vendor/slick/slick.min.js"></script>

    <script src="{{url('frontend')}}/js/osahan.js" type="f4af15ac958706780efff2c0-text/javascript"></script>
    <script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="f4af15ac958706780efff2c0-|49" defer=""></script>
    <script defer src="../../../../static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"6ada84a789a53378","version":"2021.11.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from askbootstrap.com/preview/osahanin/light/company-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Nov 2021 19:48:55 GMT -->

</html>