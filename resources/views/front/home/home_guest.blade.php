
<!-- END:: HEADER -->

<!-- START:: SLIDER HERO SECTION -->
<section class="hero_section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 wow animate fadeInRight">
                <div class="text-hero-section">
                    <h1 class="text-gradient">سلسلة تيكـ</h1>
                    <h2>تضم جميع المسوقين العرب </h2>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة , لقد تم توليد هذا النص من مولد النص
                        العربي هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة , </p>
                    <a href="{{ route('change_type') }}" class="btn-animation-1">
                        انظم الى سلسله الأن
                    </a>
                </div>
            </div>
            <div class="col-md-7 wow animate fadeInLeft">
                <div class="image-hero-section">
                    <img src="{{asset('dist/front/assets/images/all/hero_section.svg')}}" width="" height="" alt="hero_section">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END:: SLIDER HERO SECTION -->


<!-- START:: HOW TO STARTED SECTION -->
<section class="how_to_started_section bg-gray wow animate fadeInUp">
    <div class="container">
        <div class="title_section">
            <h3>كـيف تبدأ رحلتك مع سلسله تيكـ</h3>
        </div>
        <div class="row">
            <!-- SINGLE CARD -->
            <div class="col-md-3 wow animate fadeIn">

                <div class="card card-how-to">
                    <div class="icon">
                        <img src="{{asset('dist/front/assets/images/icons/login.svg')}}" alt="Subscribe" height="" width="">
                        <img src="{{asset('dist/front/assets/images/icons/login.svg')}}" alt="Subscribe" class="hide-icon" height=""
                            width="">
                    </div>
                    <div class="text">
                        <h5>إشترك!</h5>
                        <p>
                            سجل الدخول في الموقع والتحق بكوكبة من ألمع المسوقين العرب
                        </p>
                    </div>
                </div>

            </div>
            <!-- SINGLE CARD -->
            <div class="col-md-3 wow animate fadeIn">

                <div class="card card-how-to">
                    <div class="icon">
                        <img src="{{asset('dist/front/assets/images/icons/search.svg')}}" alt="Subscribe" height="" width="">
                        <img src="{{asset('dist/front/assets/images/icons/search.svg')}}" alt="Subscribe" class="hide-icon" height=""
                            width="">
                    </div>
                    <div class="text">
                        <h5>عرض الخدمات</h5>
                        <p>
                            ابحث عن الخدمة التي تحتاجها باستخدام مربع البحث في الأعلى أو عبر التصنيفات.
                        </p>
                    </div>
                </div>

            </div>
            <!-- SINGLE CARD -->
            <div class="col-md-3 wow animate fadeIn">

                <div class="card card-how-to">
                    <div class="icon">
                        <img src="{{asset('dist/front/assets/images/icons/receive.svg')}}" alt="Subscribe" height="" width="">
                        <img src="{{asset('dist/front/assets/images/icons/receive.svg')}}" alt="Subscribe" class="hide-icon" height=""
                            width="">
                    </div>
                    <div class="text">
                        <h5>اطلب الخدمة</h5>
                        <p>
                            راجع وصف الخدمة وتقييمات المشترين ثم اطلبها
                        </p>
                    </div>
                </div>

            </div>
            <!-- SINGLE CARD -->
            <div class="col-md-3 wow animate fadeIn">

                <div class="card card-how-to">
                    <div class="icon">
                        <img src="{{asset('dist/front/assets/images/icons/service.svg')}}" alt="Subscribe" height="" width="">
                        <img src="{{asset('dist/front/assets/images/icons/service.svg')}}" alt="Subscribe" class="hide-icon" height=""
                            width="">
                    </div>
                    <div class="text">
                        <h5>استلم خدمتك</h5>
                        <p>
                            تواصل مباشرة داخل موقع حتى استلام طلبك كاملاً.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- END:: HOW TO STARTED SECTION -->

<!-- START:: SERVICES SECTION -->
@include('front.parts.services')

<!-- END:: SERVICES SECTION -->

<!-- START:: SERVICES SECTION -->
@include('front.parts.store')

<!-- END:: SERVICES SECTION -->

<!-- START:: FIELDS SERVICES SECTION -->
@include('front.parts.sections')

<!-- END:: FIELDS SERVICES SECTION -->

<!-- START:: BLOGS SECTION -->
@include('front.parts.articls')

<!-- END:: BLOGS SECTION -->

<!-- START:: VIDEOS SECTION -->
@include('front.parts.videos')

<!-- END:: VIDEOS SECTION -->

<!-- START:: MARKETERS SECTION -->
@include('front.parts.providers')

<!-- END:: MARKETERS SECTION -->

<!-- START:: BROADCAST SECTION -->
@include('front.parts.bodcasts')

<!-- END:: BROADCAST SECTION -->

<!-- START:: STATISTICS SECTION -->
<section class="statistics_section">
    <div class="container">
        <div class="row" id="counter">
            <div class="col-6 col-sm-3 col-md-3">
                <div class="single-statistic">
                    <div class="d-flex justify-content-center align-items-center">
                        <h4 class="text-gradient">+</h4>
                        <div class="counter-value text-gradient" data-count="{{count($providers)}}">0</div>
                    </div>
                    <h3>عدد المسوقين</h3>
                </div>
            </div>
            <div class="col-6 col-sm-3 col-md-3">
                <div class="single-statistic">
                    <div class="d-flex justify-content-center align-items-center">
                        <h4 class="text-gradient">+</h4>
                        <div class="counter-value text-gradient" data-count="{{count($customers)}}">0</div>
                    </div>
                    <h3>عملاء سعداء</h3>
                </div>
            </div>
            <div class="col-6 col-sm-3 col-md-3">
                <div class="single-statistic">
                    <div class="d-flex justify-content-center align-items-center">
                        <h4 class="text-gradient">+</h4>
                        <div class="counter-value text-gradient" data-count="{{count($articles)}}">0</div>
                    </div>
                    <h3>عدد المقالات</h3>
                </div>
            </div>
            <div class="col-6 col-sm-3 col-md-3">
                <div class="single-statistic">
                    <div class="d-flex justify-content-center align-items-center">
                        <h4 class="text-gradient">+</h4>
                        <div class="counter-value text-gradient" data-count="{{count($services)}}">0</div>
                    </div>
                    <h3>خدمات متاحة</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END:: STATISTICS SECTION -->