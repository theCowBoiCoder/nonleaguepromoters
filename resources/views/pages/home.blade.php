@extends('layout.main')
@section('content')
    <div class="md:bg-home-image bg-black bg-scroll bg-cover bg-center h-screen">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8" style="color: orange; font-weight: 900;">The Non <br>League <br>Promoters</h1>
            </div>
            <div class="flex flex-col px-7 lg:pl-20 lg:px-3">
                <div class="mb-1">
                    <a href="" class="uppercase text-white mb-1 "><strong>Home</strong></a>
                </div>
                <div class="mb-1">
                    <a href="{{route('about')}}" class="uppercase text-white font-weight-bold"><strong>About</strong></a>
                </div>
                <div class="mb-1">
                    <a href="{{route('search')}}" class="uppercase text-white font-weight-bold mb-2"><strong>Player Search Platform</strong></a>
                </div>
{{--                <div class="mb-1">--}}
{{--                    <a href="" class="uppercase text-white font-weight-bold mb-2"><strong>Staff Search Platform</strong></a>--}}
{{--                </div>--}}
{{--                <div class="mb-1">--}}
{{--                    <a href="" class="uppercase text-white font-weight-bold mb-2"><strong>Club Promotion</strong></a>--}}
{{--                </div>--}}
{{--                <div class="mb-1">--}}
{{--                    <a href="" class="uppercase text-white font-weight-bold mb-2"><strong>Best Of Non League social</strong></a>--}}
{{--                </div>--}}
{{--                <div class="mb-1">--}}
{{--                    <a href="" class="uppercase text-white font-weight-bold mb-2"><strong>Non league Shop</strong></a>--}}
{{--                </div>--}}
{{--                <div class="mb-1">--}}
{{--                    <a href="" class="uppercase text-white font-weight-bold mb-2"><strong>Advertise with us</strong></a>--}}
{{--                </div>--}}
{{--                <div class="mb-1">--}}
{{--                    <a href="" class="uppercase text-white font-weight-bold mb-2"><strong>Contact us</strong></a>--}}
{{--                </div>--}}
                <div class="mt-6">
                    <h2 class="text-3xl" style="color: orange; font-weight: 700;"><a href="{{route('register')}}">SIGN UP FREE NOW</a></h2>
                </div>
            </div>
        </div>
    </div>
@stop
