 <!-- START:: BLOGS SECTION -->
 <section class="blog_section bg-gray wow animate fadeInUp">
            <div class="container">
                <div class="d-flex mb-5 align-items-center justify-content-between">
                    <div class="title_section">
                        <h3 class="mb-0">متجر التطبيقات</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 wow animate fadeIn">
                       
                        <div class="tab-pane fade show active" id="best-blogs" role="tabpanel"
                            aria-labelledby="best-blogs-tab">
                            <div class="blog-slider mt-5">
                                <div class="row">
                                    @foreach($latest_apps as $key => $value)
                                    @include('store::front.parts.card_app')
                                    @endforeach

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- END:: BLOGS SECTION -->