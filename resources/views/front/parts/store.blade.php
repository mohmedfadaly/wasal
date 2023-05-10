<section class="services_section bg-gray wow animate fadeInUp">
    <div class="container">
        <div class="d-flex mb-5 align-items-center justify-content-between">
            <div class="title_section">
                <h3 class="mb-0">متجر التطبيقات</h3>
            </div>
            <a href="{{ route('all_apps') }}" class="show-all-btn btn-animation-2">
                عرض الكل
            </a>
        </div>
        <div class="row">
            <div class="col-md-12 wow animate fadeIn">
                <div id="serviceSlider2" class="service-slider owl-carousel owl-loaded owl-drag">

                    @foreach($latest_apps as $key => $value)

                        <!-- SINGLE SLIDE -->
                        <div class="item">
                            <div class="floating_info">
                                <div class="pentagon-shape">
                                    <div class="price">
                                        <span>سعر</span>
                                        SAR{{$value->price}}
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('detials_app',$value->id) }}">
                                <div class="image_slide_serv">

                                    @if($value->image != null)
                                    <img src="{{ asset('uploads/app_images/card/'.$value->image) }}" alt="" width=""  height="">
                                    @else
                                        @if(count($value->AppImages) != 0)
                                            <img src="{{asset('uploads/app_images/'.$value->AppImages[0]->image)}}" alt="" width=""
                                                height="">
                                        @endif

                                    @endif
                                    
                                </div>
                                <div class="text_silde_serv">
                                    <h6> {{$value->title}} </h6>
                                    <p>
                                    {{Str::limit(strip_tags($value->subject),40)}}
                                    </p>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>