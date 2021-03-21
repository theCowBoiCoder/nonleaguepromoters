@extends('layout.main')
@section('content')
    <div class="bg-black md:bg-player-image bg-scroll">
        @include('layout.login')
        <div class="container m-auto">
            <div class="flex flex-wrap">
                <div class="flex-1">
                    <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                        <h3 class="uppercase text-white text-1xl lg:text-2xl bolder italic font-Roboto leading-8"
                            style="color: orange; font-weight: 900;"><a href="{{route('search')}}">
                                <i class="fas fa-long-arrow-alt-left"></i> Back</a></h3>
                        <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto xs:leading-8 mb-9"
                            style="color: white; font-weight: 900;">{{$player->name}}</h1>

                        <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                            style="color: white; font-weight: 900;">{{$player->preferred_position}}</h3>
                        <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                            style="color: white; font-weight: 900;">Age {{\Carbon\Carbon::parse($player->dob)->age}}</h3>
                        @if(isset($player->contracts))
                            <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                                style="color: white; font-weight: 900;">Club {{$player->contracts->contracted_club}}</h3>
                            <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                                style="color: white; font-weight: 900;">Contract Ends {{$player->contracts->contracted_expiry_date}}</h3>
                        @else
                            <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                                style="color: white; font-weight: 900;">LOOKING FOR A CLUB</h3>
                        @endif

                        <h5 class="uppercase text-white text-2xl lg:text-2xl bolder italic font-Roboto xs:leading-8 mb-4"
                            style="color: white; font-weight: 900;">{{$player->preferred_foot}}</h5>
                        <h5 class="uppercase text-white text-2xl lg:text-2xl bolder italic font-Roboto xs:leading-8 mb-4"
                            style="color: white; font-weight: 900;">{{$player->height}}</h5>
                    </div>
                </div>
                <div class="flex-1">
                    <player-single-component :player="{{$player}}"></player-single-component>
                </div>
            </div>


        </div>
    </div>
@stop
