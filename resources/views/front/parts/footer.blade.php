 <!-- START:: MOBILE FOOTER -->
 <div class="footer_mobile">
            <ul class="actions_header">
                <li>
                    @if(CurrentAuth())
                        <a href="{{ route('get_all_massages') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="المشتريات">
                            <i class="fas fa-envelope"></i>
                        </a>
                    @else 
                    <a href="{{ route('change_type_login') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="المشتريات">
                            <i class="fas fa-envelope"></i>
                        </a>
                    @endif
                </li>
                @if(CurrentAuth())
                @if(CurrentAuth()['type'] == 'provider')
                <li>
                    <a href="{{ route('all_notfications') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="الإشعارات">
                        <i class="fas fa-bell"></i>
                    </a>
                </li>
                @endif
                @endif
                <li>
                    <a href="{{ url('/') }}" data-bs-toggle="tooltip" data-bs-placement="top" title="الرئيسية">
                        <i class="fas fa-home"></i>
                    </a>
                </li>

                <li>
                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Book Mark">
                        <i class="fas fa-bookmark"></i>
                    </a>
                </li>

                <li>
                @if(CurrentAuth())

                    @if(CurrentAuth()['type'] == 'customer')
                        <a href="{{ route('profile_customer') }}"data-bs-toggle="tooltip" data-bs-placement="top" title="الملف الشخصي">
                            <i class="fas fa-user"></i>
                        </a>
                    @elseif(CurrentAuth()['type'] == 'provider')
                        <a href="{{ route('provider_profile',CurrentAuth()['user']->id) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="الملف الشخصي">
                            <i class="fas fa-user"></i>
                        </a>
                    @endif

            
                @else 
                <a href="{{ route('change_type_login') }}"  data-bs-toggle="tooltip" data-bs-placement="top" title="الملف الشخصي">
                        <i class="fas fa-user"></i>
                    </a>
                @endif
                   
                </li>

            </ul>
        </div>
        <!-- END:: MOBILE FOOTER -->

        <!-- START:: FOOTER -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="right-footer">
                            <img src="{{asset('dist/front/assets/images/logo/logo.svg') }}" alt="" width="" height="" />
                            <p>
                                يضم جميع المسوقين العرب وويقدم جميع الخدمات في مجال التسويق
                            </p>
                            <form action="{{route('store_email')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <label for="subscription" class="form-label">
                                    سجل الأن لتصبح جزء من فريق سلسله تيكـ
                                </label>
                                <div class="custom-form-group">
                                    <input type="email" class="form-control" name="email" id="subscription"
                                    required  placeholder="ادخل البريد الإلكتروني">

                                    <button type="submit" class="btn-animation-1">تسجيل</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="list-footer">
                            <ul>
                                <li><a href="{{ url('/') }}">الرئيسية </a></li>
                                <li><a href="{{ route('all_services') }}">خدماتنا</a></li>
                                <li><a href="{{ route('all_articles') }}">المدونات </a></li>
                                <li><a href="{{ route('all_podcasts') }}">بودكاست</a></li>
                                <li><a href="{{ route('all_videos') }}">فيديوهات</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="left-footer">
                            <h4>نحن هنا للمساعدة</h4>
                            <p>
                                قم بزيارة مركز المساعدة الخاص بنا للحصول على إجابات للمشتركين
                                الأسئلة أو الاتصال بنا مباشرة
                            </p>
                            <div class="btns">
                                <a href="{{ route('all_tickets') }}" class="btn-animation-2">تواصل مع الدعم</a>
                            </div>
                            <div class="social">
                                <span>تابعنا : </span>
                                <ul>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="copyRights">
                            © 2020 by Selsela Tech All right reserve
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END:: FOOTER -->