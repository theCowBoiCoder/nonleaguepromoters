@extends('layout.main')
@section('content')
    <div class="bg-black md:bg-player-image bg-scroll">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto xs:leading-8" style="color: orange; font-weight: 900;">Player <br>Search <br>Platform</h1>
            </div>
            <players-component :players="{{$players}}"></players-component>
        </div>
    </div>
@stop
