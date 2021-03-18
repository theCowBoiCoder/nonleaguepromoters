@extends('layout.main')
@section('content')
    <div class="bg-black md:bg-about-image bg-scroll">
        @include('layout.login')
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto xs:leading-1"
                    style="color: orange; font-weight: 900;">About</h1>
                <h3 class="uppercase text-white text-1xl lg:text-2xl bolder italic font-Roboto xs:leading-1"
                    style="color: orange; font-weight: 900;"><a href="{{route('home')}}">
                        <i class="fas fa-long-arrow-alt-left"></i> Back</a></h3>
                <p class="text-3xl uppercase text-white mt-4" style="font-weight: 700;">Here at tnlp we are looking to
                    promote non league football</p>
            </div>
            <div class="flex flex-col px-7 lg:pl-20 lg:px-3">
                <div class="mb-3">
                    <h3 class="uppercase text-2xl mb-4" style="color: deepskyblue; font-weight: bold;">Player search
                        platform</h3>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">we have created the
                        chance for all players no matter the level to promote yourself on one simple player search
                        platform, with your very own profile</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">Input data that will help
                        you to get noticed and help you to fulfil your potential.</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">Want to find a new club,
                        want to show and tell people what you can do, the level you have played, This is your
                        platform.</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">Let clubs, scouts and
                        managers know when you are available for a move, when your contracts up or if you are a free
                        agent.</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">Maybe you are new to an
                        area, your uni team isn’t up to your standard or you’ve been released from a pro club.</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">Maybe you just want a
                        place to save all your achievements for future reference.</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">Sign up today</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">All for Free</p>
                </div>
                <div class="mt-3">
                    <h3 class="uppercase text-2xl mb-4" style="color: deepskyblue; font-weight: bold;">Staff search
                        platform</h3>
                    <p class="text-white uppercase italic" style="font-weight: 800;">Manager, Chairman, Coach, Scout,
                        analyst, physiotherapist,</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">This is your chance to
                        create a profile</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">input data that will help
                        you to get noticed.</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">Want to find a new club,
                        want to show and tell people what you can do, the level you have worked at, the qualifications
                        and experience you have. Open yourself to opportunity</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">are you looking to
                        improve your recruitment strategy, we have lots of players for you to connect with on our player
                        platform.</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">This is your platform</p>
                    <p class="text-white uppercase italic leading-9" style="font-weight: 800;">All for Free</p>
                </div>
            </div>
        </div>
    </div>
@endsection
