@extends('layout.main')
@section('content')
    <div class="bg-home-image bg-black bg-scroll bg-cover lg:h-screen">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">Sign Up</h1>
            </div>
            <register-component></register-component>
        </div>
    </div>
@endsection
