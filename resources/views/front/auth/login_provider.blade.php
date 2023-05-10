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
    <title>سلسلة تك - تسجيل الدخول</title>
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
                            <h3>تسجيل الدخول</h3>
                        </div>
                        <div class="authentication_social">
                            <ul>
                                <li>
                                    <button type="button" class="facebook">
                                        Facebook
                                        <span><i class="fab fa-facebook"></i></span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="apple">
                                        Apple
                                        <span><i class="fab fa-apple"></i></span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="google">
                                        Google
                                        <span><i class="fab fa-google"></i></span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="or">
                            <span>أو</span>
                        </div>
                        <div class="authentication_form">
                            <form action="{{ route('acuant_login') }}" enctype='multipart/form-data' method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="kind" value="p">
                                <div class="form-group">
                                    <label for="email" class="form-label">البريد الالكتروني</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="ادخل البريد الإلكتروني" required />
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">كلمة المرور</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="***********" required />
                                        <div class="show_hide" onclick="password_show_hide();">
                                            <i class="fas fa-eye" id="show_eye"></i>
                                            <i class="fas fa-eye-slash" id="hide_eye"></i>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-animation-1 submit_btn">تسجيل الدخول</button>
                                
                            </form>
                            <div class="reset-password">
                                <a href="{{ route('emailpasswordprovider') }}">هل نسيت كلمة المرور ؟</a>
                            </div>
                            <div class="register-text">
                                اذا كنت لا تمتلك حساب <a href="{{ route('change_type') }}">اشترك الأن</a>
                            </div>
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
    
    <script src="{{asset('dist/front/assets/js/emoji/jquery.emojipicker.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/emoji/jquery.emojis.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/ck-editor/ckeditor.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/ck-editor/ck-editor.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/social-share-kit/1.0.15/js/social-share-kit.min.js" integrity="sha512-u+G+A9V0BM4zKp6aN99fyfpqcU5YI2abpmhVLN0/br2xux0kVKatJCEFABjA80fYzOjCih4G+qkb5HSVMA1zOg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
@include('sweetalert::alert')
</script>
@include('sweetalert::validation-alert')

    <script src="{{asset('dist/front/assets/js/custom/main.js')}}"></script>


    <!-- START::  -->
</body>

</html>