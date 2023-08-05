<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/family-form.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/table-style.css')}}" />
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
          <li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-chevron-left"></i> بيانات </li>
        </ol>
      </div>
    </nav>

   <div class="wrapper">
    <div class="container">
        <div class="row align-items-center ">
       
          <div class="col-md-6 ">
            <div class="form-title mt-4 mb-4 ">
            <img src="{{asset('uploads/customers/avatar/'.auth()->guard('customer')->user()->avatar)}}" alt="" />
              <h3>بيانات صحية</h3>
            </div>
          </div>
        
          <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start ">
            <button class="border-0 edit-file mt-md-4 mb-md-4 mb-3 mt-2"> 
              <a href=""><img src="https://cdn-icons-png.flaticon.com/512/3024/3024539.png" style= "margin:auto;" /></a>
            </button>
            <button type="submit" class="border-0 edit-file mt-md-4 mb-md-4 mb-3 mt-2 me-3">
              <a>   إعادة فلترة </a>
            </button>
            </div>
     
     
            <div class="col-12">
              <div class="patiant-table">
                <table >
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
                          @if($kid->kind == 1)
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
                                 <p><a href="{{ route('show-patient', $kid->id) }}"> <img src="https://www.citypng.com/public/uploads/preview/eye-view-watching-green-icon-download-png-11640343973hj2oufpggb.png" width="20px" height="20px" alt=""> عرض الملف </a></p>
                                 <form action="{{ route('delete-patient', $kid->id) }}"
                                         method="Post">
                                         @csrf
                                          @method('DELETE')
                                          <img src="https://icon-library.com/images/red-recycle-bin-icon/red-recycle-bin-icon-18.jpg" width="20px" height="20px" alt=""> 
                                          <button style="border:none; outline:0; background-color:white;" type="submit">
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

        $(".table-menu").click(function(){
        
        $(this).children('.table-menu-dropdown').slideToggle();
    });

    </script>
    @include('sweetalert::alert')
@include('sweetalert::validation-alert')
</body>
</html>