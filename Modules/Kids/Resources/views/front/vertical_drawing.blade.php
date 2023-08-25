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
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/front/assets/css/albss.css') }}" />
    <style>


.garph-color span:first-child {
  left: 0%;
}

.garph-color span:nth-child(2) {
  right: 25%;
}

.garph-color span:nth-child(3)  {
  right: 50%;
}

.garph-color span:nth-child(4) {
  right: 75%;
}
    </style>
</head>

<body class="patiant-file">

    @include('front.parts_auth.nav')
    @if (auth()->guard('customer')->check())
        @if (auth()->guard('customer')->user()->active == 0)
            @include('front.home.home_vrayfiy')
        @else
            <!--breadcrumb-->
            <nav aria-label="breadcrumb mt-5 mb-5">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">الرئيسية </a></li>
                        <li class="breadcrumb-item"><a href="javascript:history.back()"><i
                                    class="fa-solid fa-chevron-left"></i> التقييم Appels </a></li>
                        <li class="breadcrumb-item active" aria-current="page"> <i class="fa-solid fa-chevron-left"></i>
                            الرسم العمودي للتقييم
                        </li>
                    </ol>
                </div>
            </nav>


            <div class="wrapper">
                <div class="container">
                    <div class="dates row">



                    </div>
                    <div class="scroller-tab">

                        <div class="left"><i class="fa-solid fa-arrow-left"></i></div>
                        <div class="right"><i class="fa-solid fa-arrow-right"></i></div>
                        <ul class="nav nav-tabs ablis-tabs" role="tablist">
                            @foreach ($apps as $key => $val)
                                <li class="nav-item sessionsdate" data-id="{{ $val->id }}">
                                    <a class="nav-link {{ $val->name == $letr->name ? 'active' : '' }}"
                                        data-bs-toggle="tab"
                                        href="{{ url()->current() . "?app_Id=". $val->id}}">{{ $val->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="tab-content mt-5">
                        <div id="A" class="container tab-pane active tab-pane-ablis">
                            <br />
                            <div class="letter-container">
                                <div class="B letterHover">
                                    <div class="letter-title text-center">
                                        <h3>({{$letr->name}}) التعاون وفعالية المعزز</h3>
                                    </div>
                                    <div class="letter-graph d-flex mt-5">
                                        <div class="letter" style="width:100%; text-align: center;">
                                            @foreach ($letr->Appale_Nums as $value)
                                            <div class="d-flex justify-content-around">
                                                <div class="question-element" style="position: relative;">
                                                    <p>{{$value->name}}</p>

                                                    <div class="letter-question">
                                                        <p>{{$value->quest}}</p>
                                                    </div>
                                                </div>
                                                <div class="graph " style="width: 85%;">
                                                    @php
                                                    $span1 = '#fff';
                                                    $span2 = '#fff';
                                                    $span3 = '#fff';
                                                    $span4 = '#fff';
                                                    $count = 0;
                                                    @endphp

                                                        @foreach ($nums as $ke => $val)

                                                            @foreach ($val->Anssessions as $key => $vall)


                                                                @if ($vall->ques_id == $value->id)
                                                                @if ($vall->ans_id !== null)

                                                                    @php
                                                                    $count ++;
                                                                    @endphp
                                                                    @if ($count == 1)
                                                                    @php
                                                                    $span1 = $vall->Usersessions->Session->hex;
                                                                    @endphp
                                                                    @endif
                                                                    @if ($count == 2)
                                                                    @php
                                                                    $span2 = $vall->Usersessions->Session->hex;
                                                                    @endphp
                                                                    @endif
                                                                    @if ($count == 3)
                                                                    @php
                                                                    $span3 = $vall->Usersessions->Session->hex;
                                                                    @endphp
                                                                    @endif
                                                                    @if ($count == 4)
                                                                    @php
                                                                    $span4 = $vall->Usersessions->Session->hex;
                                                                    $count == 0;
                                                                    @endphp
                                                                    @endif
                                                                    <div class="garph-color">

                                                                        <span class="line " style="background-color: {{$span4}};"><div class="line-0"></div></span>
                                                                        <span class="line"   style="    background-color: {{$span2}};"  ><div class="line-0"></div></span>
                                                                        <span class="line " style="    background-color: {{$span3}};"><div class="line-0"></div></span>
                                                                        <span class="line" style="      background-color: {{$span1}};">
                                                                        <div class="line-0"></div>

                                                                        </span>
                                                                    </div>
                                                                @endif
                                                                @endif


                                                            @endforeach

                                                        @endforeach

                                                </div>
                                            </div>
                                            @endforeach


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
    <script src="{{ asset('dist/front/assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dist/front/assets') }}/js/jquery-3.6.3.js"></script>
    <script src="{{ asset('dist/front/assets') }}/js/app.js"></script>
    <script>
        $(".question-element").hover(function() {
            $(this).children(".letter-question").toggle();
        })
    </script>
    <script>
        $('.toggle-ques').on('click', function() {
            $(this).toggleClass("up");
            $(this).parent().parent().children('.ablis-answer').toggle();

        });
    </script>
    <script>
        let numbersQues = document.querySelectorAll(".numbers-ques");
        console.log(numbersQues)
        numbersQues.forEach((numberQues) => {

            numberQues.addEventListener("onmouseover", function() {
                console.log(numberQues);
            })
        })
    </script>


    <script>
        let numbersques = document.querySelectorAll(".numbers-ques");

        for (let i = 0; i < numbersques.length; i++) {

            for (let j = 0; j < numbersques[i].length; j++) {

                console.log(numbersques[i][j].childNodes);
            }
        }

        $('.textarea').on('input', function() {
            if ($(this).val().length > 0) {
                $(this).siblings().css("opacity", "0");
            } else {
                $(this).siblings().css("opacity", "1");
            }
        });

        // Get all elements with class "close"
    </script>
    <script type="text/javascript">


        $(document).on('click', ".sessionsdate", function() {
            var id = $(this).data('id');
            var link = "{{ url()->current() }}" + "?app_Id=" + id
            window.location.href = link
        });
        $(".close").click(function() {
            var id = $(this).data("id");
            var $ele = $(this).parent();
            $.ajax({
                url: "{{ route('Deletesession') }}",
                type: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    "session_id": id,
                    "id": '{{ $kid->id }}',

                },
                success: function() {

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
                        window.location.href = "{{ route('add-vertical', ['id' => $kid->id]) }}"
                    });
                }
            });

        });
    </script>
</body>

</html>
