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
    <title>سلسلة تك - تعديل</title>
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
    <main>
        <!-- START:: LOADER PAGE -->
        <div id="page_loader" class="page_loader">
            <div class="logo">
                <img src="{{asset('dist/front/assets/images/logo/favicon.png')}}" alt="" width="" height="" />
            </div>
        </div>
            @include('front.parts_auth.nav')
      
            <!-- START:: WIZARD FORM -->
            <div class="container mt-5">
                <form class="row align-items-center justify-content-center" action="{{ route('update_profile_customer') }}" enctype='multipart/form-data' method="post">
                    {{csrf_field()}}
                    <div class="authentication_form authentication_form_custom row">
                        <div class="col-md-12 mb-6">
                            <div class="form-group">
                                <label for="name" class="form-label">اسم المستخدم</label>
                                <input type="text" class="form-control" name="name_f" value="{{auth()->guard('customer')->user()->name_f}}" id="name" placeholder="ادخل الاسم" required />
                            </div>
                        </div>
                        <div class="col-md-12 mb-6">
                            <div class="form-group">
                                <label for="email" class="form-label">البريد الالكتروني</label>
                                <input type="email" class="form-control" name="email"  id="email" value="{{auth()->guard('customer')->user()->email}}"  placeholder="ادخل البريد الإلكتروني" required />
                            </div>
                        </div>
                        <div class="col-md-12 mb-6">

                            <div class="form-group">
                                <label for="password" class="form-label">كلمة المرور</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" name="password"  id="password" placeholder="***********" required />
                                    <div class="show_hide" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash" id="hide_eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-6">

                            <div class="form-group">
                                <label for="confirm_password" class="form-label">كلمة المرور مره اخري</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="***********" required />
                                    <div class="show_hide" onclick="password_show_hide_confirm();">
                                        <i class="fas fa-eye" id="show_eye2"></i>
                                        <i class="fas fa-eye-slash" id="hide_eye2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-6">

                            <div class="form-group">
                            <button type="submit" class="btn-animation-1 submit_btn"> تعديل</button>
                            </div>
                        </div>
                    </div>  
                </form>
            </div>
                  
            
    </main>
    <!-- END:: AUTHENTICATION PAGE -->

    <!-- START:: INCLUDING SCRIPTS -->
    <script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>

    <!-- START:: JQUERY -->
    <script src="{{asset('dist/front/assets/js/jquery/jquery-3.4.1.min.js')}}"></script>
    <!-- START:: BOOTSTRAP -->
    <script src="{{asset('dist/front/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- START:: ANIMATE -->
    <script src="{{asset('dist/front/assets/js/animate/wow.min.js')}}"></script>
    <!-- START:: CUSTOM JS -->
    <script src="{{asset('dist/front/assets/js/custom/main.js')}}"></script>
    <script>
    @include('sweetalert::alert')
    </script>

    <!-- START::  -->
</body>

</html>