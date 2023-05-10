<section class="blog_section wow animate fadeInUp">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="d-flex mb-5 align-items-center justify-content-between">
                    <div class="title_section">
                        <h3 class="m-0 mb-5">الـمقالات</h3>
                        <p>
                            يقدم المسوقين على الموقع مجموعة متنوعة من المقالات الاحترافية التي تساعد على تطوير اعمالك ونمو مشاريعك
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="blogSlider" class="blog-slider owl-carousel owl-loaded owl-drag">
                    @foreach($latest_articless as $key => $value)

                        <!-- SINGLE SLIDE -->
                        <div class="item">
                            <a href="{{ route('detials_article',$value->id) }}">
                                <div class="image_slide_blog">
                                    <img src="{{asset('uploads/articles/'.$value->image)}}" alt="" width="" height="">
                                </div>

                                <div class="text_silde_blog">
                                    <h6>
                                        
                                    {{$value->title}}

                                    </h6>
                                    <p>
                                    {{Str::limit(strip_tags($value->subject),40)}}
                                    </p>
                                    <span>{{$value->Section->name}}</span>
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