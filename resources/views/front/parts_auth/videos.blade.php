    <!-- START:: VIDEOS SECTION -->
    <section class="videos_section bg-gray wow animate fadeInUp">
            <div class="container">
                <div class="d-flex mb-5 align-items-center justify-content-between">
                    <div class="title_section">
                        <h3 class="mb-0">مـقاطع الفيديو</h3>
                    </div>
                    <a href="{{ route('all_videos') }}" class="show-all-btn btn-animation-2">
                        عرض الكل
                    </a>
                </div>
                <div class="row align-items-center">
                    <div id="videosSlider" class="videos-slider owl-carousel owl-loaded owl-drag">
                        @foreach($latest_videos as $key => $value)

                            <!-- SINGLE SLIDE -->
                            <div class="item">
                            <a href="{{$value->url}}"  target="_blank">
                                <div class="image_slide_video">
                                    <img src="{{asset('uploads/videos/'.$value->image)}}" alt="" width="" height="">
                                </div>

                                <div class="text_silde_video">
                                    <i class="fab fa-youtube"></i>

                                    <h6>{{$value->title}}  </h6>

                                    <div class="author">
                                        <img src="{{asset('uploads/providers/avatar/'.$value->Provider->avatar)}}" alt="Admin" width="" height="">
                                        <text>
                                        {{$value->Provider->name_f}} {{$value->Provider->name_l}}
                                        </text>
                                    </div>
                                </div>

                            </a>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </section>
        <!-- END:: VIDEOS SECTION -->