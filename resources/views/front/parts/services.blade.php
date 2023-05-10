<section class="services_section  wow animate fadeInUp">
    <div class="container">
        <div class="d-flex mb-5 align-items-center justify-content-between">
            <div class="title_section">
                <h3 class="mb-0">الـخدمات</h3>
            </div>
            <a href="{{ route('all_services') }}" class="show-all-btn btn-animation-2">
                عرض الكل
            </a>
        </div>

        <div class="row">
            <div class="col-md-12 wow animate fadeIn">
                <div id="serviceSlider" class="service-slider owl-carousel owl-loaded owl-drag">
                    @foreach($latest_services as $key => $value)

                        <!-- SINGLE SLIDE -->
                        <div class="item">
                            <div class="floating_info">
                            <i class="fas fa-bookmark" data-id="{{$value->id}}"></i>
                                <div class="pentagon-shape">
                                    <div class="price">
                                        <span>سعر</span>
                                        SAR{{$value->salary}}
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('detials_service',$value->id) }}">
                                <div class="image_slide_serv">
                                @if(count($value->ServiceImages) != 0)
                                    <img src="{{asset('uploads/services/'.$value->ServiceImages[0]->image)}}" alt="" width=""
                                        height="">
                                @endif
                                    
                                </div>

                                <div class="text_silde_serv">
                                    <h6> {{$value->title}} </h6>
                                    <p>
                                    {{Str::limit(strip_tags($value->subject),40)}}
                                    </p>
                                    <span> {{$value->Section->name}}  </span>
                                    <div class="rate">
                                        <ul>
                                            @if($value->rate == 0)
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                            @endif
                                            @if($value->rate >= 1 && $value->rate < 2)
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                            @endif
                                            @if($value->rate > 1 && $value->rate <= 2 && $value->rate < 3)
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                            @endif
                                            @if($value->rate > 2 && $value->rate <= 3 && $value->rate < 4)
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                            @endif
                                            @if($value->rate > 3 && $value->rate <= 4 && $value->rate < 5)
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star empty"></i></li>
                                            @endif
                                            @if($value->rate > 4 && $value->rate <= 5)
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            @endif
                                          
                                        </ul>
                                        <small>( {{ $value->rate }} )</small>
                                    </div>
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
    </div>
</section>