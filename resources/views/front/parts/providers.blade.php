<section class="marketers_section">
    <div class="container">
        <div class="d-flex mb-5 align-items-center justify-content-between">
            <div class="title_section">
                <h3 class="mb-0">الـمسوقين</h3>
            </div>
        </div>


        <div class="row align-items-center">
            <div id="marketersSlider" class="marketers-slider owl-carousel owl-loaded owl-drag">
                @foreach($providers as $key => $value)

                    <div class="item">
                        <div class="image-marketer">
                            <img src="{{asset('uploads/providers/avatar/'.$value->avatar)}}" alt="" width="" height="">
                        </div>
                        <div class="text-marketer">
                            <h3> {{$value->name_f}} {{$value->name_l}} </h3>
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
                                <small>( {{$value->rate}} )</small>
                            </div>
                            <a href="{{ route('provider_profile',$value->id) }}" class="btn-animation-1">
                                <img src="{{asset('uploads/providers/avatar/'.$value->avatar)}}" alt="" width="" height="">
                                الملف الشخصي
                            </a>
                        </div>
                    </div>
                @endforeach
 
            </div>
        </div>
    </div>
</section>