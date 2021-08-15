@extends('layout.main')
@section('content')
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <div class="bg-repeat bg-mobile-image md:bg-home-image">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-5 lg:pb-10 lg:pl-20 lg:text-left">
                @include('pages.partials.mobile_image')
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">Sign Up</h1>
            </div>
            <register-component :positions="{{$positions}}" :regions="{{$regions}}"></register-component>
        </div>
    </div>
@endsection
