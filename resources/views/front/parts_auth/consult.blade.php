 <!-- START:: CONSULTING SECTION -->
 <section class="consulting_section">
            <div class="container">
                <div class="d-flex mb-5 align-items-center justify-content-between">
                    <div class="title_section">
                        <h3 class="mb-0">الإستشارات</h3>
                    </div>
                    <a href="{{route('all_consultations')}}" class="show-all-btn btn-animation-2">
                        عرض الكل
                    </a>
                </div>
                <div class="row">

                @foreach($Consultations as $value)
                @include('consulting::front.parts.card_Consultations')
                @endforeach
                   
                </div>
            </div>
        </section>
        <!-- END:: CONSULTING SECTION -->
