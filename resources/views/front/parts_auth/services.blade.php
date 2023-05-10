   <!-- START:: SERVICES SECTION -->
   <section class="services_section wow animate fadeInUp">
            <div class="container">
                <div class="d-flex mb-5 align-items-center justify-content-between">
                    <div class="title_section">
                        <h3 class="mb-0">كـافة الخدمات الإبداعية والاحترافية</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 wow animate fadeIn">
                        <ul class="nav nav-tabs nav-tabs-custom" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="best-services-tab" data-bs-toggle="tab"
                                    data-bs-target="#best-services" type="button" role="tab"
                                    aria-controls="best-services" aria-selected="true">أفضل الخدمات </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="latest-services-tab" data-bs-toggle="tab"
                                    data-bs-target="#latest-services" type="button" role="tab"
                                    aria-controls="latest-services" aria-selected="false">أحدث الخدمات</button>
                            </li>
                            
                            <li class="nav-item">
                                <a href="{{ route('all_services') }}" class="show-all-btn btn-animation-2">
                                    عرض الكل
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="best-services" role="tabpanel"
                                aria-labelledby="best-services-tab">
                                <div class="service-slider mt-5">
                                    <div class="row">
                                        @foreach($view_services as $key => $value)

                                        @include('services::front.parts.card_service')

                                        @endforeach

                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="latest-services" role="tabpanel"
                                aria-labelledby="latest-services-tab">
                                <div class="service-slider mt-5">
                                    <div class="row">
                                    @foreach($latest_services as $key => $value)
                                    @include('services::front.parts.card_service')

                                    @endforeach
                                    </div>

                                </div>
                            </div>
                        
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- END:: SERVICES SECTION -->