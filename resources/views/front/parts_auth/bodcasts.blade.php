  <!-- START:: BROADCAST SECTION -->
  <section class="broadcast_section broadcast_section_no_bg">
            <div class="container">
                <div class="d-flex mb-5 align-items-center justify-content-between">
                    <div class="title_section">
                        <h3 class="mb-0">البودكاست</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 wow animate fadeIn">
                        <ul class="nav nav-tabs nav-tabs-custom" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="best-bodcast-tab" data-bs-toggle="tab"
                                    data-bs-target="#best-bodcast" type="button" role="tab" aria-controls="best-bodcast"
                                    aria-selected="true">أفضل البودكاست </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="latest-bodcast-tab" data-bs-toggle="tab"
                                    data-bs-target="#latest-bodcast" type="button" role="tab"
                                    aria-controls="latest-bodcast" aria-selected="false">أحدث البودكاست</button>
                            </li>
                           
                            <li class="nav-item">
                                <a href="{{ route('all_podcasts') }}" class="show-all-btn btn-animation-2">
                                    عرض الكل
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="best-bodcast" role="tabpanel"
                                aria-labelledby="best-bodcast-tab">
                                <div class="broadcast-slider mt-5">
                                    <div class="row">
                                        @foreach($view_podcasts as $key => $value)
                                        @include('podcasts::front.parts.card_podcast')

                                        @endforeach

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="latest-bodcast" role="tabpanel"
                                aria-labelledby="latest-bodcast-tab">
                                <div class="broadcast-slider mt-5">
                                    <div class="row">
                                        @foreach($latest_podcasts as $key => $value)
                                        @include('podcasts::front.parts.card_podcast')

                                        @endforeach

                                    </div>
                                </div>

                            </div>
                         
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <!-- END:: BROADCAST SECTION -->



         <!-- START:: BOADCAST -->
         <div class="simple-audio-player" id="simp" data-config='{"shide_top":false,"shide_btm":true,"auto_load":false}'>
            <div class="simp-playlist container">
                <ul>
                   
                    <li>
                        <div class="text">
                            <span class="simp-source voie" data-src="">

                                <div class="right-part">
                                    <small class="title_v"></small>
                                    <span class="simp-desc">
                                        <img class="image_p" src="" width="25" height="25" />
                                       
                                    </span>
                                </div>

                                <div class="simp-cover">
                                    <img class="image_c" src="" width="50" height="50" />
                                </div>
                            </span>
                        </div>
                    </li>
                    @foreach($podcasts as $value)
                    <li>
                        <div class="text">
                            <span class="simp-source" data-src="{{asset('uploads/podcasts/file/'.$value->file)}}">

                                <div class="right-part">
                                    <small>{{$value->title}}</small>
                                    <span class="simp-desc">
                                        <img src="{{asset('uploads/providers/avatar/'.$value->Provider->avatar)}}" width="25" height="25" />
                                        {{$value->Provider->name_f}} {{$value->Provider->name_l}}
                                    </span>
                                </div>

                                <div class="simp-cover">
                                    <img src="{{asset('uploads/podcasts/'.$value->image)}}" width="50" height="50" />
                                </div>
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <!-- END:: BOADCAST -->