@extends('front.layouts.app')

@section('style')
<title>سلسلة تك - الدعم - الإشعارات</title>

@endsection
@section('content')
 
        <!-- START:: BREADCRUMB -->
        <section class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb">
                            <ul>
                                <li><a href="{{ url('/') }}">الرئيسية</a></li>
                                <li>/</li>
                                <li><a href="{{ route('all_tickets') }}">الدعم</a></li>
                                <li>/</li>
                                <li><a href="">الإشعارات</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END:: BREADCRUMB -->

        <!-- START:: CONTENT PAGE -->
        <section class="content_page ">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">

                        <div class="dropdown-menu-notifications dropdown-menu-notifications-page">

                            <ul>
                            @if(CurrentAuth()['type'] == 'provider')
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
                            @endif


                            </ul>

                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- START:: CONTENT PAGE -->


@endsection


@section('script')

<script type="text/javascript">
    
   
</script>

@endsection



