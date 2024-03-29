@extends('layout.main')
@section('content')
    <div class="md:bg-home-image bg-black bg-repeat bg-mobile-image h-screen">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                @include('pages.partials.mobile_image')
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">Login</h1>
            </div>
            <form action="{{route('auth.login')}}" method="post">
                @csrf
                <div class="flex flex-col w-50 px-5 lg:pl-20 lg:px-3">
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Email Address *</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="name" name="email">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="name">Password</label>
                        <input type="password" class="border py-2 px-3 text-grey-darkest" id="name" name="password">
                    </div>
                    <button class="btn btn-danger border text-white p-3 uppercase"
                            style="background-color: orange; font-weight: 900; border-color: orange">Login
                    </button>
                    <p class="text-orange mt-2">Forgot Password? Click <a href="{{route('reset')}}" class="hover:text-white">Here</a></p>
                </div>
            </form>

        </div>
    </div>
@stop
