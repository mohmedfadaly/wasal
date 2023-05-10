<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- START:: UTF8 -->
    <meta charset="UTF-8">
    <!-- START::  AUTHOR -->
    <meta name="author" content="AhMeD EL-AwaDy">
    <!-- START:: ROBOTS -->
    <meta name="robots" content="index/follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- START:: VIEWPORT -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- START:: HANDHELFRIENDLY -->
    <meta name="HandheldFriendly" content="true">
    <!-- START:: DESCRIPTION -->
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit">
    <!-- START:: KEYWORD -->
    <meta name="keyword"
        content="agency, business, corporate, creative, freelancer, minimal, modern, personal, portfolio, responsive, simple, cartoon">
    <!-- START:: THEME COLOR -->
    <meta name="theme-color" content="#212121">
    <!-- START:: THEME COLOR IN MOBILE -->
    <meta name="msapplication-navbutton-color" content="#15264B">
    <!-- START:: THEME COLOR IN MOBILE -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#15264B">
    <!-- START:: TITLE -->
    <title>سلسلة تك - أدخل البريد</title>
    <!-- START:: FAVICON -->
    <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/logo/favicon.png')}}">
    <!-- START:: STYLE LIBRARIES -->

    <!-- START:: BOOTSTRAP -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap/bootstrap.min.css')}}">
    <!-- START:: ANIMATE -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/animate/animate.css')}}">
    <!-- START:: FONT AWSOME -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/font-awsome/all.css')}}">
    <!-- START:: CUSTOM STYLE -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/custom/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/custom/responsive.css')}}" />

    <!-- END:: STYLE LIBRARIES -->
</head>

<body>

    <!-- START:: AUTHENTICATION PAGE -->
    <section class="authentication_section">
        <div class="container">
            <div class="header_authentication">
                <a href="{{ url('/') }}"><img src="{{asset('dist/front/assets/images/logo/w-logo.svg')}}" alt="" width="" height="" /></a>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-md-5">
                    <div class="authentication_card">
                        <div class="authentication_title">
                            <h3>نسيت كلمة السر</h3>
                        </div>
                       {{-- @include('../parts.alert') --}}

                        <div class="authentication_form">
                            <form action="{{ route('sendmailpassword') }}" enctype='multipart/form-data' method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="kind" value="c">
                                <div class="form-group">
                                    <label for="email" class="form-label">البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email"  id="email" placeholder="ادخل البريد الإلكتروني" required />
                                </div>
                              
                                <button type="submit" class="btn-animation-1 submit_btn">أرسل الأن</button>
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END:: AUTHENTICATION PAGE -->

    <!-- START:: INCLUDING SCRIPTS -->

    <!-- START:: JQUERY -->
    <script src="{{asset('dist/front/assets/js/jquery/jquery-3.4.1.min.js')}}"></script>
    <!-- START:: BOOTSTRAP -->
    <script src="{{asset('dist/front/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- START:: ANIMATE -->
    <script src="{{asset('dist/front/assets/js/animate/wow.min.js')}}"></script>
    <!-- START:: CUSTOM JS -->
    <script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>

<script>
@include('sweetalert::alert')
</script>
@include('sweetalert::validation-alert')

    <script src="{{asset('dist/front/assets/js/custom/main.js')}}"></script>


    <!-- START::  -->
</body>

</html>