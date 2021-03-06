@extends('layout.main')
@section('content')
    <div class="bg-repeat bg-mobile-image md:bg-player-image bg-scroll">
        @include('layout.login')
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                @include('pages.partials.mobile_image')
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto xs:leading-8"
                    style="color: orange; font-weight: 900;">Staff <br>Search <br>Platform</h1>
                <h3 class="uppercase text-white text-1xl lg:text-2xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;"><a href="{{route('home')}}">
                        <i class="fas fa-long-arrow-alt-left"></i> Back</a></h3>
            </div>
            <staff-component :regions="{{$regions}}" :counties="{{$counties}}"></staff-component>
        </div>
    </div>
@stop
