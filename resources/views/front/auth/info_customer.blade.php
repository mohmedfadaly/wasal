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
    <title>سلسلة تك - استكمال عملية التسجيل</title>
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

        <!-- START:: AUTHENTICATION PAGE -->
        <header class="custom_header">
            <div class="container d-block">
                <div class="row align-items-center justify-content-between bg-w">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <div class="site_logo">
                            <img src="{{asset('dist/front/assets/images/logo/logo.svg')}}" alt="Logo" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <ul class="actions_header align-items-center justify-content-end">

                            <li>
                                <a href="{{asset('dist/front/index-with-auth.html')}}" class="btn-animation-1">
                                    تخطي
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- START:: WIZARD FORM -->
        <div class="container mt-5">
            <form class="row align-items-center justify-content-center" id="regForm">
                <div class="col-md-12">
                    <div class="row head_wizard_form">
                        <div class="col-md-8">
                            <h3>استكمال عمليه التسجيل</h3>
                            <p>من خلال إنشاء ملف شخصي ، ستظهر في منصة سلسله تيكـ </p>
                        </div>
                        <div class="col-md-4">
                            <div class="steps_dots">
                                <ul class="all-steps" id="all-steps">
                                    <li class="step">
                                        <span>1</span>
                                        <small>الملف الشخصي</small>
                                    </li>
                                    <li class="step">
                                        <span>2</span>
                                        <small>السيرة الذاتية</small>
                                    </li>
                                    <li class="step">
                                        <span>3</span>
                                        <small> الخطوة الاخيرة</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                    <div class="tab">
                        <div class="prev-image">
                            <label for="formFile" class="prev-image-label">
                                <input class="form-control d-none" oninput="this.className = 'form-control d-none'"
                                    type="file" id="formFile" onchange="preview()" accept="image/*">
                                <img id="frame" class="image_validate" src="" class="img-fluid" alt="." />
                                <div class="btn_and_hint">
                                    <span class="btn-animation-2" id="upload_file">
                                        <i class="fas fa-download"></i>
                                        تحميل صورة
                                    </span>
                                    <button onclick="clearImage()" class="btn-animation-2" id="remove_image"
                                        type="button">
                                        <i class="fas fa-times"></i>
                                        حذف الصورة
                                    </button>
                                    <p>JPG, GIF or PNG. Max size of 5MB. </p>
                                </div>
                            </label>
                        </div>

                        <div class="authentication_form authentication_form_custom row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="firstname" class="form-label">الاسم الأول</label>
                                    <input type="text" class="form-control" oninput="this.className = 'form-control'"
                                        name="firstname" id="firstname" placeholder="ادخل الاسم الأول  " required />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">الاسم الأخير</label>
                                    <input type="lastname" class="form-control"
                                        oninput="this.className = 'form-control'" name="lastname" id="lastname"
                                        placeholder="ادخل الاسم الأخير  " required />
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">اللغة</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>اختر اللغة</option>
                                        <option value="ar">العربية</option>
                                        <option value="en">English</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">الدولة</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>اختر الدولة</option>
                                        <option value="eg">مصر</option>
                                        <option value="ksa">المملكة العربية السعودية</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">المدينة</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>اختر المدينة</option>
                                        <option value="eg1">القاهرة</option>
                                        <option value="eg2">المنصورة</option>
                                        <option value="eg3">دمياط</option>
                                        <option value="eg4">المحلة</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label"> البريد الإلكتروني</label>
                                    <input type="email" class="form-control" oninput="this.className = 'form-control'"
                                        name="email" id="email" placeholder="ادخل البريد الإلكتروني" required />
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab">
                        <div class="authentication_form authentication_form_custom row">

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="lastname" class="form-label">المجال</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>اختر المجال</option>
                                        <option value="ar">التسويق</option>
                                        <option value="en">البرمجة</option>
                                        <option value="en">التصميم</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="cv" class="form-label">سيرة ذاتية</label>
                                    <textarea class="form-control" oninput="this.className = 'form-control'" name="cv"
                                        id="cv" placeholder="ادخل السيرة الذاتية " required> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab">
                        <div class="title_tab">
                            <h3>سجّل هذه الخطوة ضمن إنجازاتك كونك أصبحت من فريق</h3>
                            <h2>سلسه تيكـ</h2>
                        </div>
                        <div class="btn-group row d-flex">
                            <div class="col-md-12 ">
                                <div class="btn-group-custom">
                                    <div class="single_check">
                                        <input type="checkbox" class="btn-check" name="check" id="addServ"
                                            autocomplete="off">
                                        <label for="addServ">اضافة خدمة </label>
                                    </div>
                                    <div class="single_check">
                                        <input type="checkbox" class="btn-check" name="check" id="addArticle"
                                            autocomplete="off">
                                        <label for="addArticle"> اضافة مقال</label>
                                    </div>
                                    <div class="single_check">
                                        <input type="checkbox" class="btn-check" name="check" id="addBodcast"
                                            autocomplete="off">
                                        <label for="addBodcast"> اضافة بودكاست</label>
                                    </div>
                                    <div class="single_check">
                                        <input type="checkbox" class="btn-check" name="check" id="addQue"
                                            autocomplete="off">
                                        <label for="addQue"> اضافة سؤال</label>
                                    </div>
                                    <div class="single_check">
                                        <input type="checkbox" class="btn-check" name="check" id="addEst4"
                                            autocomplete="off">
                                        <label for="addEst4">اضافة استشارة</label>
                                    </div>
                                    <div class="single_check">
                                        <input type="checkbox" class="btn-check" name="check" id="addVideo"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary" for="addVideo">اضافة فيديو </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row authentication_form">
                        <div class="col-md-12" id="nextprevious">
                            <button type="submit" class="btn-animation-1 submit_btn">حفظ</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)"
                                class="btn-animation-2 submit_btn">التالي</button>
                            <button type="button" id="prevBtn" class="btn-animation-3 submit_btn"
                                onclick="nextPrev(-1)">الرجوع للخلف</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <!-- END:: AUTHENTICATION PAGE -->
    </main>
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