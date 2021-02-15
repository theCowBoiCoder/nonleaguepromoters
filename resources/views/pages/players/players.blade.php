@extends('layout.main')
@section('content')
    <div class="lg:bg-main-image bg-black">
        <div class="container m-auto">
            <div class="pt-20 pb-20 pl-20">
                <h1 class="uppercase text-white lg:text-7xl md:text-5xl font-italic font-Montserrat">Player <br> Search
                    <br> Platform</h1>
            </div>
            <players-component :players="{{$players}}"></players-component>
        </div>
    </div>


@endsection
