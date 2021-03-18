@extends('layout.main')
@section('content')
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <div class="md:bg-home-image bg-black bg-scroll bg-cover md:h-screen bg-center">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-10 lg:pb-10 lg:pl-20 lg:text-left">
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">My Profile</h1>
            </div>
            <profile-component :positions="{{$positions}}" :my_profile="{{$me}}"></profile-component>
        </div>
    </div>
@endsection
