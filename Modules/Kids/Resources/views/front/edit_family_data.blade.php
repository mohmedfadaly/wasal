<!DOCTYPE html>
<html lang="ar">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Patient Data</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="a0nymous" referrerpolicy="0-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/family-form.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/table-style.css')}}" />

</head>

<body class="edit_family_data">

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
        <li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-chevron-left"></i> المريض </li>
      </ol>
    </div>
  </nav>
<div class="tab-form">
        <form>
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-6">
                  <div class="form-title mt-md-4 mb-md-4 ">
                    <img src="{{asset('dist/front/assets/images/file 2.png')}}">
                    <h3>بيانات المريض</h3>
                  </div>
                </div>

                <div class="col-md-6">
                  <button type="submit" class="border-0 edit-file mt-md-4 mb-md-4 mb-3 mt-2">
                    <a href="{{ route('edit_patient', ['id' => $Kid->id]) }}">  <img src="{{asset('dist/front/assets/images/edit.png')}}" alt="">  تعديل البيانات </a>
                  </button>
                </div>


                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home">بيانات الطفل</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu1">بيانات الأب</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu2">
                                بيانات الأم</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#menu3">بيانات الأسرة</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active">


                            <div class="text-data">

                                <div class="form-group">
                                    <label>الاسم كاملاً </label>
                                    <p class="form-control"> {{$Kid->name}}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>رقم الهوية</label>
                                    <p class="form-control">
                                        {{$Kid->num}}
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label> تاريخ الميلاد</label>
                                    <p class="form-control">
                                        {{$Kid->date}}
                                    </p>

                                </div>
                                <div class="form-group">
                                    <label>مكان الميلاد</label>
                                    <p class="form-control">{{$Kid->place_date}}</p>
                                </div>
                                <div class="form-group">
                                    <label>الجنس</label>
                                    <p class="form-control">
                                        @if($Kid->kind == '1')ذكر @endif
                                        @if($Kid->kind == '0') انثي @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label>الجنسية</label>
                                    <p class="form-control">
                                        	@foreach($countries as $value)
                                        @if($Kid->country_id == $value->id) {{$value->name_ar}} @endif
                                    @endforeach
                                        </p>
                                </div>
                                <div class="form-group">
                                    <label>منطقة السكن</label>
                                    <p>{{$Kid->area}}</p>
                                </div>
                                <div class="form-group">
                                    <label>المدينة </label>
                                    <p>{{$Kid->city->name_ar}}</p>

                                </div>


                                <div class="medical-data mt-4 w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل لدى الطفل اعاقات أخرى</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->other_obstruction == '1') نعم @endif
                                                @if($Kid->other_obstruction == '0') لا @endif
                                                -</p>
                                            <div class="comment">
                                                <p>{{$Kid->other_obstruction_com}} </p>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل لدى الطفل أمراض مزمنة</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p>   @if($Kid->chronic_diseases == '1')نعم @endif
                                                @if($Kid->chronic_diseases == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->chronic_diseases_com}}</p>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل لدى الطفل أمراض وراثية</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p>  @if($Kid->genetic_diseases == '1') نعم @endif
                                                @if($Kid->genetic_diseases == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p> {{$Kid->genetic_diseases}} </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل لدى الطفل مشاكل صحية أخرى</h4>
                                        </div>
                                        <div class="custom-control custom-radio">

                                      <p>   @if($Kid->health_problems == '1') نعم @endif
                                        @if($Kid->health_problems == '0') لا @endif
                                        -</p>
                                            <div class="comment">
                                                <p>{{$Kid->health_problems_com}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل مراحل النمو عند الطفل طبيعية منذ الولادة</h4>
                                        </div>
                                        <div class="custom-control custom-radio">


                                            <p>   @if($Kid->growth_stage == '1') نعم' @endif
                                                @if($Kid->growth_stage == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->growth_stage_com}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade">


                            <div class="text-data">

                                <div class="form-group">
                                    <label>الاسم كاملاً </label>
                                    <p class="form-control">
                                        {{$Kid->Dad->name}}</p>
                                </div>
                                <div class="form-group">
                                    <label>رقم الهوية</label>
                                    <p class="form-control">{{$Kid->Dad->num}} </p>
                                </div>
                                <div class="form-group">
                                    <label> تاريخ الميلاد</label>
                                    <p class="form-control">{{$Kid->Dad->date}} </p>
                                </div>

                                <div class="form-group">
                                    <label>الحالة الاجتماعية</label>
                                    <p class="form-control"> @if($Kid->Dad->marital_status == 'married') متزوج @endif
                                        @if($Kid->Dad->marital_status == 'divorce')  مطلق @endif
                                        @if($Kid->Dad->marital_status == 'Widower')  أرمل @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label> رقم التواصل</label>
                                    <p class="form-control">{{$Kid->Dad->phone}}</p>
                                </div>
                                <div class="form-group">
                                    <label>المستوى التعليمي</label>
                                    <p class="form-control">@if($Kid->Dad->learning == 'none') أمّي @endif
                                        @if($Kid->Dad->learning == 'primary')  ابتدائي @endif
                                        @if($Kid->Dad->learning == 'middle') متوسط @endif
                                        @if($Kid->Dad->learning == 'secondary')  ثانوي @endif
                                        @if($Kid->Dad->learning == 'diploma') دبلوم @endif
                                        @if($Kid->Dad->learning == 'Bachelor') بكالوريس @endif
                                        @if($Kid->Dad->learning == 'Master') ماجستير @endif
                                        @if($Kid->Dad->learning == 'doctor') دكتوراه @endif
                                    </p>

                                </div>
                                <div class="form-group">
                                    <label> طبيعة العمل</label>
                                    <p class="form-control">
                                        @if($Kid->Dad->work == 'public_work') موظف حكومي @endif
                                        @if($Kid->Dad->work == 'private_work')  موظف قطاع خاص @endif
                                        @if($Kid->Dad->work == 'free_work')    أعمال حرة @endif
                                       @if($Kid->Dad->work == "don't_work")  لا يعمل @endif




                                    </p>
                                </div>


                                <div class="medical-data mt-3 w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل الأب مدخن</h4>
                                        </div>
                                        <div class="custom-control custom-radio">


                                            <p> @if($Kid->Dad->smoking == '1') نعم @endif
                                                @if($Kid->Dad->smoking == '0') لا @endif
                                            </p>
                                        </div>

                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل لدى الأب إعاقة</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p>    @if($Kid->Dad->obstruction == '1') نعم @endif
                                                @if($Kid->Dad->obstruction == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Dad->obstruction_com}} </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل يعاني الأب من أمراض مزمنة</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Dad->chronic_diseases == '1')  نعم @endif
                                                @if($Kid->Dad->chronic_diseases == '0')  لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Dad->chronic_diseases_com}} </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل يعاني الأب من أمراض وراثية</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p>  @if($Kid->Dad->genetic_diseases == '1') نعم @endif
                                                @if($Kid->Dad->genetic_diseases == '0') لا @endif -

                                            </p>
                                            <div class="comment">

                                                <p>{{$Kid->Dad->genetic_diseases_com}} </p>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>ما هي الحالة النفسية للأب</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Dad->mental_state == '1') طبيعي @endif
                                                @if($Kid->Dad->mental_state == '0') يعاني من مشاكل نفسية @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Dad->mental_state_com}} </p>
                                            </div>


                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل يعاني الأب من مشاكل صحية أخرى</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Dad->health_problems == '1') نعم @endif
                                                @if($Kid->Dad->health_problems == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Dad->health_problems_com}} </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>ما هي درجة تواصل الأب مع الطفل</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Dad->communication == 'good') قوية @endif
                                                @if($Kid->Dad->communication == 'maddele') متوسطة @endif
                                                @if($Kid->Dad->communication == 'week') ضعيفة @endif
                                                -</p>

                                            <div class="comment">
                                                <p>{{$Kid->Dad->communication_com}} </p>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="container tab-pane fade">


                            <div class="text-data">

                                <div class="form-group">
                                    <label>الاسم كاملاً </label>
                                    <p class="form-control">
                                        {{$Kid->Mom->name}} </p>
                                </div>
                                <div class="form-group">
                                    <label>رقم الهوية</label>
                                    <p class="form-control">{{$Kid->Mom->num}}" </p>
                                </div>
                                <div class="form-group">
                                    <label> تاريخ الميلاد</label>
                                    <p class="form-control">{{$Kid->Mom->date}}</p>
                                </div>

                                <div class="form-group">
                                    <label>الحالة الاجتماعية</label>
                                    <p class="form-control">@if($Kid->Mom->marital_status == 'married') متزوجة @endif
                                        @if($Kid->Mom->marital_status == 'divorce') مطلقة @endif
                                        @if($Kid->Mom->marital_status == 'Widower') أرملة @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label> رقم التواصل</label>
                                    <p class="form-control">{{$Kid->Mom->phone}}</p>
                                </div>
                                <div class="form-group">
                                    <label>المستوى التعليمي</label>
                                    <p class="form-control">@if($Kid->Mom->learning == 'none') أمّي @endif
                                        @if($Kid->Mom->learning == 'primary')  ابتدائي  @endif
                                        @if($Kid->Mom->learning == 'middle')  متوسط @endif
                                        @if($Kid->Mom->learning == 'secondary')  ثانوي @endif
                                        @if($Kid->Mom->learning == 'diploma')  دبلوم  @endif
                                        @if($Kid->Mom->learning == 'Bachelor')  بكالوريس  @endif
                                        @if($Kid->Mom->learning == 'Master')  ماجستير  @endif
                                        @if($Kid->Mom->learning == 'doctor')  دكتوراه  @endif
                                    </p>
                                </div>
                                <div class="form-group">
                                    <label> طبيعة العمل</label>
                                    <p class="form-control">@if($Kid->Mom->work == 'public_work') موظف حكومي  @endif
                                        @if($Kid->Mom->work == 'private_work')  موظف قطاع خاص @endif
                                        @if($Kid->Mom->work == 'free_work')  أعمال حرة @endif
                                        @if($Kid->Mom->work == "don't_work")   لا يعمل @endif</p>

                                </div>


                                <div class="medical-data mt-3 w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title ">
                                            <h4>هل الأم مدخنة</h4>
                                        </div>
                                        <div class="custom-control custom-radio ">
                                            <p>
                                                @if($Kid->Mom->smoking == '1') نعم @endif
                                                @if($Kid->Mom->smoking == '0') لا @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل لدى الأم إعاقة</h4>
                                        </div>
                                        <div class="custom-control custom-radio">

                                            <p> @if($Kid->Mom->obstruction == '1')  نعم @endif
                                                @if($Kid->Mom->obstruction == '0') لا  @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Mom->obstruction_com}} </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل تعاني الأم من أمراض مزمنة</h4>
                                        </div>
                                        <div class="custom-control custom-radio">

                                            <p>@if($Kid->Mom->chronic_diseases == '1') نعم  @endif
                                                @if($Kid->Mom->chronic_diseases == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Mom->hronic_diseases_com}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل تعاني الأم من أمراض وراثية</h4>
                                        </div>
                                        <div class="custom-control custom-radio">

                                            <p>@if($Kid->Mom->genetic_diseases == '1') نعم @endif
                                                @if($Kid->Mom->genetic_diseases == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Mom->genetic_diseases_com}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل تعاني الأم من مشاكل صحية أخرى</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p>@if($Kid->Mom->health_problems == '1') نعم @endif
                                                @if($Kid->Mom->health_problems == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Mom->health_problems_com}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>ما هي الحالة النفسية للأم</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p>  @if($Kid->Mom->mental_state == '1') نعم  @endif
                                                @if($Kid->Mom->mental_state == '0') لا @endif -</p>

                                            <div class="comment">
                                                <p>{{$Kid->Mom->mental_state_com}}</p>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>ما هي درجة تواصل الأم مع الطفل</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Mom->communication == 'good')قوية  @endif
                                                @if($Kid->Mom->communication == 'maddele') متوسطة  @endif
                                                @if($Kid->Mom->communication == 'week')  ضعيفة @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Mom->communication_com}}</p>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل الحمل بالطفل كان</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Mom->pregnancy == '0') طبيعي @endif
                                                @if($Kid->Mom->pregnancy == '1') اطفال أنابيب @endif
                                                @if($Kid->Mom->pregnancy == '2') أخرى @endif -</p>

                                            <div class="comment">
                                               <p>{{$Kid->Mom->pregnancy_com}}</p>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>كم كانت أشهر الحمل بالطفل</h4>
                                        </div>
                                        <div class="custom-control custom-radio">

                                            <p>@if($Kid->Mom->pregnancy_month == '7')  شهور 7 @endif
                                                @if($Kid->Mom->pregnancy_month == '8') شهور 8  @endif
                                                @if($Kid->Mom->pregnancy_month == '9')  شهور 9 @endif
                                                @if($Kid->Mom->pregnancy_month == '10') شهور 10  @endif </p>


                                        </div>
                                    </div>


                                </div>

                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل كانت هناك مشاكل صحية أثناء الحمل</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Mom->pregnancy_problems == '1') نعم @endif
                                                @if($Kid->Mom->pregnancy_problems == '0') لا @endif -</p>
                                            <div class="comment">
                                                <p>{{$Kid->Mom->pregnancy_problems_com}}</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل كانت ولادة الطفل</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Mom->birth_status == '1') طبيعية @endif
                                                @if($Kid->Mom->birth_status == '0') قيصرية @endif -</p>
                                            <div class="comment">
                                    <p>{{$Kid->Mom->birth_status_com}}</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل كانت هناك مشاكل أثناء الولادة</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p>  @if($Kid->Mom->birth_problems == '1') "نعم" @endif
                                                @if($Kid->Mom->birth_problems == '0') "لا" @endif -</p>
                                            <div class="comment">
                                               <p>{{$Kid->Mom->birth_problems_com}}</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل كانت هناك مشاكل بعد الولادة</h4>
                                        </div>
                                        <div class="custom-control custom-radio">

                                            <p>@if($Kid->Mom->birth_after_problems == '1') نعم @endif
                                                @if($Kid->Mom->birth_after_problems == '0') لا @endif -</p>
                                            <div class="comment">
                                               <p>{{$Kid->Mom->birth_after_problems_com}}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="medical-data w-100">
                                    <div class="questions d-flex justify-content-between">
                                        <div class="medical-data-title">
                                            <h4>هل الرضاعة كانت طبيعية</h4>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <p> @if($Kid->Mom->lactation == '1') نعم @endif
                                                @if($Kid->Mom->lactation == '0') لا @endif </p>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="container tab-pane fade">


                            <div class="text-data">


                                <div class="form-group family-data">
                                    <label>عدد أفراد الاسره</label>
                                    <p>
                                        @if($Kid->Family->num_of == '1')  1 @endif
                                        @if($Kid->Family->num_of == '2')  2 @endif
                                        @if($Kid->Family->num_of == '3') 3  @endif
                                        @if($Kid->Family->num_of == '4') 4  @endif
                                        @if($Kid->Family->num_of == '5') 5  @endif
                                        @if($Kid->Family->num_of == '6') 6  @endif
                                        @if($Kid->Family->num_of == '7') 7  @endif
                                        @if($Kid->Family->num_of == '8') 8  @endif
                                        @if($Kid->Family->num_of == '9')  9 @endif
                                        @if($Kid->Family->num_of == '10') 10  @endif

                                    </p>
                                </div>
                                <div class="form-group family-data">
                                    <label>عدد الأشقاء الذكور</label>
                                    <p>
                                        @if($Kid->Family->num_of_pro == '1')  1 @endif
                                        @if($Kid->Family->num_of_pro == '2')  2 @endif
                                        @if($Kid->Family->num_of_pro == '3') 3  @endif
                                        @if($Kid->Family->num_of_pro == '4') 4  @endif
                                        @if($Kid->Family->num_of_pro == '5') 5  @endif
                                        @if($Kid->Family->num_of_pro == '6') 6  @endif
                                        @if($Kid->Family->num_of_pro == '7') 7  @endif
                                        @if($Kid->Family->num_of_pro == '8') 8  @endif
                                        @if($Kid->Family->num_of_pro == '9')  9 @endif
                                        @if($Kid->Family->num_of_pro == '10') 10  @endif
                                    </p>

                                </div>
                                <div class="form-group family-data">
                                    <label>عدد الأشقاء الاناث </label>

                                        @if($Kid->Family->num_of_sis == '1')  1 @endif
                                        @if($Kid->Family->num_of_sis == '2')  2 @endif
                                        @if($Kid->Family->num_of_sis == '3') 3  @endif
                                        @if($Kid->Family->num_of_sis == '4') 4  @endif
                                        @if($Kid->Family->num_of_sis == '5') 5  @endif
                                        @if($Kid->Family->num_of_sis == '6') 6  @endif
                                        @if($Kid->Family->num_of_sis == '7') 7  @endif
                                        @if($Kid->Family->num_of_sis == '8') 8  @endif
                                        @if($Kid->Family->num_of_sis == '9')  9 @endif
                                        @if($Kid->Family->num_of_sis == '10') 10  @endif
                                    </p>

                                </div>
                                <div class="form-group family-data">
                                    <label> الطفل بين أشقاءه</label>
                                    <p>
                                        @if($Kid->Family->sort_of == '1')  1 @endif
                                        @if($Kid->Family->sort_of == '2')  2 @endif
                                        @if($Kid->Family->sort_of == '3') 3  @endif
                                        @if($Kid->Family->sort_of == '4') 4  @endif
                                        @if($Kid->Family->sort_of == '5') 5  @endif
                                        @if($Kid->Family->sort_of == '6') 6  @endif
                                        @if($Kid->Family->sort_of == '7') 7  @endif
                                        @if($Kid->Family->sort_of == '8') 8  @endif
                                        @if($Kid->Family->sort_of == '9')  9 @endif
                                        @if($Kid->Family->sort_of == '10') 10  @endif
                                    </p>

                                </div>
                                <div class="form-group family-data">
                                    <label>هل لدى الطفل شقيق يعاني من التوحد </label>
                                    <p>
                                        @if($Kid->Family->bro_autism == 'no')  لا، لا يوجد @endif
                                        @if($Kid->Family->bro_autism == 'bro_autism') لديه شقيق يعاني من التوحد @endif
                                        @if($Kid->Family->bro_autism == 'many_bro_autism')  أكتر من شقيق يعاني من التوحد
                                        @endif
                                    </p>

                                </div>
                                <div class="form-group family-data">
                                    <label> هل لدى الطفل توأم</label>
                                    <p>
                                        @if($Kid->Family->has_twins == 'no') لا، لا يوجد @endif
                                        @if($Kid->Family->has_twins == 'yes_bro_autism') ويعاني من التوحد @endif
                                        @if($Kid->Family->has_twins == 'no_bro_autism') عم، ولكنه لا يعاني من التوحد @endif
                                    </p>
                                </div>

                                <div class="form-group family-data">
                                    <label>الحالة الاجتماعية للأسرة</label>
                                    <p>
                                        @if($Kid->Family->marital_status == 'mum_dad_togther') دان على علاقتهما الزوجية @endif
                                        @if($Kid->Family->marital_status == 'mum_dad_divorce') الوالدان منفصلان @endif
                                        @if($Kid->Family->marital_status == 'dad_died') الأب متوفي @endif
                                        @if($Kid->Family->marital_status == 'mum_died') الأم متوفي @endif
                                        @if($Kid->Family->marital_status == 'other') أخري @endif
                                    </p>
                                </div>

                                <div class="form-group family-data">
                                    <label>مع من يسكن الطفل</label>
                                    <p>
                                        @if($Kid->Family->with_live == 'parenthood') مع والديه @endif
                                        @if($Kid->Family->with_live == 'dad')   مع الأب  @endif
                                        @if($Kid->Family->with_live == 'mom') مع الأم @endif
                                        @if($Kid->Family->with_live == 'ather')  أخرى @endif
                                    </p>

                                </div>

                                <div class="form-group family-data">
                                    <label>متوسط دخل الأسرة الشهري</label>
                                    <p>
                                        @if($Kid->Family->income == '0')  لا يوجد دخل  @endif
                                        @if($Kid->Family->income == '4000')  أقل من 4,000 ريال @endif
                                        @if($Kid->Family->income == '4,000 - 10,000')    4,000 - 10,000 ريال @endif
                                        @if($Kid->Family->income == '10,000 - 15,000')  10,000 - 15,000 ريال @endif
                                        @if($Kid->Family->income == '15,000 - 20,000')  15,000 - 20,000 ريال @endif
                                        @if($Kid->Family->income ==  '20,000') أكثر من 20,000 ريال @endif

                                    </p>
                                </div>
                            </div>



                        </div>


                    </div>
                </div>
            </div>
    </div>

  </form>
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

    @include('sweetalert::alert')
    @include('sweetalert::validation-alert')  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".js-example-basic-single").select2();
    });
  </script>

</body>

</html>
