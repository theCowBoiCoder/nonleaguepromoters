@extends('layout.main')
@section('content')
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <div class="bg-repeat bg-mobile-image md:bg-home-image">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-10 lg:pb-10 lg:pl-20 lg:text-left">
                <div class="flex justify-center visible md:invisible mb-3">
                    <div><img src="{{asset('images/mobile_logo.jpg')}}" alt="" width="150"></div>
                </div>
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">Sign Up</h1>
            </div>
            <register-component :positions="{{$positions}}" :regions="{{$regions}}"></register-component>
        </div>
    </div>
@endsection
