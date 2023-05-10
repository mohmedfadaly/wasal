 <!-- START:: BLOGS SECTION -->
 <section class="blog_section bg-gray wow animate fadeInUp">
            <div class="container">
                <div class="d-flex mb-5 align-items-center justify-content-between">
                    <div class="title_section">
                        <h3 class="mb-0">المقالات</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 wow animate fadeIn">
                        <ul class="nav nav-tabs nav-tabs-custom" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="best-blogs-tab" data-bs-toggle="tab"
                                    data-bs-target="#best-blogs" type="button" role="tab" aria-controls="best-blogs"
                                    aria-selected="true">أفضل المقالات </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="latest-blogs-tab" data-bs-toggle="tab"
                                    data-bs-target="#latest-blogs" type="button" role="tab" aria-controls="latest-blogs"
                                    aria-selected="false">أحدث المقالات</button>
                            </li>
                           
                            <li class="nav-item">
                                <a href="{{ route('all_articles') }}" class="show-all-btn btn-animation-2">
                                    عرض الكل
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="best-blogs" role="tabpanel"
                                aria-labelledby="best-blogs-tab">
                                <div class="blog-slider mt-5">
                                    <div class="row">
                                        @foreach($view_articles as $key => $value)
                                        @include('articles::front.parts.card_article')
                                        @endforeach
  
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="latest-blogs" role="tabpanel"
                                aria-labelledby="latest-blogs-tab">
                                <div class="blog-slider mt-5">
                                    <div class="row">
                                    @foreach($latest_articless as $key => $value)
                                        <!-- SINGLE SLIDE -->
                                        @include('articles::front.parts.card_article')
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- END:: BLOGS SECTION -->