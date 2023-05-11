<!-- START:: HEADER -->
<header>
            <div class="container">
                <div class="row align-items-center bg-w">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="site_logo">
                            <button class="sideMenuBtn" type="button">
                                <i class="far fa-stream"></i>
                            </button>
                            <img src="{{asset('dist/front/assets/images/logo/Group.png')}}" alt="Logo" />
                        </div>
                    </div>
                    <!-- MENU -->
                    <div class="col-md-7 d-flex align-items-center">
                        <nav class="navbar">
                            <ul>
                                <li><a href="{{ url('/') }}" @if(url()->current() == url('/'))
                                class="active"
                                @endif>الرئيسية</a></li>
                                <li><a href="{{ route('all_services') }}"  @if(url()->current() == route('all_services'))
                                class="active"
                                @endif>خدماتنا</a></li>
                                <li><a href="{{ route('all_articles') }}" @if(url()->current() == route('all_articles'))
                                class="active"
                                @endif>المقالات</a></li>
                                <li><a href="{{ route('all_podcasts') }}" @if(url()->current() == route('all_podcasts'))
                                class="active"
                                @endif>البودكاست</a></li>
                                <li><a href="{{ route('all_videos') }}" @if(url()->current() == route('all_videos'))
                                class="active"
                                @endif>الفيديوهات</a></li>
                                <li><a href="{{ route('consulting_provider') }}" @if(url()->current() == route('consulting_provider'))
                                class="active"
                                @endif>الاستشارات</a></li>

                                <li><a href="{{ route('all_apps') }}" @if(url()->current() == route('all_apps'))
                                class="active"
                                @endif>متجر التطبيقات</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- ACTIONS -->
                    <div class="col-md-2 d-flex align-items-center">
                        <ul class="actions_header">
                            <li>
                                <button type="button" class="search_btn" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="بحث">
                                    <i class="fas fa-search search-2"></i>
                                </button>
                            </li>
                            @if(auth()->guard('customer')->check() || auth()->guard('provider')->check())

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle-custom" role="button" id="messages"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-notifications">

                                        <ul>
                                        @if(CurrentAuth())
                                            @foreach(CurrentAuth()['user']->MassagePROwos as $key => $value)
                                            <li>
                                                <a class="dropdown-item" href="{{ route('get_chat_massages',$value->chat_id) }}">
                                                    <div class="image_notification">
                                                        <img src="{{asset('uploads/' . CurrentAuth()['path'] . '/avatar/'.$value->oneable->avatar)}}" alt="" width="" height="">
                                                    </div>
                                                    <div class="text_notification">
                                                        <p>
                                                        {{$value->massage}}
                                                        </p>
                                                        <span>
                                                            <i class="fas fa-clock"></i>
                                                            {{Date::parse($value->created_at)->diffForHumans()}}
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            @endforeach

                                            @if(count(CurrentAuth()['user']->MassagePROwos) == 0)
                                                <div class="empty-message">
                                                    <i class="fas fa-envelope"></i>
                                                    عفوا لا يوجد رسائل
                                                </div>
                                            @endif

                                     
                                        @endif
                                        </ul>
                                        <div class="list_footer">
                                            <a href="{{ route('get_all_massages') }}">
                                                <i class="fas fa-envelope"></i>
                                                جميع الرسائل
                                            </a>
                                        </div>
                                    </div>
                                </li>


                            @endif
                            @if(CurrentAuth()['type'] == 'provider')

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle-custom" role="button" id="notification"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-bell"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-notifications">

                                        <ul>
                                        @foreach(CurrentAuth()['user']->Notifications as $key => $value)
                                            <li>
                                                <a class="dropdown-item"
                                                @if($value->typeable_type == 'Modules\Services\Entities\Service')
                                                href="{{ route('detials_service',$value->typeable_id) }}"
                                                @elseif($value->typeable_type == 'Modules\Articles\Entities\Article')
                                                href="{{ route('detials_article',$value->typeable_id) }}"
                                                @elseif($value->typeable_type == 'Modules\Podcasts\Entities\Podcast')
                                                href="#"
                                                @elseif($value->typeable_type == 'Modules\Videos\Entities\Video')
                                                href="{{ $value->typeable->url }}"
                                                @elseif($value->typeable_type == 'Modules\Consulting\Entities\Consultations')
                                                href="{{ route('date_consultaions',$value->typeable_id) }}"
                                                @endif
                                                >
                                                    <div class="image_notification">
                                                        <img src="{{asset('uploads/providers/avatar/'.$value->Provider->avatar)}}" alt="" width="" height="">
                                                    </div>
                                                    <div class="text_notification">
                                                        <p>
                                                        {{$value->notification}}

                                                        </p>
                                                        <span>
                                                            <i class="fas fa-clock"></i>
                                                            {{Date::parse($value->created_at)->diffForHumans()}}
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            @endforeach
                                            
                                            @if(count(CurrentAuth()['user']->Notifications) == 0)
                                                <div class="empty-message">
                                                    <i class="fas fa-bell"></i>
                                                    عفوا لا يوجد إشعارات
                                                </div>
                                            @endif

                                        </ul>
                                        <div class="list_footer">
                                            <a href="{{ route('all_notfications') }}">
                                                <i class="fas fa-bell"></i>
                                                جميع الإشعارات
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endif

                            @if(CurrentAuth())
                                <li>
                                    <a href="{{ route('all_archive_services') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Book Mark">
                                        <i class="fas fa-bookmark"></i>
                                    </a>
                                </li>
                            @endif

                            <li>
                            @if(auth()->guard('customer')->check() || auth()->guard('provider')->check())

                                @if(auth()->guard('customer')->check())
                                    <a href="{{ route('profile_customer') }}" data-bs-toggle="tooltip" class="profile" data-bs-placement="bottom"
                                        title="الملف الشخصي">
                                        <img src="{{asset('uploads/customers/avatar/'.auth()->guard('customer')->user()->avatar)}}" alt="" height="" width="" />
                                    </a>
                                @elseif( auth()->guard('provider')->check())
                                    <a href="{{ route('provider_profile',auth()->guard('provider')->user()->id) }}" data-bs-toggle="tooltip" class="profile" data-bs-placement="bottom"
                                        title="الملف الشخصي">
                                        <img src="{{asset('uploads/providers/avatar/'.auth()->guard('provider')->user()->avatar)}}" alt="" height="" width="" />
                                    </a>
                                @endif
                               
                            @endif
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
                    <li><a href="{{ url('/') }}"@if(url()->current() == url('/'))
                    class="active"
                    @endif>الرئيسية</a></li>
                    <li><a href="{{ route('all_services') }}"  @if(url()->current() == route('all_services'))
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
                
            </nav>
            <div class="overLay_side_menu"> </div>


            <div class="search_side_bar">
            <div id="searchHeader" class="form-group">
                    <input type="text" id="searchInput" class="form-control" placeholder="ابحث عن ... " />
                </div>
               
                <ul id="results">
                @if(auth()->guard('provider')->check())
                    <li>
                        <a href="{{ route('add_services') }}" class="title_search">انشاء خدمه</a>
                    </li>
                    <li>
                        <a href="{{ route('add_articles') }}" class="title_search">انشاء مقال</a>
                    </li>
                    <li>
                        <a href="{{ route('add_videos') }}" class="title_search">انشاء فيديو</a>
                    </li>
                    <li>
                        <a href="{{ route('add_podcasts') }}" class="title_search">انشاء بودكاست</a>
                    </li>
                    <li>
                        <a href="{{ route('consulting_provider') }}" class="title_search">استشاراتي</a>
                    </li>
                @endif
                    <li>
                        <a href="{{ route('socity.home') }}" class="title_search">مجتمع التسويق</a>
                    </li>
                    <li>
                        <a href="{{ route('all_apps') }}" class="title_search">متجر التطبيقات</a>
                    </li>
                    <li>
                        <a href="{{ route('get_all_providers') }}" class="title_search">المسوقين</a>
                    </li>
                    <li>
                        <a href="{{ route('all_purchases_services') }}" class="title_search">المشتريات</a>
                    </li>
                    <li>
                        <a href="{{ route('all_sales_services') }}" class="title_search">المبيعات</a>
                    </li>
                    <li>
                        <a href="{{ route('all_tickets') }}" class="title_search">الدعم الفني</a>
                    </li>
                    <li>
                        <a href="{{ route('acuant_Logout') }}" class="title_search"> تسجيل خروج</a>
                    </li>

                </ul>
            </div>
            <div class="overLay_search_side_menu"> </div>

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

        <!-- END:: HEADER -->