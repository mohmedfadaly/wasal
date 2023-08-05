<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Kid File</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="a0nymous"
      referrerpolicy="0-referrer"
    />

     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" href="{{asset('dist/front/assets/css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/family-form.css')}}" />
    <!--<link rel="stylesheet" href="{{asset('dist/front/assets/css/table-style.css')}}" />-->
    <style>
        .tab-form {
        margin-top: 50px;
    }
    #comment{
        visibility :hidden;
    }
    .red{
        border:1px solid red;
    }

      </style>

  </head>
  <body>
    <!--header-->
    @include('front.parts_auth.nav')
    @if(auth()->guard('customer')->check())
    @if(auth()->guard('customer')->user()->active == 0)
        @include('front.home.home_vrayfiy')

    @else
     <nav aria-label="breadcrumb mt-5 mb-5">
      <div class="container">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">الرئيسية </a></li>
          <li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-chevron-left"></i> اضافه ملف</li>
        </ol>
      </div>
    </nav>
    <div class="tab-form">
        <form action="{{route('store_kids')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="container">
              <div class="row">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home"
                      >بيانات الطفل</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu1"
                      >بيانات الأب</a
                    >
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu2">
                      بيانات الأم</a
                    >
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu3"
                      >بيانات الأسرة</a
                    >
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div id="home" class="container tab-pane active">
                    <br />

                    <div class="text-data">
                      <div class="form-title">
                        <img src="{{asset('dist/front/assets/images/personal-information.jpg')}}" />
                        <h3>بيانات أساسية</h3>
                      </div>
                      <div class="form-group">
                        <label>الاسم كاملاً </label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="أدخل اسم كاملاً..."
                          name="name"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label>رقم الهوية</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="أدخل رقم الهوية..."
                          name="num"
                           minlength="7"
                          required
                        />
                      </div>
                      <div class="form-group form-date">
                        <label> تاريخ الميلاد</label>
                        <input
                        class="form-control"
                       placeholder="أدخل تاريخ الميلاد..."
                       type="text" id="datepicker"
                          name="date"
                          required
                        />
                    <img src="{{asset('dist/front/assets/images/calender.png')}}" class="datepickerimg" width="20px" alt="">
                      </div>
                      <div class="form-group">
                        <label>مكان الميلاد</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="أدخل مكان الميلاد..."
                          name="place_date"
                        />
                      </div>
                      <div class="form-group">
                        <label>الجنس</label>
                        <select name="kind" class="form-control">
                          <option value="">اختر الجنس...</option>
                          <option value="1">ذكر</option>
                          <option value="0">أنثي</option>
                        </select>
                      </div>
                      <div class="form-group" style="position:relative;">
                        <label>الجنسية</label>
                        <select name="country_id" class="form-control js-example-basic-single country">
                          <!--<option  selected>...اختر الجنسية</option>-->
							@foreach($countries as $value)
								<option value="{{$value->id}}">{{$value->name_ar}}</option>
							@endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label>منطقة السكن</label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="أدخل  منطقة السكن ..."
                          name="area"
                        />
                      </div>
                      <div class="form-group" style="position:relative">
                        <label>المدينة </label>
                        <select name="city_id" class="form-control cities js-example-basic-single" required>

						</select>

                      </div>
                    </div>
                    <div class="text-data">
                      <div class="form-title">
                        <img src="{{asset('dist/front/assets/images/medical 1.jpg')}}" />
                        <h3>بيانات صحية</h3>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل لدى الطفل اعاقات أخرى</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="other_obstruction"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="other_obstruction"
                            />
                            <label class="custom-control-label">لا</label>

                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="أذكر التعليق هنا..."
                            name="other_obstruction_com"
                            id="comment"
                            disabled
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل لدى الطفل أمراض مزمنة</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="chronic_diseases"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="chronic_diseases"
                            />

                            <label class="custom-control-label">لا</label>
                          </div>

                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="أذكر التعليق هنا..."
                            name="chronic_diseases_com"
                            id="comment"
                            disabled
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل لدى الطفل أمراض وراثية</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="genetic_diseases"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="genetic_diseases"
                            />
                            <label class="custom-control-label">لا</label>

                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="أذكر التعليق هنا..."
                            name="genetic_diseases"
                            id="comment"
                            disabled
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل لدى الطفل مشاكل صحية أخرى</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="health_problems"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="health_problems"
                            />
                            <label class="custom-control-label">لا</label>

                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="أذكر التعليق هنا..."
                            name="health_problems_com"
                            id="comment"
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل مراحل النمو عند الطفل طبيعية منذ الولادة</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="growth_stage"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="growth_stage"
                            />
                            <label class="custom-control-label">لا</label>

                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="أذكر التعليق هنا..."
                            name="growth_stage_com"
                            id="comment"
                            disabled
                          />
                        </div>
                      </div>
                    </div>
                    <!--<button class="btn w-50 m-auto d-block">حفظ البيانات</button>-->
                  </div>
                  <div id="menu1" class="container tab-pane fade">
                    <br />

                    <div class="text-data">
                      <div class="form-title">
                        <img src="{{asset('dist/front/assets/images/personal-information.jpg')}}" />
                        <h3>بيانات أساسية</h3>
                      </div>
                      <div class="form-group">
                        <label>الاسم كاملاً </label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="أدخل اسم كاملاً..."
                          name="dad_name"
                          minlength="20"
                        />
                      </div>
                      <div class="form-group">
                        <label>رقم الهوية</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="أدخل رقم الهوية..."
                           minlength="7"
                          name="dad_num"
                        />
                      </div>
                      <div class="form-group form-date">
                        <label> تاريخ الميلاد</label>
                        <input
                           class="form-control"
                    placeholder="أدخل تاريخ الميلاد..."
                    type="text" id="datepicker1"
                          name="dad_date"
                        />
                        <img src="{{asset('dist/front/assets/images/calender.png')}}" class="datepickerimg" width="20px" alt="">
                      </div>

                      <div class="form-group">
                        <label>الحالة الاجتماعية</label>
                        <select name="dad_marital_status"  class="form-control">
                          <option value="" >اختر الحالة الاجتماعية...</option>
                          <option value="married">
                            متزوج
                          </option>
                          <option value="divorce">
                            مطلق
                          </option>
                          <option value="Widower">
                            أرمل
                          </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label> رقم التواصل</label>
                        <input
                          type="phone"
                          class="form-control"
                          placeholder="  أدخل رقم التواصل..."
                          name="dad_phone"
                        />
                      </div>
                      <div class="form-group">
                        <label>المستوى التعليمي</label>
                        <select name="dad_learning" class="form-control">
                          <option>اختر المستوى التعليمي...</option>
                          <option value="none">أمّي</option>
                          <option  value="primary">
                            ابتدائي
                          </option>
                          <option  value="middle">متوسط</option>
                          <option  value="secondary">
                            ثانوي
                          </option>
                          <option  value="diploma">دبلوم</option>
                          <option  value="Bachelor">
                            بكالوريس
                          </option>
                          <option  value="Master">
                            ماجستير
                          </option>
                          <option  value="doctor">
                            دكتوراه
                          </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label> طبيعة العمل</label>
                        <select class="form-control">
                          <option name="dad_work" >اختر طبيعة العمل...</option>
                          <option value="public_work">
                            موظف حكومي
                          </option>
                          <option value="private_work">
                            موظف قطاع خاص
                          </option>
                          <option value="free_work">
                            أعمال حرة
                          </option>
                          <option value="don't_work">
                            لا يعمل
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="text-data">
                      <div class="form-title">
                        <img src="{{asset('dist/front/assets/images/medical 1.jpg')}}" />
                        <h3>بيانات صحية</h3>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل الأب مدخن</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input"
                              value="1"
                              name="dad_smoking"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="0"
                              name="dad_smoking"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>

                        </div>

                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل لدى الأب إعاقة</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="dad_obstruction"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_obstruction"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="أذكر التعليق هنا..."
                            name="dad_obstruction_com"
                            id="comment"
                            disabled
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل يعاني الأب من أمراض مزمنة</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="dad_chronic_diseases"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_chronic_diseases"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            placeholder="أذكر التعليق هنا..."
                            name="dad_chronic_diseases_com"
                            id="comment"
                            disabled
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل يعاني الأب من أمراض وراثية</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="dad_genetic_diseases"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_genetic_diseases"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                          <div class="comment">

                            <input
                            type="text"
                            class="form-control"
                            placeholder="أذكر التعليق هنا..."
                            name="dad_genetic_diseases_com"
                            id="comment"
                            disabled
                          />
                          </div>


                      </div>

                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>ما هي الحالة النفسية للأب</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_mental_state"
                            />
                            <label class="custom-control-label"> طبيعي </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="dad_mental_state"
                            />
                            <label class="custom-control-label"
                              >يعاني من مشاكل نفسية</label
                            >
                          </div>
                        </div>
                    <div class="comment">
                      <input
                      type="text"
                      class="form-control"
                      placeholder="أذكر التعليق هنا..."
                      name="dad_mental_state_com"
                      id="comment"
                      disabled
                    />
                    </div>

                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل يعاني الأب من مشاكل صحية أخرى</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="dad_health_problems"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_health_problems"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                    <div class="comment">
                      <input
                      type="text"
                      class="form-control"
                      placeholder="أذكر التعليق هنا..."
                      name="dad_health_problems_com"
                      id="comment"
                      disabled
                    />
                    </div>

                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>ما هي درجة تواصل الأب مع الطفل</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="good"
                              name="dad_communication"
                            />
                            <label class="custom-control-label"> قوية </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="maddele"
                              name="dad_communication"
                            />
                            <label class="custom-control-label">متوسطة</label>
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="week"
                              name="dad_communication"
                            />
                            <label class="custom-control-label">ضعيفة</label>
                          </div>
                        </div>
                    <div class="comment">
                      <input
                      type="text"
                      class="form-control"
                      placeholder="أذكر التعليق هنا..."
                      name="dad_communication_com"
                      id="comment"
                      disabled
                    />
                    </div>

                      </div>
                    </div>

                    <!--<button class="btn w-50 m-auto d-block">حفظ البيانات</button>-->
                  </div>

                  <div id="menu2" class="container tab-pane fade">
                    <br />

                    <div class="text-data">
                      <div class="form-title">
                        <img src="{{asset('dist/front/assets/images/personal-information.jpg')}}" />
                        <h3>بيانات أساسية</h3>
                      </div>
                      <div class="form-group">
                        <label>الاسم كاملاً </label>
                        <input
                          type="text"
                          class="form-control"
                          placeholder="أدخل اسم كاملاً..."
                          name="mom_name"
                          minlength="20"
                        />
                      </div>
                      <div class="form-group">
                        <label>رقم الهوية</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="أدخل رقم الهوية...
                          "
                           minlength="7"
                          name="mom_num"
                        />
                      </div>
                      <div class="form-group form-date">
                        <label> تاريخ الميلاد</label>
                        <input
                     class="form-control"
                    placeholder="أدخل تاريخ الميلاد..."
                    type="text" id="datepicker2"
                          name="mom_date"
                        />
            <img src="{{asset('dist/front/assets/images/calender.png')}}" class="datepickerimg" width="20px" alt="">

                      </div>

                      <div class="form-group">
                        <label>الحالة الاجتماعية</label>
                        <select name="mom_marital_status"  class="form-control">
                          <option  value="">اختر الحالة الاجتماعية...</option>
                          <option value="married">
                            متزوجة
                          </option>
                          <option value="divorce">
                            مطلقة
                          </option>
                          <option value="Widower">
                            أرملة
                          </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label> رقم التواصل</label>
                        <input
                          type="phone"
                          class="form-control"
                          placeholder="  أدخل رقم التواصل..."
                          name="mom_phone"
                        />
                      </div>
                      <div class="form-group">
                        <label>المستوى التعليمي</label>
                        <select name="mom_learning" class="form-control">
                            <option>اختر المستوى التعليمي...</option>
                            <option value="none">أمّي</option>
                            <option  value="primary">
                              ابتدائي
                            </option>
                            <option  value="middle">متوسط</option>
                            <option  value="secondary">
                              ثانوي
                            </option>
                            <option  value="diploma">دبلوم</option>
                            <option  value="Bachelor">
                              بكالوريس
                            </option>
                            <option  value="Master">
                              ماجستير
                            </option>
                            <option  value="doctor">
                              دكتوراه
                            </option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label> طبيعة العمل</label>
                        <select name="mom_work" class="form-control">
                          <option>اختر طبيعة العمل...</option>
                          <option value="mom_public_work">
                            موظف حكومي
                          </option>
                          <option value="mom_private_work">
                            موظف قطاع خاص
                          </option>
                          <option value="mom_free_work">
                            أعمال حرة
                          </option>
                          <option value="mom_don't_work">
                            لا يعمل
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="text-data">
                      <div class="form-title">
                        <img src="{{asset('dist/front/assets/images/medical 1.jpg')}}" />
                        <h3>بيانات صحية</h3>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title ">
                            <h4>هل الأم مدخنة</h4>
                          </div>
                          <div class="custom-control custom-radio ">
                            <input
                              type="radio"
                              class="custom-control-input"
                              value="1"
                              name="mom_smoking"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_smoking"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل لدى الأم إعاقة</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_obstruction"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_obstruction"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            name="mom_obstruction_com"
                            id="comment"
                            disabled
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل تعاني الأم من أمراض مزمنة</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_chronic_diseases"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_chronic_diseases"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            disabled
                            name="mom_chronic_diseases_com"
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل تعاني الأم من أمراض وراثية</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_genetic_diseases"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_genetic_diseases"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            disabled
                            name="mom_genetic_diseases_com"
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل تعاني الأم من مشاكل صحية أخرى</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_health_problems"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_health_problems"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            disabled
                            name="mom_health_problems_com"
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>

                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>ما هي الحالة النفسية للأم</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_mental_state"
                            />
                            <label class="custom-control-label"> طبيعية</label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_mental_state"
                            />
                            <label class="custom-control-label"
                              >تعاني من مشاكل نفسية</label
                            >
                          </div>
                        </div>
                          <div class="comment">
                        <input
                          type="text"
                          class="form-control"
                          id="comment"
                          disabled
                          name="mom_mental_state_com"
                          placeholder="أذكر التعليق هنا..."
                        />
                    </div>

                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>ما هي درجة تواصل الأم مع الطفل</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="good"
                              name="mom_communication"
                            />
                            <label class="custom-control-label"> قوية </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="maddele"
                              name="mom_communication"
                            />
                            <label class="custom-control-label">متوسطة</label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="week"
                              name="mom_communication"
                            />
                            <label class="custom-control-label">ضعيفة</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            disabled
                            name="mom_communication_com"
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>

                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل الحمل بالطفل كان</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_pregnancy"
                            />
                            <label class="custom-control-label"> طبيعي </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="2"
                              name="mom_pregnancy"
                            />
                            <label class="custom-control-label">أطفال أنابيب</label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_pregnancy"
                            />
                            <label class="custom-control-label">أخرى</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            disabled
                            name="mom_pregnancy_com"
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>

                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>كم كانت أشهر الحمل بالطفل</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input"
                              value="7"
                              name="mom_pregnancy_month"
                            />
                            <label class="custom-control-label"> 7 شهور </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="8"
                              name="mom_pregnancy_month"
                            />
                            <label class="custom-control-label">8 شهور </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="9"
                              name="mom_pregnancy_month"
                            />
                            <label class="custom-control-label">9 شهور</label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="10"
                              name="mom_pregnancy_month"
                            />
                            <label class="custom-control-label">10 شهور</label>
                          </div>
                        </div>

                      </div>

                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل كانت هناك مشاكل صحية أثناء الحمل</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_pregnancy_problems"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_pregnancy_problems"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            disabled
                            name="mom_pregnancy_problems_com"
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>
                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل كانت ولادة الطفل</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input"
                              value="1"
                              name="mom_birth_status"
                            />
                            <label class="custom-control-label"> طبيعية </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_birth_status"
                            />
                            <label class="custom-control-label">قيصرية</label>
                          </div>
                        </div>

                      </div>

                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل كانت هناك مشاكل أثناء الولادة</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_birth_problems"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_birth_problems"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            disabled
                            name="mom_birth_problems_com"
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>

                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل كانت هناك مشاكل بعد الولادة</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="1"
                              name="mom_birth_after_problems"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_birth_after_problems"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            disabled
                            name="mom_birth_after_problems_com"
                            placeholder="أذكر التعليق هنا..."
                          />
                        </div>
                      </div>

                      <div class="medical-data w-100">
                        <div class="questions d-flex justify-content-between">
                          <div class="medical-data-title">
                            <h4>هل الرضاعة كانت طبيعية</h4>
                          </div>
                          <div class="custom-control custom-radio">
                            <input
                              type="radio"
                              class="custom-control-input"
                              value="1"
                              name="mom_lactation"
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_lactation"
                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>


                      </div>
                    </div>
                    <!--<button class="btn w-50 m-auto d-block">حفظ البيانات</button>-->
                                 </div>
                    <div id="menu3" class="container tab-pane fade">
                      <br />

                      <div class="text-data">
                        <div class="form-title">
                          <img src="{{asset('dist/front/assets/images/personal-information.jpg')}}" />
                          <h3>بيانات الأسرة</h3>
                        </div>

                        <div class="form-group family-data">
                          <label>عدد أفراد الاسره</label>
                          <select name="family_num_of"  class="form-control" name="" id="">
                            <option >اختر عدد أفراد الأسرة...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>
                        <div class="form-group family-data">
                          <label>عدد الأشقاء الذكور</label>
                          <select name="family_num_of_pro" class="form-control" name="" id="">
                            <option>اختر عدد الأشقاء الذكور...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>
                        <div class="form-group family-data">
                          <label>عدد الأشقاء الاناث </label>
                          <select name="family_num_of_sis" class="form-control" name="" id="">
                            <option>اختر عدد الأشقاء الاناث...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>

                        <div class="form-group family-data">
                          <label>ترتيب الطفل بين أشقاءه </label>
                          <select name="family_sort_of"  class="form-control" name="" id="">
                            <option >اختر ترتيب الطفل بين أشقاءه...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>

                        <div class="form-group family-data">
                          <label>هل لدى الطفل شقيق يعاني من التوحد </label>
                          <select name="family_bro_autism" class="form-control" name="" id="">
                            <option name="" value="">اختر الاجابة...</option>
                            <option  value="no">
                              لا، لا يوجد
                            </option>
                            <option  value="bro_autism">
                              نعم، لديه شقيق يعاني من التوحد
                            </option>
                            <option

                              value="many_bro_autism"
                            >
                              نعم، لديه أكتر من شقيق يعاني من التوحد
                            </option>
                          </select>
                        </div>
                        <div class="form-group family-data">
                          <label> هل لدى الطفل توأم</label>
                          <select name="family_has_twins"  class="form-control" name="" id="">
                            <option>اختر الاجابة...</option>
                            <option value="no">
                              لا، لا يوجد
                            </option>
                            <option value="yes_bro_autism">
                              نعم، ويعاني من التوحد
                            </option>
                            <option value="no_bro_autism">
                              نعم، ولكنه لا يعاني من التوحد
                            </option>
                          </select>
                        </div>

                        <div class="form-group family-data">
                          <label>الحالة الاجتماعية للأسرة</label>
                          <select name="family_marital_status" class="form-control" name="" id="">
                            <option>اختر الحالة الاجتماعية للأسرة الأسرة...</option>
                            <option

                              value="mum_dad_togther"
                            >
                              الوالدان على علاقتهما الزوجية
                            </option>
                            <option

                              value="mum_dad_divorce"
                            >
                              الوالدان منفصلان
                            </option>
                            <option  value="dad_died">
                              الأب متوفي
                            </option>
                            <option  value="mum_died">
                              الأم متوفاه
                            </option>
                            <option  value="other">
                              أخرى
                            </option>
                          </select>
                        </div>

                        <div class="form-group family-data">
                          <label>مع من يسكن الطفل</label>
                          <select class="form-control" name="family_with_live" id="">
                            <option  value="">
                              اختر مع من يسكن الطفل...
                            </option>
                            <option value="parenthood">
                              مع والديه
                            </option>
                            <option value="dad">
                              مع الأب
                            </option>
                            <option value="mom">
                              مع الأم
                            </option>
                            <option value="ather">أخرى</option>
                          </select>
                        </div>

                        <div class="form-group family-data">
                          <label>متوسط دخل الأسرة الشهري</label>
                          <select class="form-control"name="family_income" id="">
                            <option>اختر متوسط دخل الأسرة...</option>
                            <option value="0">
                              لا يوجد دخل
                            </option>
                            <option value="4000">
                              أقل من 4,000 ريال
                            </option>
                            <option value="4,000 - 10,000">
                              4,000 - 10,000 ريال
                            </option>
                            <option value="10,000 - 15,000">
                              10,000 - 15,000 ريال
                            </option>
                            <option value="15,000 - 20,000">
                              15,000 - 20,000 ريال
                            </option>
                            <option value="20,000">
                              أكثر من 20,000 ريال
                            </option>
                          </select>
                        </div>
                      </div>

                            <div class="d-flex justify-content-center ">
                       <button type="submit" name="submit" value="saveDataBtn1" class="btn mx-1 d-block save-data">حفظ البيانات </button>
                        <button type="submit" name="submit" value="saveDataBtn2" class="btn mx-1 d-block">الرجوع للرئيسيه</button>
                        <button type="submit" name="submit" value="saveDataBtn3" class="btn mx-1 d-block">ملئ بيانات جديده</button>
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

    <script src="{{asset('dist/front/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/jquery-3.6.3.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/app.js')}}"></script>

    <script src="{{asset('dist/front/assets/js/select2.min.js')}}"></script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>-->

    <script>

    $(':radio').on('click', function() {

    if($(this).val() == '1'){

        $( this ).parent().parent().parent().children().children('#comment').css("visibility", "visible")
        $( this ).parent().parent().parent().children().children('#comment').prop('disabled',false);
         $( this ).parent().parent().parent().children().children('#comment').prop('required',true);

    }else{
            $( this ).parent().parent().parent().children().children('#comment').css("visibility", "hidden")
            $( this ).parent().parent().parent().children().children('#comment').prop('disabled',true);
            $( this ).parent().parent().parent().children().children('#comment').prop('required',false);

    }

});
      $(document).ready(function () {
        $(".js-example-basic-single").select2();
      });

// get cities
$(document).on('change','.country', function(){

var data = {
country    : $(this).val(),
_token        : $("input[name='_token']").val()
}


    $.ajax({
    url     : "{{ route('get_cities') }}",
    method  : 'post',
    data    : data,
    success : function(s,result){
        $('.cities').html('')
        $('.cities').append(`
        `);
        $.each(s,function(k,v){
        $('.cities').append(`
            <option value="${v.id}">${v.name_ar}</option>
        `);
    })
    }});

});



    </script>
    <script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>
    @include('sweetalert::alert')
@include('sweetalert::validation-alert')

        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script>
   $(function(){
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });
        $("#datepicker1").datepicker({
        dateFormat: "yy-mm-dd"
    });
        $("#datepicker2").datepicker({
        dateFormat: "yy-mm-dd"
    });
});
        </script>


             <script>
          let childNme = document.querySelector(".child-name");
          let  saveData = document.querySelector(".save-data");
          let error = document.querySelector(".error");
          childNme.onkeyup = function(){
            let count =childNme.value.length;

    error.style.color="red";
           let countMsg = 20-count;
      error.innerText = "باقي" + countMsg ;
      saveData.disabled = true;


      if(countMsg == 1 ){
        error.innerText = "باقي حرف واحد"  ;
        saveData.disabled = true;
      }
      else if(countMsg == 0 || count > 20){
        error.style.display="none";

        saveData.disabled = false;
      }

}
        </script>

  </body>
</html>
