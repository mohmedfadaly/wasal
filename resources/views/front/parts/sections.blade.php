<section class="fields_services_section how_to_started_section bg-gray wow animate fadeInUp">
    <div class="container">
        <div class="d-flex mb-5 align-items-center justify-content-between">
            <div class="title_section">
                <h3 class="mb-0">مـجالات الخدمات</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 wow animate fadeIn">
                <div id="fieldsServiceSlider" class="fields-service-slider owl-carousel owl-loaded owl-drag">
                @foreach($sections as $key => $value)
                <!-- SINGLE SLIDE -->
                    <div class="item">
                        <div class="card card-how-to">
                            <div class="icon">
                                <img src="{{ asset('uploads/sections/'.$value->image) }}" alt="ui" height="" width="">
                                <img src="{{ asset('uploads/sections/'.$value->image) }}" alt="ui" class="hide-icon" height=""
                                    width="">
                            </div>
                            <div class="text">
                                <h5>{{$value->name}}</h5>
                                <p>
                                {{count($value->Services)}} خدمه
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
</section>