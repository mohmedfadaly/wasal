<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>الرسم العمودي للتقييم </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="a0nymous" referrerpolicy="0-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/albs.css')}}" />
</head>

<body class="patiant-file">

@include('front.parts_auth.nav')
@if(auth()->guard('customer')->check())
    @if(auth()->guard('customer')->user()->active == 0)
        @include('front.home.home_vrayfiy')

    @else
<!--breadcrumb-->
<nav aria-label="breadcrumb mt-5 mb-5">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية </a></li>
            <li class="breadcrumb-item"><a href="javascript:history.back()"><i class="fa-solid fa-chevron-left"></i> التقييم Appels </a></li>
            <li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-chevron-left"></i> الرسم العمودي للتقييم
            </li>
        </ol>
    </div>
</nav>




<div class="wrapper">
    <div class="container">
        <div class="row align-items-center ">
            <div class="col-md-6 ">
                <div class="form-title mt-4 mb-4 ">
                    <img src="images/Business, Chart.png" />
                    <h3> الرسم العمودي للتقييم </h3>
                </div>
            </div>
            <div class="col-12">
                <div class="tab-form">

                    <div class="dates row">
                        @foreach($sessions as $session)
                        <div class="date col-lg-2 col-md-3 col-6" style="background-color:{{$session->Session->hex}};">
                            <a><h9> تقييم بتاريخ {{date('Y/m/d', strtotime($session->created_at))}} </h9>
                            </a>
{{--                            <div class="close">--}}
{{--                                <i class="fa-solid fa-xmark"></i>--}}
{{--                            </div>--}}
                        </div>
                        @endforeach
                    </div>

                    <div class="scroller-tab">

                        <div class="left"><i class="fa-solid fa-arrow-left"></i></div>
                        <div class="right"><i class="fa-solid fa-arrow-right"></i></div>
                        <ul class="nav nav-tabs ablis-tabs" role="tablist">


                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#A">A</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" data-bs-toggle="tab" href="#A" >B</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" data-bs-toggle="tab"href="#A" >C</a>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#B">D</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#E">E</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#F">F</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#G">G</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#H">H</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#I">I</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#J">J</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#K">K</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#L">L</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#M">M</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#N">N</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#O">O</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#P">P</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Q">Q</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#R">R</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#S">S</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#T">T</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#V">V</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#W">W</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#X">X</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Y">Y</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#Z">Z</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content mt-5">
{{--                        @foreach ($sessions as $session)--}}
{{--                            @foreach ($session->Appsessions as $name)--}}
{{--                                <h3>--}}
{{--                                    {{$name->name}}B--}}
{{--                                </h3>--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}
                        <div id="A" class="container tab-pane active tab-pane-ablis">
                            <br />
                            <div class="letter-container">
                                <div class="B letterHover">
                                    <div class="letter-title text-center">
                                        <h3>(A) التعاون وفعالية المعزز</h3>
                                    </div>
                                    <div class="letter-graph d-flex mt-5">
                                        <div class="letter" style="flex-basis: 12%; text-align: center;">
                                            <div class="question-element" style="position: relative;">
                                                <p>A1</p>
                                                <div class="letter-question">
                                                    <p>أخد المعزز حينما بعرض عليه</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>A2</p>
                                                <div class="letter-question">
                                                    <p>أخد المعزز من ضمن اختيارين</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A3</p>
                                                <div class="letter-question">
                                                    <p>النظر لشيء غير معزز</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A4</p>
                                                <div class="letter-question">
                                                    <p>أخد شيء مألوف حينما يقدم إليه</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A5</p>
                                                <div class="letter-question">
                                                    <p>الإقتراب للحصول على معزز عندما تتطلب المهمة</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A6</p>
                                                <div class="letter-question">
                                                    <p>الإستجابة للتعليمات للحصول على المعزز من المدرب</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A7</p>
                                                <div class="letter-question">
                                                    <p>الإستجابة للعديد من المدربين</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A8</p>
                                                <div class="letter-question">
                                                    <p>الإنتظار بدون مثير لمسى</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A9</p>
                                                <div class="letter-question">
                                                    <p>ينظر للمعلم للحصول على تعليمات</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A10</p>
                                                <div class="letter-question">
                                                    <p>فحص الأشياء للتعليمات قبل الإستجابة</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A11</p>
                                                <div class="letter-question">
                                                    <p>يستجيب بسرعة عند إعطاء التعليمات</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A12</p>
                                                <div class="letter-question">
                                                    <p>يستجيب التعزيز غير المادي</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A13</p>
                                                <div class="letter-question">
                                                    <p>تعزيز مادي غير منتظم</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A14</p>
                                                <div class="letter-question">
                                                    <p>تفاعل المعلم كتعزيز</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A15</p>
                                                <div class="letter-question">
                                                    <p>يلاحظ تغييرات تعبيرات وجه وصوت المعلم</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A16</p>
                                                <div class="letter-question">
                                                    <p>الإستجابة للمعززات الإجتماعية</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A17</p>
                                                <div class="letter-question">
                                                    <p>الإنتظار بصورة مناسبة في حالة تأخر تقديم المعزز</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A18</p>
                                                <div class="letter-question">
                                                    <p>السعي للحصول على الإستحسان عند إستكمال المهمة</p>
                                                </div>
                                            </div>
                                            <div class="question-element">
                                                <p>A19</p>
                                                <div class="letter-question">
                                                    <p>الإنهاء من المهمة يقوم بدور المعزز</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="graph" style="flex-basis: 88%; ">
                                            <div class="lines">
                                                <div class="line line-0"></div>
                                                <div class="line line-1"></div>
                                                <div class="line line-2"></div>
                                                <div class="line line-3"></div>
                                                <div class="line line-4"></div>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="B pc-B">
                                    <div class="letter-title text-center">
                                        <h3>(B) الأداء البصري</h3>
                                    </div>
                                    <div class="letter-graph d-flex mt-5">
                                        <div class="letter" style="flex-basis: 12%; text-align: center;">
                                            <div class="question-element" style="position: relative;">
                                                <p>B1</p>
                                                <div class="letter-question">
                                                    <p>بازل ذات قطعة واحدة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B2</p>
                                                <div class="letter-question">
                                                    <p>وضع القطع المناسبة في صندوق الأشكال</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B3</p>
                                                <div class="letter-question">
                                                    <p>مطابقة أشياء متماثلة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B4</p>
                                                <div class="letter-question">
                                                    <p>مطابقة أشياء مع صور</p>
                                                </div>
                                            </div>

                                            <div class="question-element" style="position: relative;">
                                                <p>B5</p>
                                                <div class="letter-question">
                                                    <p>مطابقة صور متماثلة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B6</p>
                                                <div class="letter-question">
                                                    <p>مطابقة صور مع أشياء</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B7</p>
                                                <div class="letter-question">
                                                    <p>المطابقة بطلاقة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B8</p>
                                                <div class="letter-question">
                                                    <p>تصنيف الأشياء في مجموعات اعتماداً على أحد عناصرها</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B9</p>
                                                <div class="letter-question">
                                                    <p>مطابقة نموذج مكعبات على كارت تصميم</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B10</p>
                                                <div class="letter-question">
                                                    <p>بازل ذات قطعة متعددة متصلة داخلة إطار غير مربع</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B11</p>
                                                <div class="letter-question">
                                                    <p>بازل بإطار ذي حدود مربعة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B12</p>
                                                <div class="letter-question">
                                                    <p>محاكاة نموذج مكعبات من خلال النظر إلى كارت التصميم</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B13</p>
                                                <div class="letter-question">
                                                    <p>يطابق نمط تتابع</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B14</p>
                                                <div class="letter-question">
                                                    <p>بازل ذات قطع متعددة ويجب أن توضع جنباً لجنب بدون إطار</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B15</p>
                                                <div class="letter-question">
                                                    <p>بازل الصور المقطعة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B16</p>
                                                <div class="letter-question">
                                                    <p>مطابقة صور العلاقات</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B17</p>
                                                <div class="letter-question">
                                                    <p>تصنيف حسب الوظيفة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B18</p>
                                                <div class="letter-question">
                                                    <p>تصنيف حسب السمات (ما يميز الشيء)</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B19</p>
                                                <div class="letter-question">
                                                    <p>ترتيب حسب الفئة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B20</p>
                                                <div class="letter-question">
                                                    <p>الإستدعاء المتأخر للتتابع من الذاكرة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B21</p>
                                                <div class="letter-question">
                                                    <p>التعرف المتأخر على نموذج عند عرضه من نماذج أخرى</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B22</p>
                                                <div class="letter-question">
                                                    <p>إكمال نمط التتابع</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B23</p>
                                                <div class="letter-question">
                                                    <p>تكوين نموذج ثلاثي الأبعاد بعد مشاهدته </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B24</p>
                                                <div class="letter-question">
                                                    <p>سلسلة مطابقة مشروطه </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B25</p>
                                                <div class="letter-question">
                                                    <p>التسلسل والترتيب</p>
                                                </div>
                                            </div>

                                            <div class="question-element" style="position: relative;">
                                                <p>B26</p>
                                                <div class="letter-question">
                                                    <p>تتابع الصور</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>B27</p>
                                                <div class="letter-question">
                                                    <p>متاهات بسيطة</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="graph" style="flex-basis: 88%; ">
                                            <div class="lines">
                                                <div class="line line-0"></div>
                                                <div class="line line-1"></div>
                                                <div class="line line-2"></div>
                                                <div class="line line-3"></div>
                                                <div class="line line-4"></div>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="B pc-B">
                                    <div class="letter-title text-center">
                                        <h3>(C) اللغة الإستقبالية</h3>
                                    </div>
                                    <div class="letter-graph d-flex mt-5">
                                        <div class="letter" style="flex-basis: 12%; text-align: center;">
                                            <div class="question-element" style="position: relative;">
                                                <p>C1</p>
                                                <div class="letter-question">
                                                    <p>الإستجابة حينما ينادي على الطالب باسمه</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C2</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات للقيام بنشاط ممتع في البيئة المناسبة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C3</p>
                                                <div class="letter-question">
                                                    <p>ينظر الطالب للمعزز حينما يطلب منه</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C4</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات للإمساك بشيء معزز في مواضع وأماكن مختلفة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C5</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات لمسك شيء مألوف في مواضع وأماكن مختلفة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C6</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات للقيام بنشاط ممتع لى يقوم بها في البيئة المناسبة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C7</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات في مواقف روتينية معتادة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C8</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات لإعطاء المدرب شيء محدد غير معزز</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C9</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات للقيام بنشاط حركي بسيط</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C10</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات لمسك شيء ما في وجود عنصر مشتت</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C11</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات لإختيار شيء واحد معزز من بين مجموعة من شيئين</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C12</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات لإختيار شيء معزز من شيئين معززين</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C13</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات لإختيار شيء مألوف من ضمن اثنين</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C14</p>
                                                <div class="letter-question">
                                                    <p>إختيار صورة من صورتين لصور مألوفة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C15</p>
                                                <div class="letter-question">
                                                    <p>لمس الطالب لأعضاء الجسم الخاصة به</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C16</p>
                                                <div class="letter-question">
                                                    <p>اختيار أحد ستة أشياء أو أكثر من على المنضدة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C17</p>
                                                <div class="letter-question">
                                                    <p>إختيار صورة من ستة صور أو أكثر من على المنضدة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C18</p>
                                                <div class="letter-question">
                                                    <p>القدرة على اختيار أشياء أو صور مألوفة جديدة دون تدريب مكثف</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C19</p>
                                                <div class="letter-question">
                                                    <p>التمييز الإستقبالي بطلاقة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C20</p>
                                                <div class="letter-question">
                                                    <p>تعليمات مختلفة للإختيار مستعيناً بأي إجابة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C21</p>
                                                <div class="letter-question">
                                                    <p>الإشارة لأعضاء الجسم الخاصة بالآخرين أو على الصور </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C22</p>
                                                <div class="letter-question">
                                                    <p>لمس الملابس الخاصة بالطالب</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C23</p>
                                                <div class="letter-question">
                                                    <p>لمس أجزاء من عناصر </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C24</p>
                                                <div class="letter-question">
                                                    <p>اختيار النعت (الصفات)</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C25</p>
                                                <div class="letter-question">
                                                    <p>يختار أشياء بإتباع نظرة الآخرين </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C26</p>
                                                <div class="letter-question">
                                                    <p>يتبع إرشادات اليد</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C27</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات للذهاب لشخص ما </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C28</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات الخاصة بإعطاء شيء ما لشخص محدد أو بوضع شيء على شيء آخر</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C29</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات للذهاب لشخص ما وإحضار شيء محدد </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C30</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات للذهاب لشخص ما والقيام بنشاط ما</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C31</p>
                                                <div class="letter-question">
                                                    <p>إختيار الإستجابة الصحيحة بناءاً على تعليمات المدرب </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C32</p>
                                                <div class="letter-question">
                                                    <p>إختيار شيء مناسب للقيام بنشاط ما من عدة أشياء</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C33</p>
                                                <div class="letter-question">
                                                    <p>أفعال متعددة بأشياء </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C34</p>
                                                <div class="letter-question">
                                                    <p>عرض نشاط محدد مصطنع</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C35</p>
                                                <div class="letter-question">
                                                    <p>اختيار صورة من ثلاث تمثل أنشطة </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C36</p>
                                                <div class="letter-question">
                                                    <p>اختيار الصور ذات الصلة (العلاقات)</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C37</p>
                                                <div class="letter-question">
                                                    <p>الإختيار وفقاً لوظيفة الأشياء </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C38</p>
                                                <div class="letter-question">
                                                    <p>الإختيار وفقاً لسمات (مميزات) الأشياء</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C39</p>
                                                <div class="letter-question">
                                                    <p> الإختيار وفقاً لنوع أو قمة الأشياء (تصنيف)</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C40</p>
                                                <div class="letter-question">
                                                    <p>اختيار شيئين من مجموعة كبيرة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C41</p>
                                                <div class="letter-question">
                                                    <p>اختيار شيئين في تتابع من مجموعة أكبر</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C42</p>
                                                <div class="letter-question">
                                                    <p>اختيار صور مهن المجتمع</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C43</p>
                                                <div class="letter-question">
                                                    <p>تحديد الأشياء المتشابهة في صورة بها أشياء كثيرة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C44</p>
                                                <div class="letter-question">
                                                    <p>تحديد أشياء إستدلالاً بأجزاء منها</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C45</p>
                                                <div class="letter-question">
                                                    <p>اختيار الصورة بناءاً على أصواتها</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C46</p>
                                                <div class="letter-question">
                                                    <p>اختيار كل أمثلة الشيء</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C47</p>
                                                <div class="letter-question">
                                                    <p>اختيار شيء واحد به سمتين محددتين</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C48</p>
                                                <div class="letter-question">
                                                    <p>اختيار مجموعة من الأشياء ذات سمة مميزة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C49</p>
                                                <div class="letter-question">
                                                    <p>اختيار مجموعة من الأشياء بصفتين محددتين</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C50</p>
                                                <div class="letter-question">
                                                    <p>إتباع تعليمات بنفس الترتيب</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C51</p>
                                                <div class="letter-question">
                                                    <p>إتباع التعليمات في حروف الجر وظروف المكان في اللغة المتلقية</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C52</p>
                                                <div class="letter-question">
                                                    <p>ضمائر اللغة المتلقية</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C53</p>
                                                <div class="letter-question">
                                                    <p>اختيار صور تمثل مكان أو نشاطاً في صورة</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C54</p>
                                                <div class="letter-question">
                                                    <p>اختيار صورة تعبر عن انفعالات</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C55</p>
                                                <div class="letter-question">
                                                    <p>اختيار المتماثل والمختلف (اللي زي واللي مش زي) </p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C56</p>
                                                <div class="letter-question">
                                                    <p>اختيار اللا أمثلة (باستخدام الصور)</p>
                                                </div>
                                            </div>
                                            <div class="question-element" style="position: relative;">
                                                <p>C57</p>
                                                <div class="letter-question">
                                                    <p>اختيار صور دالة على التفاعل الإجتماعي</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="graph" style="flex-basis: 88%; ">
                                            <div class="lines">
                                                <div class="line line-0"></div>
                                                <div class="line line-1"></div>
                                                <div class="line line-2"></div>
                                                <div class="line line-3"></div>
                                                <div class="line line-4"></div>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>
                                            <div class="garph-color" >
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="B" class="container tab-pane tab-pane-ablis fade">
                            <br />
                            <div class="letter-container">
                                <div class="A">
                                    <div class="letter-title text-center">
                                        <h3>(A) التعاون وفعالية المعزز</h3>
                                    </div>
                                    <div class="letter-graph">
                                        <div class="letter">
                                            <p>D1</p>
                                            <p>D2</p>
                                            <p>D3</p>
                                            <p>D4</p>
                                            <p>D5</p>
                                            <p>D6</p>
                                            <p>D7</p>
                                            <p>D8</p>
                                            <p>D9</p>
                                            <p>D10</p>
                                            <p>D11</p>
                                            <p>D12</p>
                                        </div>
                                        <div class="graph">

                                        </div>
                                    </div>
                                </div>
                                <div class="B">
                                    <div class="letter-title text-center">
                                        <h3>(B) الأداء البصري</h3>
                                    </div>
                                    <div class="letter-graph">
                                        <div cEass="letter">
                                            <p>E1</p>
                                            <p>E2</p>
                                            <p>E3</p>
                                            <p>E4</p>
                                            <p>E5</p>
                                            <p>E6</p>
                                            <p>E7</p>
                                            <p>E8</p>
                                            <p>E9</p>
                                            <p>E10</p>
                                            <p>E11</p>
                                            <p>E12</p>
                                        </div>
                                        <div class="graph">

                                        </div>
                                    </div>
                                </div>
                                <div class="C">
                                    <div class="letter-title text-center">
                                        <h3> (C) اللغة الإستقبالية</h3>
                                    </div>
                                    <div class="letter-graph">
                                        <div class="letter">
                                            <p>F1</p>
                                            <p>F2</p>
                                            <p>F3</p>
                                            <p>F4</p>
                                            <p>F5</p>
                                            <p>F6</p>
                                            <p>F7</p>
                                            <p>F8</p>
                                            <p>F9</p>
                                            <p>F10</p>
                                            <p>F11</p>
                                            <p>F12</p>
                                        </div>
                                        <div class="graph">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id="C" class="container tab-pane tab-pane-ablis fade">
                            <br />
                            <div class="letter-container">
                                <div class="A">
                                    <div class="letter-title text-center">
                                        <h3>(A) التعاون وفعالية المعزز</h3>
                                    </div>
                                    <div class="letter-graph">
                                        <div class="letter">
                                            <p>D1</p>
                                            <p>D2</p>
                                            <p>D3</p>
                                            <p>D4</p>
                                            <p>D5</p>
                                            <p>D6</p>
                                            <p>D7</p>
                                            <p>D8</p>
                                            <p>D9</p>
                                            <p>D10</p>
                                            <p>D11</p>
                                            <p>D12</p>
                                        </div>
                                        <div class="graph">

                                        </div>
                                    </div>
                                </div>
                                <div class="B">
                                    <div class="letter-title text-center">
                                        <h3>(B) الأداء البصري</h3>
                                    </div>
                                    <div class="letter-graph">
                                        <div cEass="letter">
                                            <p>E1</p>
                                            <p>E2</p>
                                            <p>E3</p>
                                            <p>E4</p>
                                            <p>E5</p>
                                            <p>E6</p>
                                            <p>E7</p>
                                            <p>E8</p>
                                            <p>E9</p>
                                            <p>E10</p>
                                            <p>E11</p>
                                            <p>E12</p>
                                        </div>
                                        <div class="graph">

                                        </div>
                                    </div>
                                </div>
                                <div class="C">
                                    <div class="letter-title text-center">
                                        <h3> (C) اللغة الإستقبالية</h3>
                                    </div>
                                    <div class="letter-graph">
                                        <div class="letter">
                                            <p>F1</p>
                                            <p>F2</p>
                                            <p>F3</p>
                                            <p>F4</p>
                                            <p>F5</p>
                                            <p>F6</p>
                                            <p>F7</p>
                                            <p>F8</p>
                                            <p>F9</p>
                                            <p>F10</p>
                                            <p>F11</p>
                                            <p>F12</p>
                                        </div>
                                        <div class="graph">

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endif

@else

    @include('front.home.home_guest')

@endif
<!--footer-->
@include('front.parts.footer')
<!--footer-->
    <script src="{{asset('dist/front/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/jquery-3.6.3.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>
    <script>
        $('.toggle-ques').on('click', function () {
            $(this).toggleClass("up");
            $(this).parent().parent().children('.ablis-answer').toggle();

        });
    </script>
    <script>
        let numbersQues = document.querySelectorAll(".numbers-ques");
        console.log(numbersQues)
        numbersQues.forEach((numberQues) => {

            numberQues.addEventListener("onmouseover", function () {
                console.log(numberQues);
            })
        })
    </script>

    <script>
        let left = document.querySelector(".left");
        let right = document.querySelector(".right");
        let tabsList = document.querySelector(".ablis-tabs");

        let manageIcons = () => {
            if (tabsList.scrollLeft === 0) {
                left.style.display = "flex";
            } else {
                left.style.display = "none";
            }

            if (tabsList.scrollLeft >= tabsList.scrollWidth - tabsList.clientWidth) {
                right.style.display = "none";
            } else {
                right.style.display = "flex";
            }
        };

        left.addEventListener("click", () => {
            tabsList.scrollLeft -= 200;
            manageIcons();
        });

        right.addEventListener("click", () => {
            tabsList.scrollLeft += 200;
            manageIcons();
        });

        tabsList.addEventListener("scroll", manageIcons);

    </script>

    <script>
        let numbersques = document.querySelectorAll(".numbers-ques");

        for (let i = 0; i < numbersques.length; i++) {

            for (let j = 0; j < numbersques[i].length; j++) {

                console.log(numbersques[i][j].childNodes);
            }
        }
    </script>
    <script>
        $(".question-element").hover(function () {
            $(this).children(".letter-question").toggle();
        })
    </script>
    <script>
        let navLinks = document.querySelectorAll(".nav-link");
        let B = document.querySelectorAll(".B");
        navLinks.forEach((navlink,index)=>{
            navlink.addEventListener("click",()=>{
                B.forEach((letter)=>{
                    letter.classList.remove("letterHover");
                })
                navLinks.forEach((navlink)=>{
                    navlink.classList.remove("letterHover");
                })
                B[index].classList.add("letterHover");
                navlink[index].classList.add("letterHover");
            })

        })

    </script>
    <script>
        let tabContent = document.querySelector(".tab-content");
        const dragging = (e) =>{
            tabContent.scrollLeft -= e.movementX;
        }
        tabContent.addEventListener("mousemove", dragging);

    </script>
    <script>
        // Get all elements with class "close"
        const closeButtons = document.querySelectorAll('.close');

        // Add click event listener to each close button
        closeButtons.forEach(closeButton => {
            closeButton.addEventListener('click', function() {
                // Get the parent element with class "date"
                const dateElement = this.closest('.date');

                // Remove the parent element if found
                if (dateElement) {
                    dateElement.remove();
                }
            });
        });

    </script>
</body>

</html>
