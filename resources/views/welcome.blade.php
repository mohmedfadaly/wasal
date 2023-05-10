@extends('front.layouts.app')

@section('style')
<title>سلسلة تك - الرئيسية</title>

@endsection
@section('content')
<!-- START:: HEADER -->
@if(auth()->guard('customer')->check() || auth()->guard('provider')->check())

@include('front.home.home')

@else

@include('front.home.home_guest')

@endif

@endsection
