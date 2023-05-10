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
    <!-- START:: FAVICON -->
    <link rel="shortcut icon" type="image/svg" href="{{asset('dist/front/assets/images/logo/favicon.png')}}">
    <!-- START:: STYLE LIBRARIES -->
 
    <!-- START:: BOOTSTRAP -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap/bootstrap-datatable.min.css')}}">
 <!-- Toastr -->
 <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.css')}}">
    <!-- START:: FANCY BOX -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/fancyBox/fancy.css')}}">
    <!-- START:: OWL CAROUSEL -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/owl-carousel/owl.theme.default.min.css')}}">
    <!-- START:: ANIMATE -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/animate/animate.css')}}">
    <!-- START:: FONT AWSOME -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/font-awsome/all.css')}}">

    <link rel="stylesheet" href="{{asset('dist/front/assets/js/selectize/select.css')}}">
    <link rel="stylesheet" href="{{asset('dist/front/assets/js/selectize/select2.min.css')}}">

    <!-- START:: CUSTOM STYLE -->
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/custom/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/custom/responsive.css')}}" />
    @yield('style')
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
        <!-- END:: LOADER PAGE -->
        @if(auth()->guard('customer')->check() || auth()->guard('provider')->check())

        @include('front.parts_auth.nav')

        @else

        @include('front.parts.nav')

        @endif

        @yield('content')
        @include('front.parts.footer')

    </main>
    <!-- START:: INCLUDING SCRIPTS -->

    <!-- START:: JQUERY -->
    <script src="https://cdn.socket.io/4.5.4/socket.io.min.js"></script>
    <script src="{{asset('dist/front/assets/js/jquery/jquery-3.4.1.min.js')}}"></script>
    <!-- START:: BOOTSTRAP -->
    <script src="{{asset('dist/front/assets/js/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <!-- START:: FANCY BOX -->
    <script src="{{asset('dist/front/assets/js/fancybox/fancy.js')}}"></script>
    <!-- START:: OWL CAROUSEL -->
    <script src="{{asset('dist/front/assets/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/custom/slick-slider.js')}}"></script>
    <!-- START:: FONT AWSOME -->
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('dist/front/assets/js/custom/audio-player.js')}}"></script>

<script src="{{asset('dist/front/assets/js/moment/moment.js')}}"></script>


        
<script src = "https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js" > </script> 
<script src = "https://www.gstatic.com/firebasejs/8.3.2/firebase-analytics.js" > </script>
<script src = "https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js" > </script>
<script src="{{asset('dist/js/firebase.js')}}"></script>
<script>
@if(CurrentAuth())

var noti_permission = Notification.permission
  const messaging = firebase.messaging();

  if(noti_permission !== 'granted') // default - denied - granted
  {
    toastr.error('من فضلك قُم بالسماح للإشعارات')
    Notification.requestPermission().then((permission) => {
      console.log(permission)
    });
  }else{
  messaging.requestPermission()
    .then(function () {
      return messaging.getToken()
    })
    .then(function(token) {
      
        if(token !== "{{ CurrentAuth()['user']->web_fcm_token }}")
        {
          $.get("{{url('update-fcm-token')}}" + '/' + token + '/' + '{{CurrentAuth()["type"]}}'
          , function (data, status) {
            console.log(data)
          })
        }


    })
    .catch(function (err) {
    console.log("Unable to get permission to notify.", err);
    });
  }


@endif 

  //edit section
$('.voices').on('click',function(){
    var id         = $(this).data('id')
    var file       = $(this).data('file')
    var image      = $(this).data('image')
    var title      = $(this).data('title')
    var avatar     = $(this).data('avatar')
    $(".title_v").html(title)
    var url =  '{{ url("uploads/podcasts/") }}/' + image
    $('.image_c').attr('src',url);

    var url1 =  '{{ url("uploads/providers/avatar/") }}/' + avatar
    $('.image_p').attr('src',url1);
    
    var url2 =  '{{ url("uploads/podcasts/file/") }}/' + file
    
    $('.voie').attr('data-src',url2);
   
    console.log(file.date.getSeconds());
    
});

</script>


<script type="text/javascript">
    
   
    $(document).on('click','.fa-bookmark', function(){
        var id = $(this).data("id");
        var data = {
            id : $(this).data("id"),
		    _token     : $("input[name='_token']").val()
	    }

		
		$.ajax(
		{
			url: "{{route('service_archive')}}",
			type: 'post',
			data: data,
			success: function (s,result){
        if ($(".book" + id).hasClass("bookmark-main")){
          $(".book" + id).removeClass( "bookmark-main" );
        }else{
          $(".book" + id).addClass( "bookmark-main" );
        }

        if ($(".books" + id).hasClass("bookmark-main")){
          $(".books" + id).removeClass( "bookmark-main" );
        }else{
          $(".books" + id).addClass( "bookmark-main" );
        }
                
               

              
			}
		});
	   
	});

  
</script>

    <!-- <script src="assets/js/font-awsome/all.js"></script> -->
    
    <!-- START:: ANIMATE -->
    <script src="{{asset('dist/front/assets/js/animate/wow.min.js')}}"></script>

    <script src="{{asset('dist/front/assets/js/bootstrap/bootstrap-datatable.min.js')}}"></script>

    <script src="{{asset('dist/front/assets/js/ck-editor/ckeditor.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/ck-editor/ck-editor.js')}}"></script>
    <script src="{{asset('vendor\realrashid\sweet-alert\resources\js\sweetalert.all.js')}}"></script>


    {{-- <script src="{{asset('dist/front/assets/js/emoji/jquery.emojipicker.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/emoji/jquery.emojis.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/social-share-kit/1.0.15/js/social-share-kit.min.js" integrity="sha512-u+G+A9V0BM4zKp6aN99fyfpqcU5YI2abpmhVLN0/br2xux0kVKatJCEFABjA80fYzOjCih4G+qkb5HSVMA1zOg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" integrity="sha512-foIijUdV0fR0Zew7vmw98E6mOWd9gkGWQBWaoA1EOFAx+pY+N8FmmtIYAVj64R98KeD2wzZh1aHK0JSpKmRH8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    {{-- validation --}}
    {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> --}}

    <!-- START:: CUSTOM JS -->
    @yield('script')
    <script src="{{asset('dist/front/assets/js/custom/main.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/play_sound/play_sound.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/society/socket-connection.js')}}"></script>
    <script src="{{asset('dist/front/assets/js/society/society.js')}}"></script>

    <script>
    @include('sweetalert::alert')
    </script>
    @include('sweetalert::validation-alert')

    @if(CurrentAuth())
      <script>
          Realtime("{{url('/')}}","{{CurrentAuth()['type']}}","{{CurrentAuth()['user']->id}}")
      </script>
    @endif

      <script>
        // var form = $(".valid" );
        // $( "button").click(function() {
        //   if(form.valid() == true)
        //   {
        //     $(this).text('')
        //     $(this).html(' <i class="fas fa-circle-notch fa-spin spiner" style="font-size: 25px"></i>')
        //   }
        // });
      </script>

    <!-- START::  -->
</body>

</html>