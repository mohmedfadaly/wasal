<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Kid</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="a0nymous"
      referrerpolicy="0-referrer"
    />
    <link
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/family-form.css')}}" />
    <style>
        .tab-form {
        margin-top: 50px;
    }
        .form-date {
    position: relative;
}
      #comment{
        visibility :hidden;
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
    <div class="tab-form">
        <form action="{{route('update_kids')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$Kid->id}}">

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
                          class="form-control child-name"
                          placeholder="أدخل اسم كاملاً..."
                          name="name"
                          value="{{$Kid->name}}"
                          required
                        />
                        <div class="error">يجب ألا يقل أسم الطفل عن 20 حرف</div>
                      </div>
                      <div class="form-group">
                        <label>رقم الهوية</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="أدخل رقم الهوية..."
                          name="num"
                          value="{{$Kid->num}}"
                          required
                        />
                      </div>
                      <div class="form-group  form-date" style="position:relative">
                        <label> تاريخ الميلاد</label>

                            <input
                        class="form-control"
                       placeholder="أدخل تاريخ الميلاد..."
                       type="text"
                      value=" {{$Kid->date}}"
                       id="datepicker"

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
                          value="{{$Kid->place_date}}"
                        />
                      </div>
                      <div class="form-group">
                        <label>الجنس</label>
                        <select name="kind" class="form-control">
                          <option value="">اختر الجنس...</option>
                          <option value="1"  @if($Kid->kind == '1') selected @endif>ذكر</option>
                          <option value="0"  @if($Kid->kind == '0') selected @endif>أنثي</option>
                        </select>
                      </div>
                      <div class="form-group" style="position:relative;">
                        <label>الجنسية</label>
                        <select name="country_id" class="form-control js-example-basic-single country">
                          <option  selected>...اختر الجنسية</option>
							@foreach($countries as $value)
								<option value="{{$value->id}}" @if($Kid->country_id == $value->id) selected @endif>{{$value->name_ar}}</option>
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
                          value="{{$Kid->area}}"
                        />
                      </div>
                      <div class="form-group" style="position:relative;">

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
                              @if($Kid->other_obstruction == '1') checked @endif
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="other_obstruction"
                              @if($Kid->other_obstruction == '0') checked @endif

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
                            value="{{$Kid->other_obstruction_com}}"
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
                              @if($Kid->chronic_diseases == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="chronic_diseases"
                              @if($Kid->chronic_diseases == '0') checked @endif

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
                            value="{{$Kid->chronic_diseases_com}}"

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
                              @if($Kid->genetic_diseases == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="genetic_diseases"
                              @if($Kid->genetic_diseases == '0') checked @endif

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
                            value="{{$Kid->genetic_diseases}}"

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
                              @if($Kid->health_problems == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="health_problems"
                              @if($Kid->health_problems == '0') checked @endif

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
                            value="{{$Kid->health_problems_com}}"

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
                              @if($Kid->growth_stage == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="growth_stage"
                              @if($Kid->growth_stage == '0') checked @endif

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
                            value="{{$Kid->growth_stage_com}}"

                          />
                        </div>
                      </div>
                    </div>
                    <button class="btn w-50 m-auto d-block save-data">حفظ البيانات</button>
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
                          value="{{$Kid->Dad->name}}"


                        />
                      </div>
                      <div class="form-group">
                        <label>رقم الهوية</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="أدخل رقم الهوية..."
                          name="dad_num"
                          value="{{$Kid->Dad->num}}"
                        />
                      </div>
                      <div class="form-group form-date" style="position:relative">
                        <label> تاريخ الميلاد</label>

                                 <input
                        class="form-control"
                       placeholder="أدخل تاريخ الميلاد..."
                       type="text" id="datepicker4"
                       value="{{$Kid->Dad->date}}"
                                                    name="dad_date"

                          required
                        />
                    <img src="{{asset('dist/front/assets/images/calender.png')}}" class="datepickerimg" width="20px" alt="">

                      </div>

                      <div class="form-group">
                        <label>الحالة الاجتماعية</label>
                        <select name="dad_marital_status"  class="form-control">
                          <option value="" >اختر الحالة الاجتماعية...</option>
                          <option value="married" @if($Kid->Dad->marital_status == 'married') selected @endif>
                            متزوج
                          </option>
                          <option value="divorce" @if($Kid->Dad->marital_status == 'divorce') selected @endif>
                            مطلق
                          </option>
                          <option value="Widower" @if($Kid->Dad->marital_status == 'Widower') selected @endif>
                            أرمل
                          </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label> رقم التواصل</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="  أدخل رقم التواصل..."
                          name="dad_phone"
                          value="{{$Kid->Dad->phone}}"                        />
                      </div>
                      <div class="form-group">
                        <label>المستوى التعليمي</label>
                        <select name="dad_learning" class="form-control">
                          <option >اختر المستوى التعليمي...</option>
                          <option value="none" @if($Kid->Dad->learning == 'none') selected @endif>أمّي</option>
                          <option  value="primary" @if($Kid->Dad->learning == 'primary') selected @endif>
                            ابتدائي
                          </option>
                          <option  value="middle" @if($Kid->Dad->learning == 'middle') selected @endif>متوسط</option>
                          <option  value="secondary" @if($Kid->Dad->learning == 'secondary') selected @endif>
                            ثانوي
                          </option>
                          <option  value="diploma" @if($Kid->Dad->learning == 'diploma') selected @endif>دبلوم</option>
                          <option  value="Bachelor" @if($Kid->Dad->learning == 'Bachelor') selected @endif>
                            بكالوريس
                          </option>
                          <option  value="Master" @if($Kid->Dad->learning == 'Master') selected @endif>
                            ماجستير
                          </option>
                          <option  value="doctor" @if($Kid->Dad->learning == 'doctor') selected @endif>
                            دكتوراه
                          </option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label> طبيعة العمل</label>
                        <select class="form-control">
                          <option name="dad_work"  >اختر طبيعة العمل...</option>
                          <option value="public_work" @if($Kid->Dad->work == 'public_work') selected @endif>
                            موظف حكومي
                          </option>
                          <option value="private_work" @if($Kid->Dad->work == 'private_work') selected @endif>
                            موظف قطاع خاص
                          </option>
                          <option value="free_work" @if($Kid->Dad->work == 'free_work') selected @endif >
                            أعمال حرة
                          </option>
                          <option value="don't_work" @if($Kid->Dad->work == "don't_work") selected @endif>
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
                              @if($Kid->Dad->smoking == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="0"
                              name="dad_smoking"
                              @if($Kid->Dad->smoking == '0') checked @endif

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
                              @if($Kid->Dad->obstruction == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_obstruction"
                              @if($Kid->Dad->obstruction == '0') checked @endif

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
                            value="{{$Kid->Dad->obstruction_com}}"
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
                              @if($Kid->Dad->chronic_diseases == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_chronic_diseases"
                              @if($Kid->Dad->chronic_diseases == '0') checked @endif
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
                            value="{{$Kid->Dad->chronic_diseases_com}}"
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
                              @if($Kid->Dad->genetic_diseases == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_genetic_diseases"
                              @if($Kid->Dad->genetic_diseases == '0') checked @endif

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
                            value="{{$Kid->Dad->genetic_diseases_com}}"

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
                              value="1"
                              name="dad_mental_state"
                              @if($Kid->Dad->mental_state == '1') checked @endif

                            />
                            <label class="custom-control-label"> طبيعي </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="0"
                              name="dad_mental_state"
                              @if($Kid->Dad->mental_state == '0') checked @endif

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
      value="{{$Kid->Dad->mental_state_com}}"

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
                              @if($Kid->Dad->health_problems == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="dad_health_problems"
                              @if($Kid->Dad->health_problems == '0') checked @endif

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
      value="{{$Kid->Dad->health_problems_com}}"

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
                              @if($Kid->Dad->communication == 'good') checked @endif

                            />
                            <label class="custom-control-label"> قوية </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="maddele"
                              name="dad_communication"
                              @if($Kid->Dad->communication == 'maddele') checked @endif

                            />
                            <label class="custom-control-label">متوسطة</label>
                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="week"
                              name="dad_communication"
                              @if($Kid->Dad->communication == 'week') checked @endif

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
      value="{{$Kid->Dad->communication_com}}"

    />
    </div>

                      </div>
                    </div>
                    <button class="btn w-50 m-auto d-block">حفظ البيانات</button>
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
                          value="{{$Kid->Mom->name}}"
                          />

                      </div>
                      <div class="form-group">
                        <label>رقم الهوية</label>
                        <input
                          type="number"
                          class="form-control"
                          placeholder="أدخل رقم الهوية..."
                          name="mom_num"
                          value="{{$Kid->Mom->num}}"

                        />
                      </div>
<<<<<<< HEAD
                      <div class="form-group form-date" style="position:relative">
                        <label> تاريخ الميلاد</label>

                                                    <input
                        class="form-control"
                       placeholder="أدخل تاريخ الميلاد..."
                       type="text"
                       id="datepicker5"
                           name="mom_date"
value="{{$Kid->Mom->date}}"
                          required
                        />
                    <img src="{{asset('dist/front/assets/images/calender.png')}}" class="datepickerimg" width="20px" alt="">

                      </div>

                      <div class="form-group">
                        <label>الحالة الاجتماعية</label>
                        <select name="mom_marital_status"  class="form-control">
                            <option value="" >اختر الحالة الاجتماعية...</option>

                            <option value="married" @if($Kid->Mom->marital_status == 'married') selected @endif>
                              متزوج
                            </option>
                            <option value="divorce" @if($Kid->Mom->marital_status == 'divorce') selected @endif>
                              مطلق
                            </option>
                            <option value="Widower" @if($Kid->Mom->marital_status == 'Widower') selected @endif>
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
                          name="mom_phone"
                          value="{{$Kid->Mom->phone}}"

                        />
                      </div>
                      <div class="form-group">
                        <label>المستوى التعليمي</label>
                        <select name="mom_learning" class="form-control">
                            <option >اختر المستوى التعليمي...</option>
                          <option value="none" @if($Kid->Mom->learning == 'none') selected @endif>أمّي</option>
                          <option  value="primary" @if($Kid->Mom->learning == 'primary') selected @endif>
                            ابتدائي
                          </option>
                          <option  value="middle" @if($Kid->Mom->learning == 'middle') selected @endif>متوسط</option>
                          <option  value="secondary" @if($Kid->Mom->learning == 'secondary') selected @endif>
                            ثانوي
                          </option>
                          <option  value="diploma" @if($Kid->Mom->learning == 'diploma') selected @endif>دبلوم</option>
                          <option  value="Bachelor" @if($Kid->Mom->learning == 'Bachelor') selected @endif>
                            بكالوريس
                          </option>
                          <option  value="Master" @if($Kid->Mom->learning == 'Master') selected @endif>
                            ماجستير
                          </option>
                          <option  value="doctor" @if($Kid->Mom->learning == 'doctor') selected @endif>
                            دكتوراه
                          </option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label> طبيعة العمل</label>
                        <select name="mom_work" class="form-control">
                            <option name="dad_work"  >اختر طبيعة العمل...</option>
                            <option value="public_work" @if($Kid->Mom->work == 'public_work') selected @endif>
                              موظف حكومي
                            </option>
                            <option value="private_work" @if($Kid->Mom->work == 'private_work') selected @endif>
                              موظف قطاع خاص
                            </option>
                            <option value="free_work" @if($Kid->Mom->work == 'free_work') selected @endif >
                              أعمال حرة
                            </option>
                            <option value="don't_work" @if($Kid->Mom->work == "don't_work") selected @endif>
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
                              @if($Kid->Mom->smoking == '1') checked @endif
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_smoking"
                              @if($Kid->Mom->smoking == '0') checked @endif
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
                              @if($Kid->Mom->obstruction == '1') checked @endif
                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_obstruction"
                              @if($Kid->Mom->obstruction == '0') checked @endif

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
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->obstruction_com}}"

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
                              @if($Kid->Mom->chronic_diseases == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_chronic_diseases"
                              @if($Kid->Mom->chronic_diseases == '0') checked @endif

                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_chronic_diseases_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->hronic_diseases_com}}"

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
                              @if($Kid->Mom->genetic_diseases == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_genetic_diseases"
                              @if($Kid->Mom->genetic_diseases == '0') checked @endif

                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_genetic_diseases_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->genetic_diseases_com}}"

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
                              @if($Kid->Mom->health_problems == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_health_problems"
                              @if($Kid->Mom->health_problems == '0') checked @endif

                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_health_problems_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->health_problems_com}}"

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
                              value="1"
                              name="mom_mental_state"
                              @if($Kid->Mom->mental_state == '1') checked @endif

                            />
                            <label class="custom-control-label"> طبيعي </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="0"
                              name="mom_mental_state"
                              @if($Kid->Mom->mental_state == '0') checked @endif

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
                          name="mom_mental_state_com"
                          placeholder="أذكر التعليق هنا..."
                          value="{{$Kid->Mom->mental_state_com}}"

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
                              @if($Kid->Mom->communication == 'good') checked @endif

                            />
                            <label class="custom-control-label"> قوية </label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="maddele"
                              name="mom_communication"
                              @if($Kid->Mom->communication == 'maddele') checked @endif

                            />
                            <label class="custom-control-label">متوسطة</label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="week"
                              name="mom_communication"
                              @if($Kid->Mom->communication == 'week') checked @endif


                            />
                            <label class="custom-control-label">ضعيفة</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_communication_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->communication_com}}"

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
                              @if($Kid->Mom->pregnancy == '0') checked @endif

                            />
                            <label class="custom-control-label"> طبيعي </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="1"
                              name="mom_pregnancy"
                              @if($Kid->Mom->pregnancy == '1') checked @endif

                            />
                            <label class="custom-control-label">أطفال أنابيب</label>

                            <input
                              type="radio"
                              class="custom-control-input comment-tab"
                              value="2"
                              name="mom_pregnancy"
                              @if($Kid->Mom->pregnancy == '2') checked @endif

                            />
                            <label class="custom-control-label">أخرى</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_pregnancy_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->pregnancy_com}}"

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
                              @if($Kid->Mom->pregnancy_month == '7') checked @endif

                            />
                            <label class="custom-control-label"> 7 شهور </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="8"
                              name="mom_pregnancy_month"
                              @if($Kid->Mom->pregnancy_month == '8') checked @endif

                            />
                            <label class="custom-control-label">8 شهور </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="9"
                              name="mom_pregnancy_month"
                              @if($Kid->Mom->pregnancy_month == '9') checked @endif

                            />
                            <label class="custom-control-label">9 شهور</label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="10"
                              name="mom_pregnancy_month"
                              @if($Kid->Mom->pregnancy_month == '10') checked @endif

                            />
                            <label class="custom-control-label">10 شهور</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_pregnancy_month_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->pregnancy_month_com}}"

                          />
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
                              @if($Kid->Mom->pregnancy_problems == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_pregnancy_problems"
                              @if($Kid->Mom->pregnancy_problems == '0') checked @endif

                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_pregnancy_problems_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->pregnancy_problems_com}}"

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
                              @if($Kid->Mom->birth_status == '1') checked @endif

                            />
                            <label class="custom-control-label"> طبيعية </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_birth_status"
                              @if($Kid->Mom->birth_status == '0') checked @endif

                            />
                            <label class="custom-control-label">قيصرية</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_birth_status_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->birth_status_com}}"

                          />
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
                              @if($Kid->Mom->birth_problems == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_birth_problems"
                              @if($Kid->Mom->birth_problems == '0') checked @endif

                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_birth_problems_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->birth_problems_com}}"

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
                              @if($Kid->Mom->birth_after_problems == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_birth_after_problems"
                              @if($Kid->Mom->birth_after_problems == '0') checked @endif

                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>
                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_birth_after_problems_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->birth_after_problems_com}}"

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
                              @if($Kid->Mom->lactation == '1') checked @endif

                            />
                            <label class="custom-control-label"> نعم </label>

                            <input
                              type="radio"
                              class="custom-control-input"
                              value="0"
                              name="mom_lactation"
                              @if($Kid->Mom->lactation == '0') checked @endif

                            />
                            <label class="custom-control-label">لا</label>
                          </div>
                        </div>

                        <div class="comment">
                          <input
                            type="text"
                            class="form-control"
                            id="comment"
                            name="mom_lactation_com"
                            placeholder="أذكر التعليق هنا..."
                            value="{{$Kid->Mom->lactation_com}}"

                          />
                        </div>
                      </div>
                    </div>
                    <button class="btn w-50 m-auto d-block">حفظ البيانات</button>
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
                            <option value="1" @if($Kid->Family->num_of == '1') selected @endif>1</option>
                            <option value="2" @if($Kid->Family->num_of == '2') selected @endif>2</option>
                            <option value="3" @if($Kid->Family->num_of == '3') selected @endif>3</option>
                            <option value="4" @if($Kid->Family->num_of == '4') selected @endif>4</option>
                            <option value="5" @if($Kid->Family->num_of == '5') selected @endif>5</option>
                            <option value="6" @if($Kid->Family->num_of == '6') selected @endif>6</option>
                            <option value="7" @if($Kid->Family->num_of == '7') selected @endif>7</option>
                            <option value="8" @if($Kid->Family->num_of == '8') selected @endif>8</option>
                            <option value="9" @if($Kid->Family->num_of == '9') selected @endif>9</option>
                            <option value="10" @if($Kid->Family->num_of == '10') selected @endif>10</option>
                          </select>
                        </div>
                        <div class="form-group family-data">
                          <label>عدد الأشقاء الذكور</label>
                          <select name="family_num_of_pro" class="form-control" name="" id="">
                            <option >اختر عدد الأشقاء الذكور...</option>
                            <option value="1" @if($Kid->Family->num_of_pro == '1') selected @endif>1</option>
                            <option value="2" @if($Kid->Family->num_of_pro == '2') selected @endif>2</option>
                            <option value="3" @if($Kid->Family->num_of_pro == '3') selected @endif>3</option>
                            <option value="4" @if($Kid->Family->num_of_pro == '4') selected @endif>4</option>
                            <option value="5" @if($Kid->Family->num_of_pro == '5') selected @endif>5</option>
                            <option value="6" @if($Kid->Family->num_of_pro == '6') selected @endif>6</option>
                            <option value="7" @if($Kid->Family->num_of_pro == '7') selected @endif>7</option>
                            <option value="8" @if($Kid->Family->num_of_pro == '8') selected @endif>8</option>
                            <option value="9" @if($Kid->Family->num_of_pro == '9') selected @endif>9</option>
                            <option value="10" @if($Kid->Family->num_of_pro == '10') selected @endif>10</option>
                          </select>
                        </div>
                        <div class="form-group family-data">
                          <label>عدد الأشقاء الاناث </label>
                          <select name="family_num_of_sis" class="form-control" name="" id="">
                            <option >اختر عدد الأشقاء الاناث...</option>
                            <option value="1" @if($Kid->Family->num_of_sis == '1') selected @endif>1</option>
                            <option value="2" @if($Kid->Family->num_of_sis == '2') selected @endif>2</option>
                            <option value="3" @if($Kid->Family->num_of_sis == '3') selected @endif>3</option>
                            <option value="4" @if($Kid->Family->num_of_sis == '4') selected @endif>4</option>
                            <option value="5" @if($Kid->Family->num_of_sis == '5') selected @endif>5</option>
                            <option value="6" @if($Kid->Family->num_of_sis == '6') selected @endif>6</option>
                            <option value="7" @if($Kid->Family->num_of_sis == '7') selected @endif>7</option>
                            <option value="8" @if($Kid->Family->num_of_sis == '8') selected @endif>8</option>
                            <option value="9" @if($Kid->Family->num_of_sis == '9') selected @endif>9</option>
                            <option value="10" @if($Kid->Family->num_of_sis == '10') selected @endif>10</option>
                          </select>
                        </div>

                        <div class="form-group family-data">
                          <label>ترتيب الطفل بين أشقاءه </label>
                          <select name="family_sort_of"  class="form-control" name="" id="">
                            <option >اختر ترتيب الطفل بين أشقاءه...</option>
                            <option value="1" @if($Kid->Family->sort_of == '1') selected @endif>1</option>
                            <option value="2" @if($Kid->Family->sort_of == '2') selected @endif>2</option>
                            <option value="3" @if($Kid->Family->sort_of == '3') selected @endif>3</option>
                            <option value="4" @if($Kid->Family->sort_of == '4') selected @endif>4</option>
                            <option value="5" @if($Kid->Family->sort_of == '5') selected @endif>5</option>
                            <option value="6" @if($Kid->Family->sort_of == '6') selected @endif>6</option>
                            <option value="7" @if($Kid->Family->sort_of == '7') selected @endif>7</option>
                            <option value="8" @if($Kid->Family->sort_of == '8') selected @endif>8</option>
                            <option value="9" @if($Kid->Family->sort_of == '9') selected @endif>9</option>
                            <option value="10" @if($Kid->Family->sort_of == '10') selected @endif>10</option>
                          </select>
                        </div>

                        <div class="form-group family-data">
                          <label>هل لدى الطفل شقيق يعاني من التوحد </label>
                          <select name="family_bro_autism" class="form-control" name="" id="">
                            <option value="">اختر الاجابة...</option>
                            <option  value="no" @if($Kid->Family->bro_autism == 'no') selected @endif>
                              لا، لا يوجد
                            </option>
                            <option  value="bro_autism" @if($Kid->Family->bro_autism == 'bro_autism') selected @endif>
                              نعم، لديه شقيق يعاني من التوحد
                            </option>
                            <option

                              value="many_bro_autism"
                              @if($Kid->Family->bro_autism == 'many_bro_autism') selected @endif>
                              نعم، لديه أكتر من شقيق يعاني من التوحد
                            </option>
                          </select>
                        </div>
                        <div class="form-group family-data">
                          <label> هل لدى الطفل توأم</label>
                          <select name="family_has_twins"  class="form-control" name="" id="">
                            <option>اختر الاجابة...</option>
                            <option value="no"  @if($Kid->Family->has_twins == 'no') selected @endif>
                              لا، لا يوجد
                            </option>
                            <option value="yes_bro_autism" @if($Kid->Family->has_twins == 'yes_bro_autism') selected @endif>
                              نعم، ويعاني من التوحد
                            </option>
                            <option value="no_bro_autism" @if($Kid->Family->has_twins == 'no_bro_autism') selected @endif>
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
                              @if($Kid->Family->marital_status == 'mum_dad_togther') selected
                            >
                            @endif
                              الوالدان على علاقتهما الزوجية
                            </option>
                            <option

                              value="mum_dad_divorce"
                              @if($Kid->Family->marital_status == 'mum_dad_divorce') selected @endif

                            >
                              الوالدان منفصلان
                            </option>
                            <option  value="dad_died"@if($Kid->Family->marital_status == 'dad_died') selected @endif
                                >
                              الأب متوفي
                            </option>
                            <option  value="mum_died"
                            @if($Kid->Family->marital_status == 'mum_died') selected @endif
                            >
                              الأم متوفاه
                            </option>
                            <option  value="other"
                            @if($Kid->Family->marital_status == 'other') selected @endif
                            >
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
                            <option value="parenthood" @if($Kid->Family->with_live == 'parenthood') selected @endif>
                              مع والديه
                            </option>
                            <option value="dad" @if($Kid->Family->with_live == 'dad') selected @endif>
                              مع الأب
                            </option>
                            <option value="mom" @if($Kid->Family->with_live == 'mom') selected @endif>
                              مع الأم
                            </option>
                            <option value="ather" @if($Kid->Family->with_live == 'ather') selected @endif>أخرى</option>
                          </select>
                        </div>

                        <div class="form-group family-data">
                          <label>متوسط دخل الأسرة الشهري</label>
                          <select class="form-control"name="family_income" id="">
                            <option>اختر متوسط دخل الأسرة...</option>
                            <option value="0" @if($Kid->Family->income == '0') selected @endif>
                              لا يوجد دخل
                            </option>
                            <option value="4000"  @if($Kid->Family->income == '4000') selected @endif>
                              أقل من 4,000 ريال
                            </option>
                            <option value="4,000 - 10,000" @if($Kid->Family->income == '4,000 - 10,000') selected @endif>
                              4,000 - 10,000 ريال
                            </option>
                            <option value="10,000 - 15,000" @if($Kid->Family->income == '10,000 - 15,000') selected @endif>
                              10,000 - 15,000 ريال
                            </option>
                            <option value="15,000 - 20,000" @if($Kid->Family->income == '15,000 - 20,000') selected @endif>
                              15,000 - 20,000 ريال
                            </option>
                            <option value="20,000" @if($Kid->Family->income == '20,000') selected @endif>
                              أكثر من 20,000 ريال
                            </option>
                          </select>
                        </div>
                      </div>

                        <button class="btn w-50 m-auto d-block">حفظ البيانات</button>


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
    <script>
     $(document).ready(function () {
        //  $( "#comment" ).each(function( index ) {
        //      console.log(index +":"+$( this ));
        //  });

        if($("#comment").val() == " "){

          $("#comment").css("visibility", "hidden");
      }else{
          console.log("red");
          $("#comment").css("visibility", "visible");
      }

});

    $(':radio').on('click', function() {

    if($(this).val() == '1'){

        $( this ).parent().parent().parent().children().children('#comment').css("visibility", "visible")
        // $( this ).parent().parent().parent().children().children('#comment').prop('disabled',false);
        //  $( this ).parent().parent().parent().children().children('#comment').prop('required',true);

    }else{
            $( this ).parent().parent().parent().children().children('#comment').css("visibility", "hidden")
            // $( this ).parent().parent().parent().children().children('#comment').prop('disabled',true);
            // $( this ).parent().parent().parent().children().children('#comment').prop('required',false);

    }

});
    </script>
    <script>
      $(document).ready(function () {
        $(".js-example-basic-single").select2();
      });


      // get cities
function GetDefaultsubSections()
{
	var data = {
		country    : {{$Kid->country_id}},
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
			if(v.id == "{{$Kid->city_id}}")
			{
				$('.cities').append(`
					<option value="${v.id}" selected>${v.name_ar}</option>
				`);
			}else{
				$('.cities').append(`
					<option value="${v.id}">${v.name_ar}</option>
				`);
			}
		})
        $(".js-example-basic-single").select2();
	}});
}
GetDefaultsubSections()


// get sub sections
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
    $(".js-example-basic-single").select2();
    }});

});

    </script>
    <script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>
    @include('sweetalert::alert')
@include('sweetalert::validation-alert')
        <!--<script src="https://code.jquery.com/jquery-3.6.0.js"></script>-->
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script>
   $(function(){
    $("#datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    });
        $("#datepicker4").datepicker({
        dateFormat: "yy-mm-dd"
    });
        $("#datepicker5").datepicker({
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



      if(countMsg == 1 ){
        error.innerText = "باقي حرف واحد"  ;
        saveData.disabled = true;
      }
      else if(countMsg == 0 || count > 20){
          console.log(countMsg);
      error.style.display="none";

        saveData.disabled = false;
      }
}
        </script>
  </body>
</html>
