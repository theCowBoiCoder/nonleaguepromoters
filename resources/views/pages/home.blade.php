@extends('layout.main')
@section('content')
    <div class="h-screen w-full bg-cover bg-repeat md:bg-home-image bg-mobile-image">

        @include('layout.login')

        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                @include('pages.partials.mobile_image')
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto xs:leading-1"
                    style="color: orange; font-weight: 900;">The Non <br>League <br>Promoters</h1>
                @if(\Illuminate\Support\Facades\Auth::check())
                    <h2 class="uppercase text-white bolder italic font-Roboto leading-8 text-2xl lg:text-2xl">
                        Welcome, {{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
                @endif
            </div>
            <div class="flex flex-col px-7 lg:pl-20 lg:px-3">
                <div class="mb-1 block sm:hidden">
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <a href="{{route('login')}}" class="uppercase text-white mb-1 hover:text-orange"><strong>Login</strong></a>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <a href="{{route('profile.profile')}}" class="uppercase text-white mb-1 hover:text-orange"><strong>My
                                Profile</strong></a>
                    @endif
                </div>
                <div class="mb-1">
                    <a href="{{route('home')}}" class="uppercase text-white mb-1 hover:text-orange"><strong>Home</strong></a>
                </div>
                <div class="mb-1">
                    <a href="{{route('about')}}"
                       class="uppercase text-white font-weight-bold hover:text-orange"><strong>About</strong></a>
                </div>
                <div class="mb-1">
                    <a href="{{route('search')}}" class="uppercase text-white font-weight-bold mb-2 hover:text-orange"><strong>Player
                            Search Platform</strong></a>
                </div>
                <div class="mb-1">
                    <a href="{{route('staff.search')}}" class="uppercase text-white font-weight-bold mb-2 hover:text-orange"><strong>Staff
                            Search Platform</strong></a>
                </div>
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                        <a href="{{route('admin.dashboard')}}" class="uppercase text-white mb-1 hover:text-orange"><strong>Admin Portal</strong></a>
                    @endif
                    <a href="{{route('profile.my_messages',\Illuminate\Support\Facades\Auth::user())}}"
                       class="uppercase text-white mb-1 hover:text-orange"><strong>My
                            Messages</strong></a>
                    <a href="{{route('logout')}}"
                       class="uppercase text-white font-weight-bold mb-2 hover:text-orange"><strong>Logout</strong></a>
                @endif

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
                <div class="mb-1">
                    <a href="{{route('contact.index')}}" class="uppercase text-white font-weight-bold mb-2 hover:text-orange"><strong>Contact
                            Us</strong></a>
                </div>
                <div class="mb-1">
                    <a target="_blank" href="{{asset('TermsAndConditions.pdf')}}"
                       class="uppercase text-white font-weight-bold mb-2 hover:text-orange"><strong>Terms And Conditions</strong></a>
                </div>
                @if(!\Illuminate\Support\Facades\Auth::check())
                    <div class="mt-6">
                        <h2 class="text-3xl" style="color: orange; font-weight: 700;"><a href="{{route('register')}}">SIGN
                                UP FREE NOW</a></h2>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop
