@extends('layout.main')
@section('content')
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <div class="bg-home-image bg-black bg-scroll bg-cover h-screen bg-center">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-10 lg:pb-10 lg:pl-20 lg:text-left">
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">Sign Up</h1>
            </div>
            <register-component :positions="{{$positions}}"></register-component>
        </div>
    </div>
@endsection