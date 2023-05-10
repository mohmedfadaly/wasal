
<!-- START:: SLIDER HERO SECTION -->
<section class="hero_section hero_section_auth">
    <div class="content_hero_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <h1>أكبر سوق عربي لبيع وشراء الخدمات المصغرة</h1>
                    <p>أنجز أعمالك بسهولة وأمان</p>
                    <form action="{{ route('search_services') }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="custom-form-group">
                            <input type="search" name="search" required class="form-control" id="subscription"
                                placeholder="ابحث عن خدمتك">
                            <button type="submit" class="btn-animation-1"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
@include('front.parts_auth.services')
@include('front.parts_auth.articls')
@include('front.parts_auth.consult')
@include('front.parts_auth.store')
@include('front.parts_auth.bodcasts')
@include('front.parts_auth.society')
@include('front.parts_auth.videos')

<!-- END:: SLIDER HERO SECTION -->