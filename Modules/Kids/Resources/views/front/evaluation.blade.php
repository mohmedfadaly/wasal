<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evalution</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
     <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/family-form.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/table-style.css')}}" />
  </head>
  <body class="child">

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
          <li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-chevron-left"></i> تقيم </li>
        </ol>
      </div>
    </nav>

    <!--user_dashboard-->
    <div class="user-dashboard-details">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <a class="dashboard-card d-block" href="{{route('add-appels',$kid->id)}}">
              <div class="dashboard-card-details">
                <div class="dashboard-img">
                  <img src="{{asset('dist/front/assets/images/evaluation 1.png')}}" alt="" />
                </div>
                <div class="dashboard-title">
                  <h5>  تقييم ABLLS </h5>
                </div>
              </div>
            </a>
          </div>
          <div class="col-md-6">
            <a class="dashboard-card d-block">
              <div class="dashboard-card-details">
                <div class="dashboard-img">
                  <img src="{{asset('dist/front/assets/images/rating (1) 1.png')}}" alt="" />
                </div>
                <div class="dashboard-title">
                  <h5>  تقييم المفضلات </h5>
                </div>
              </div>
            </a>
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
            console.log('a7a');
        $(this).children('.table-menu-dropdown').slideToggle();
    });

    </script>
    @include('sweetalert::alert')
@include('sweetalert::validation-alert')
  </body>
</html>
