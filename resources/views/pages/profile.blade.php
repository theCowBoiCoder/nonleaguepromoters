@extends('layout.main')
@section('content')
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <div class="bg-repeat md:bg-home-image bg-mobile-image">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-10 lg:pb-10 lg:pl-20 lg:text-left">
                @include('pages.partials.mobile_image')
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">My Profile</h1>
            </div>
            <profile-component :positions="{{$positions}}" :my_profile="{{$me}}"
                               :regions="{{$regions}}"></profile-component>
        </div>
    </div>
@endsection
