<!DOCTYPE html>
<html lang="ar">
<head>
    {{--      For Filter Form--}}
    <style>

        .fixed-form {
            position: fixed;
            height: 100vh;
            display: none;
            background-color: rgba(0, 0, 0, 0.495);
            inset: 0;
            z-index: 99999;
            /* display: none; */
        }

        .fixed-form .container {
            max-width: 100%;
            padding: 0;
        }

        .fixed-form form {
            width: 90%;
            margin: 10px auto;
            background-color: #fff;
            border-radius: 20px;
            transform: scale(.8);
        }

        .btn-blue {
            background-color: #58B8C2 !important;
        }

        .register-form form .form-group label {
            font-weight: 500;
            font-size: 16px;
            line-height: 28px;
            color: #171215;
            margin-bottom: 4px;
            display: block;
            text-align: right;
        }

        .form_item .form-group {
            width: 48%;
        }

        form .form-group {
            margin-top: 12px;
        }

        .register-form form .form-group input {
            width: 100%;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
        }

        form .form-group input {
            width: 70%;
            margin: auto;
        }
    </style>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>All Kids</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="a0nymous"
        referrerpolicy="0-referrer"
    />
    <link
        href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/family-form.css')}}"/>
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/table-style.css')}}"/>
</head>
<body class="patiant-file">

<!--header-->
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
                    <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-chevron-left"></i>
                        بيانات المرضي
                    </li>
                </ol>
            </div>
        </nav>

        <div class="wrapper">
            <div class="container">
                <div class="row align-items-center ">

                    <div class="col-md-6 ">
                        <div class="form-title mt-4 mb-4 ">
                            <img src="{{asset('uploads/customers/avatar/'.auth()->guard('customer')->user()->avatar)}}"
                                 alt=""/>
                            <h3>بيانات صحية</h3>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start ">
                        <button  class="border-0 filter edit-file mt-md-4 mb-md-4 mb-3 mt-2">
                            <a><img src="https://cdn-icons-png.flaticon.com/512/3024/3024539.png"
                                            style="margin:auto;"/></a>
                        </button>
                        {{--              Filter Form Html --}}
                        <div class="fixed-form">
                            <div class="register-form pt-0">
                                <div class="container">
                                    <div class="row ">
                                        <form class="mt-5">
                                            <legend class="text-center mt-5"> فلترة البحث</legend>
                                            <p class="text-center">تحسين البحث عن المرضى من خلال تحديد المعايير وتصفية
                                                النتائج بدقة</p>
                                            <div class="row container">
                                            <div class="form-group col-6">
                                                    <label> الاسم كاملاً</label>
                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        placeholder="أدخل الاسم كاملاً..."
                                                    />
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>رقم الهوية</label>
                                                    <input
                                                        type="number"
                                                        name="num"
                                                        class="form-control"
                                                        placeholder="أدخل رقم الهوية..."
                                                    />
                                                </div>

                                                <div class="form-group col-6">
                                                    <label>تاريخ الميلاد</label>
                                                    <input
                                                        type="date"
                                                        name="date"
                                                        class="form-control"
                                                        placeholder="أدخل تاريخ الميلاد..."
                                                    />
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>الجنس</label>
                                                    <select class="form-control" name="kind">
                                                        <option value="">اختر الجنس</option>
                                                        <option value="0">ذكر</option>
                                                        <option value="1">انثي</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="country">الجنسية</label>
                                                    <select class="form-control" name="country_id">
                                                        <option value="">اختر الجنسيه</option>
                                                        @foreach($countries as $country)
                                                            <option
                                                                value="{{ $country->id }}">{{ $country->name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="country">السكن</label>
                                                    <select class="form-control" name="city_id">
                                                        <option value="">اختر مكان السكن</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{ $city->id }}">{{ $city->name_ar }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <button type="submit" name="filter" class="btn mt-5  mb-5 w-25 text-center m-auto btn-blue">موافق
                                                </button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('get-patients') }}" method="GET">
                            <button type="submit"
                                    class="border-0 edit-file mt-md-4 mb-md-4 mb-3 mt-2 me-3">
                                <a> إعادة فلترة </a>
                            </button>
                        </form>
                    </div>


                    <div class="col-12">
                        <div class="patiant-table">
                            <table>
                                <thead>
                                <tr>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">رقم الهوية</th>
                                    <th scope="col">تاريخ التسجيل</th>
                                    <th scope="col">الجنس</th>
                                    <th scope="col">الجنسية</th>
                                    <th scope="col">السكن</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kids as $kid)
                                    <tr>
                                        <td>{{$kid->name}}</td>
                                        <td>{{$kid->num}}</td>
                                        <td>{{$kid->date}}</td>
                                        <td>
                                            @if($kid->kind == 0)
                                                ذكر
                                            @else
                                                انثي
                                            @endif
                                        </td>
                                        <td>{{$kid->country->name_ar}}</td>
                                        <td class="td-table-menu ">{{$kid->city->name_ar}}
                                            <div class="table-menu">
                                                <p><i class="fa-solid fa-ellipsis-vertical fa-rotate-270"></i></p>
                                                <div class="table-menu-dropdown">
                                                    <p><a href="{{ route('show-patient', $kid->id) }}"> <img
                                                                src="https://www.citypng.com/public/uploads/preview/eye-view-watching-green-icon-download-png-11640343973hj2oufpggb.png"
                                                                width="20px" height="20px" alt=""> عرض الملف </a></p>
                                                    <form action="{{ route('delete-patient', $kid->id) }}"
                                                          method="Post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <img
                                                            src="https://icon-library.com/images/red-recycle-bin-icon/red-recycle-bin-icon-18.jpg"
                                                            width="20px" height="20px" alt="">
                                                        <button style="border:none; outline:0; background-color:white;"
                                                                type="submit">
                                                            <p style="font-size:12px;">
                                                                حذف الملف
                                                            </p>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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

    $(".table-menu").click(function () {

        $(this).children('.table-menu-dropdown').slideToggle();
    });
    let fixedForm = document.querySelector(".fixed-form");
    let filter = document.querySelector('.filter');
    let fixedFormRow = document.querySelector('.register-form .container .row');
    filter.addEventListener('click', function () {
        fixedForm.style.display = "block";
    })
    window.onclick = function (event) {
        console.log(event.target);
        if (event.target == fixedFormRow) {
            fixedForm.style.display = "none";
        }
    }
</script>
@include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>
</html>
