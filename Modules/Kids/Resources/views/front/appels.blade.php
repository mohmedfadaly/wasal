<!DOCTYPE html>
<html lang="ar">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>التقيمات</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/front/assets/css/albs.css')}}" />
    <style>
        .btn:hover {
  border: 2px solid #834e9a;
  color: #834e9a;
  background-color: #fff;
}
 .btn {
  padding: 12px 24px;
  background: #834e9a;
    background-color: rgb(131, 78, 154);
  border-radius: 8px;
  color: #fff;
  transition: 0.5s ease-in-out;

}
    </style>
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
          <li class="breadcrumb-item"><a href="#">الرئيسية </a></li>
          <li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-chevron-left"></i> بيانات المريض </li>
        </ol>
      </div>
    </nav>

    <div class="wrapper">
        <div class="container">
          <div class="row align-items-center ">

            <div class="col-md-6 ">
              <div class="form-title mt-4 mb-4 ">
                <img src="{{asset('dist/front/assets/images/statistical-graphic 1.png')}}" />
                <h3> تقييم ABLLS</h3>
              </div>
            </div>

            <div class="col-md-6 d-flex align-items-center justify-content-md-end justify-content-start ">
              <button class="border-0 edit-file mt-md-4 mb-md-4 mb-3 mt-2">
                <a class="addnew"> <img src="{{asset('dist/front/assets/images/plus.png')}}" alt=""> إضافة تقييم جديد </a>
              </button>
              <button type="submit" class="border-0 edit-file mt-md-4 mb-md-4 mb-3 mt-2 me-3">
                <a> <img src="{{asset('dist/front/assets/images/paint.png')}}"> الرسم العمودي للتقييم </a>
              </button>
            </div>


            <div class="col-12">
              <div class="tab-form">
                <form action="{{route('addappels',$kid->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="dates row">
                    @foreach ($sessions as $key =>  $val)
                        <div  class=" date  col-lg-2 col-md-3 col-6" style="background-color: {{$val->Session->hex}};">
                            @if ($loop->last)
                            <div class="close" data-id="{{$val->Session->id}}">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                            @endif

                            <p class="sessionsdate" data-id="{{$val->Session->id}}"  style="cursor: pointer;font-size: 15px;"><span> تقييم بتاريخ</span> {{date('Y/m/d', strtotime($val->created_at))}} </p>
                        </div>
                    @endforeach


                  </div>
                  <div class="scroller-tab">

                    <div class="left"><i class="fa-solid fa-arrow-left"></i></div>
                    <div class="right"><i class="fa-solid fa-arrow-right"></i></div>
                    <ul class="nav nav-tabs ablis-tabs" role="tablist">
                    <input type="hidden" name="Session" value="{{$Usersessions->Session->id}}">


                        @foreach ($Usersessions->Appsessions as $key => $val)
                            <li class="nav-item">
                                <a class="nav-link {{$val->Appale->name == 'A' ? 'active' : ''}}" data-bs-toggle="tab" href="#{{$val->Appale->name}}">{{$val->Appale->name}}</a>
                            </li>
                        @endforeach


                    </ul>
                  </div>
                  <!-- Tab panes -->
                  <div class="tab-content mt-5">
                    @foreach ($Usersessions->Appsessions as $key => $val)

                            <div id="{{$val->Appale->name}}" class="container tab-pane {{$val->Appale->name == 'A' ? 'active' : 'fade'}} tab-pane-ablis">
                                <br />
                                <div class="ablis-title">
                                <h3> ({{$val->Appale->name}}) التعاون وفعالية المعزز</h3>
                                </div>
                                <div class="ablis-content-wrapper">
                                @foreach ($val->Anssessions as $kee => $num)
                                <input type="hidden" name="ques[{{$num->Appale_Nums->id}}]" value="{{$num->Appale_Nums->id}}">
                                <input type="hidden" name="ans[{{$num->Appale_Nums->id}}]" value="">

                                <div class="ablis-content">
                                    <div class="ablis-question">
                                    <div class="letter-ques">
                                        <P>{{$num->Appale_Nums->name}}</P>
                                    </div>
                                    <div class="question">
                                        <p>{{$num->Appale_Nums->quest}}</p>
                                    </div>

                                    <div class="c-rating-wrapper numbers-ques">

                                        @foreach ($num->Appale_Nums->Appale_Ques as $ke => $quest)

                                        @if ($num->ans_old_id >= $quest->id)
                                            <span class="stars" style="background-color: {{$num->hex_old}};" data-quest="{{$num->Appale_Nums->id}}" data-id="{{$quest->id}}">{{$ke + 1}}</span>

                                        @else
                                            <span class="star" style="background-color: {{$num->ans_id >= $quest->id ? $Usersessions->Session->hex : ''}};" data-quest="{{$num->Appale_Nums->id}}" data-id="{{$quest->id}}">{{$ke + 1}}</span>

                                        @endif

                                        @endforeach

                                    </div>


                                    <div class="toggle-ques">
                                        <img src="{{asset('dist/front/assets/images/arrow.png')}}" class="toggle-img" alt="">
                                    </div>
                                    </div>
                                    <div class="ablis-answer">

                                        @foreach ($num->Appale_Nums->Appale_Ques as $ke => $quest)
                                            <div class="answer">
                                                <div class="ans-num">
                                                <p>{{$ke + 1}}</p>
                                                </div>
                                                <div class="answer-text">
                                                <p>{{$quest->name}}</p>
                                                </div>
                                            </div>

                                        @endforeach


                                    </div>
                                </div>
                                @endforeach

                                </div>
                                <div class="" style="position:relative;">
                                <label class="placeholder-teaxtarea">تقرير التقييم</label>
                                <textarea name="" id="" class="textarea">

                                </textarea>
                                </div>

                                <input type="text" plceholder="تقرير التقييم" name="" id="" class="
                                specialist" placeholder="اسم الأخصائي">
                            </div>

                    @endforeach

                    <div class="text-center">
                        <button type="submit" class="btn mt-5 w-50 m-auto">حفظ</button>
                    </div>
                  </div>

              </div>


              </form>
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
          if (tabsList.scrollLeft <= 20) {
            left.style.display = "flex";
          } else {
            left.style.display = "none";
          }
          let maxScrollValue = tabsList.scrollWidth - tabsList.clientWidth - 20;

          if (tabsList.scrollLeft <= maxScrollValue) {

            right.style.display = "flex";
          } else {
            console.log("green");
            right.style.display = "none";
          }
        }
        left.addEventListener("click", () => {

          tabsList.scrollLeft -= 200;
          manageIcons();
        })


        right.addEventListener("click", () => {

          tabsList.scrollLeft += 200;
          manageIcons();
        })


        tabsList.addEventListener("scroll", manageIcons)
      </script>
      <script>
        let numbersques = document.querySelectorAll(".numbers-ques");

          for(let i = 0 ; i<numbersques.length ; i++ ){

            for(let j = 0 ; j<numbersques[i].length ; j++){

              console.log(numbersques[i][j].childNodes);
            }
          }

          $('.textarea').on('input', function(){
            if ( $(this).val().length > 0 ) {
                $(this).siblings().css("opacity", "0");
            } else {
                $(this).siblings().css("opacity", "1");
              }
            });
        $('.star').on('click', function(){
            var id  = $(this).data('id');
            var quest  = $(this).data('quest');

            $(`input[name='ans[${quest}]']`).val(id);

            console.log($(`input[name='ans[${quest}]']`).val());

            // Get the data-id of the clicked element
            var clickedId = $(this).data('id');

            // Loop through the siblings and compare data-id values
            $(this).siblings('.star').each(function() {
                var siblingId = $(this).data('id');

                // Check if the data-id of the sibling is less than the clicked element's data-id
                if (siblingId < clickedId) {
                    $(this).css("background-color", "{{$Usersessions->Session->hex}}");
                } else {
                    // Reset the background color for siblings with greater or equal data-id values
                    $(this).css("background-color", "initial");
                }
            });

            // Change the background color of the clicked element
            $(this).css("background-color", "{{$Usersessions->Session->hex}}");
        });
        // Get all elements with class "close"


      </script>
       <script type="text/javascript">

        $(document).on('click',".addnew", function(){

            var link = "{{url()->current()}}" + "?session_Id={{$count_session+1}}"
            window.location.href = link
        });

        $(document).on('click',".sessionsdate", function(){
            var id = $(this).data('id');
            var link = "{{url()->current()}}" + "?session_Id=" + id
            window.location.href = link
        });
        $(".close").click(function(){
		var id = $(this).data("id");
		var $ele = $(this).parent();
		$.ajax(
		{
			url: "{{route('Deletesession')}}",
			type: 'post',
			data: {
			  _token: '{{ csrf_token() }}',
				"session_id": id,
                "id": '{{$kid->id}}',

			},
			success: function (){

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
                    window.location.href = "{{route('add-appels',$kid->id)}}"
                });
			}
		});

	});
    </script>
    @include('sweetalert::alert')
@include('sweetalert::validation-alert')
  </body>
</html>
