@extends('layout.main')
@section('content')
    <div class="bg-repeat md:bg-home-image bg-black bg-mobile-image md:h-screen">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-10 lg:pb-10 lg:pl-20 lg:text-left">
                @include('pages.partials.mobile_image')
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">My Messages</h1>
                <h3 class="uppercase text-white text-1xl lg:text-2xl bolder italic font-Roboto xs:leading-1"
                    style="color: orange; font-weight: 900;"><a href="{{route('home')}}">
                        <i class="fas fa-long-arrow-alt-left"></i> Back</a></h3>
            </div>
            @foreach($messages as $message)
                <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl mb-2">
                    <div class="md:flex">
                        <div class="p-8">
                            <a href="#" class="block mt-1 text-xl leading-tight font-medium text-orange hover:underline">{{$message->subject}}</a>
                            <p class="mt-2 text-gray-500 break-all">{{decrypt($message->message)}}</p>
                            <p class="mt-2 text-gray-500 break-all">From: <span class="text-orange">{{$message->sender->name ?? NULL}}</span></p>
                            @if($message->has_read == 0)
                                <div class="mt-4">
                                    <a class="p-2 rounded bg-white text-orange border border-orange hover:text-white hover:bg-orange" href="{{route('profile.my_messages.read',[$message,$message->id])}}">Mark As Read</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
