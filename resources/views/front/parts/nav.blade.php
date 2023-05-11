<header>
    <div class="container">
        <div class="row align-items-center bg-w">
            <!-- LOGO -->
            <div class="col-md-2">
                <div class="site_logo">
                    <img src="{{asset('dist/front/assets/images/logo/Group.png')}}" alt="Logo" />
                </div>
            </div>
            <!-- MENU -->
            <div class="col-md-7 d-flex align-items-center">
                <nav class="navbar">
                    <ul>
                        <li><a href="{{ url('/') }}"
                        @if(url()->current() == url('/'))
                        class="active"
                        @endif>الرئيسية</a></li>
                        <li><a href="{{ route('all_services') }}"
                        @if(url()->current() == route('all_services'))
                        class="active"
                        @endif>خدماتنا</a></li>
                        <li><a href="{{ route('all_articles') }}"
                        @if(url()->current() == route('all_articles'))
                        class="active"
                        @endif>المقالات</a></li>
                        <li><a href="{{ route('all_podcasts') }}"
                        @if(url()->current() == route('all_podcasts'))
                        class="active"
                        @endif>البودكاست</a></li>
                        <li><a href="{{ route('all_videos') }}"
                        @if(url()->current() == route('all_videos'))
                        class="active"
                        @endif>الفيديوهات</a></li>
                        <li><a href="{{ route('consulting_provider') }}"
                        @if(url()->current() == route('consulting_provider'))
                        class="active"
                        @endif>الاستشارات</a></li>

                        <li><a href="{{ route('all_apps') }}" @if(url()->current() == route('all_apps'))
                                class="active"
                                @endif>متجر التطبيقات</a></li>
                    </ul>
                </nav>
            </div>
            <!-- ACTIONS -->
            <div class="col-md-3 d-flex align-items-center">
                <ul class="actions_header">
                   
                    <li>
                        <button type="button" class="search_btn" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="بحث">
                            <i class="fas fa-search"></i>
                        </button>
                    </li>

                    <li>
                        <a href="{{ route('change_type') }}" class="btn-animation-2">
                            إشتراك
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('change_type_login') }}" class="btn-animation-1">
                            تسجيل دخول
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- START:: HEADER MOBILE -->
    <div class="mobile_header">
        <div class="logo_mobile">
            <img src="{{asset('dist/front/assets/images/logo/Group.png')}}" width="" height="" alt="">
        </div>
        <div class="btn_menu">
            <button type="button" class="toggleClassBtn">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>
            <button type="button" class="search_btn" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="بحث">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <nav class="navbar side_menu_mobile main_menu">
        <ul>
            <li><a href="{{ url('/') }}"
            @if(url()->current() == url('/'))
            class="active"
            @endif>الرئيسية</a></li>
            <li><a href="{{ route('all_services') }}"
            @if(url()->current() == route('all_services'))
            class="active"
            @endif>خدماتنا</a></li>
            <li><a href="{{ route('all_articles') }}"
            @if(url()->current() == route('all_articles'))
            class="active"
            @endif>المقالات</a></li>
            <li><a href="{{ route('all_podcasts') }}"
            @if(url()->current() == route('all_podcasts'))
            class="active"
            @endif>البودكاست</a></li>
            <li><a href="{{ route('all_videos') }}"
            @if(url()->current() == route('all_videos'))
            class="active"
            @endif>الفيديوهات</a></li>
            <li><a href="{{ route('consulting_provider') }}"
            @if(url()->current() == route('consulting_provider'))
            class="active"
            @endif>الاستشارات</a></li>

            <li><a href="{{ route('all_apps') }}"
            @if(url()->current() == route('all_apps'))
            class="active"
            @endif>متجر التطبيقات</a></li>
        </ul>
        <div class="actions_header">
            <a href="{{ route('change_type') }}" class="btn-animation-2">
                إشتراك
            </a>
            <a href="{{ route('change_type_login') }}" class="btn-animation-1">
                تسجيل دخول
            </a>
        </div>
    </nav>
    <div class="overLay_side_menu"> </div>

    <!-- END:: HEADER MOBILE -->
</header>
<div class="search_area">
    <form class="container" action="{{ route('search_services') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="custom-form-group">
            <input type="search" name="search" class="form-control" id="subscription" placeholder="ابحث عن موضوع....... ">
            <button type="submit" class="btn-animation-1">بحث</button>
        </div>
    </form>
</div>