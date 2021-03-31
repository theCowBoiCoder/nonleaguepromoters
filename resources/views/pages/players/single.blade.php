@extends('layout.main')
@section('content')
    <div class="bg-repeat bg-black md:bg-player-image bg-scroll md:h-screen">
        @include('layout.login')
        <div class="container m-auto">
            <div class="flex flex-col md:flex-row">
                <div class="flex-1">
                    <div class="text-center pt-10 lg:text-left">
                        <h3 class="uppercase text-white text-1xl lg:text-2xl bolder italic font-Roboto leading-8"
                            style="color: orange; font-weight: 900;"><a href="{{route('search')}}">
                                <i class="fas fa-long-arrow-alt-left"></i> Back</a></h3>
                        <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto xs:leading-8 mb-9"
                            style="color: white; font-weight: 900;">{{$player->name}}</h1>

                        <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                            style="color: white; font-weight: 900;">{{$player->preferred_position}}</h3>
                        <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                            style="color: white; font-weight: 900;">
                            Age {{\Carbon\Carbon::parse($player->dob)->age}}</h3>
                        @if(isset($player->contracts))
                            <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                                style="color: white; font-weight: 900;">
                                Club {{$player->contracts->contracted_club}}</h3>
                            <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                                style="color: white; font-weight: 900;">Contract
                                Ends {{$player->contracts->contracted_expiry_date}}</h3>
                        @else
                            <h3 class="uppercase text-white text-3xl lg:text-5xl bolder italic font-Roboto xs:leading-8 mb-4"
                                style="color: white; font-weight: 900;">LOOKING FOR A CLUB</h3>
                        @endif

                        <h5 class="uppercase text-white text-2xl lg:text-2xl bolder italic font-Roboto xs:leading-8 mb-4"
                            style="color: white; font-weight: 900;">{{$player->preferred_foot}}</h5>
                        <h5 class="uppercase text-white text-2xl lg:text-2xl bolder italic font-Roboto xs:leading-8 mb-4"
                            style="color: white; font-weight: 900;">{{$player->height}}</h5>
                        <p class="uppercase text-white text-2xl lg:text-2xl bolder italic font-Roboto xs:leading-8 mb-4"
                           style="color: white; font-weight: 900;">{{$player->bio}}</p>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="bg-orange px-6 py-6 mx-6 rounded">
                        <div class="mt-8 mb-8 py-3 p-6">
                            @if($player->profile_image != null)
                                <img src="/images/user/{{$player->profile_image}}" alt="Profile Image" width="70%">
                            @else
                                <img src="/images/default_profile_image.png" alt="Default Image"
                                     class="object-contain h-48 w-full">
                            @endif
                        </div>
                        @if(count($player->histories) >= 1)
                            <div class="flex-initial lg:flex-grow mt-8 mb-8">
                                <div class="flex justify-center items-center">
                                    <table
                                        class="table-auto border-collapse border-2 border-orange bg-white bg-opacity-95 align-items-center">
                                        <thead>
                                        <tr>
                                            <th class="pl-2 border-orange border-2 text-left text-gray-800 uppercase p-2 text-orange">
                                                Years
                                            </th>
                                            <th class="pl-2 border-orange border-2 text-left text-gray-800 uppercase p-2 text-orange">
                                                Club
                                            </th>
                                            <th class="pl-2 border-orange border-2 text-left text-gray-800 uppercase p-2 text-orange">
                                                Appearances
                                            </th>
                                            <th class="pl-2 border-orange border-2 text-left text-gray-800 uppercase p-2 text-orange">
                                                Goals
                                            </th>
                                            <th class="pl-2 border-orange border-2 text-left text-gray-800 uppercase p-2 text-orange">
                                                Assists
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($player->histories as $history)
                                            <tr>
                                                <td class="border-orange border-2 uppercase pl-2 font-light p-2">{{$history->season}}</td>
                                                <td class="border-orange border-2 uppercase pl-2 font-light p-2">{{$history->club}}</td>
                                                <td class="border-orange border-2 uppercase pl-2 font-light p-2">{{$history->appearances}}</td>
                                                <td class="border-orange border-2 uppercase pl-2 font-light p-2">{{$history->goals}}</td>
                                                <td class="border-orange border-2 uppercase pl-2 font-light p-2">{{$history->assists}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        <div class="flex flex-col md:flex-row">
                            <div class="flex-1">
                                @if($player->twitter_url != null || $player->facebook_url != null || $player->instagram_url != null || $player->youtube_url)
                                    <p class="text-white text-2xl lg:text-2xl bolder font-Roboto xs:leading-8 mb-4 italic">
                                        Social Media</p>
                                    <div class="flex flex-row">
                                        @if($player->facebook_url != null)
                                            <div class="flex-1">
                                                <a class="lowercase" target="_blank" href="{{$player->facebook_url}}">
                                                    <img src="https://img.icons8.com/color/50/000000/facebook-new.png"/></a>
                                            </div>
                                        @endif
                                            @if($player->twitter_url != null)
                                                <div class="flex-1">
                                                    <a class="lowercase" target="_blank" href="{{$player->twitter_url}}">
                                                        <img src="https://img.icons8.com/color/50/000000/twitter--v1.png"/></a>
                                                </div>
                                            @endif
                                            @if($player->youtube_url != null)
                                                <div class="flex-1">
                                                    <a class="lowercase" target="_blank" href="{{$player->youtube_url}}">
                                                        <img src="https://img.icons8.com/color/50/000000/youtube-play.png"/></a>
                                                </div>
                                            @endif
                                            @if($player->instagram_url != null)
                                                <div class="flex-1">
                                                    <a class="lowercase" target="_blank" href="{{$player->instagram_url}}">
                                                        <img src="https://img.icons8.com/color/50/000000/instagram-new--v1.png"/></a>
                                                </div>
                                            @endif

                                    </div>
                                @else
                                    <p class="text-white text-1xl lg:text-1xl bolder font-Roboto xs:leading-8 mb-4">
                                        No Social Media Details have been added yet</p>
                                @endif
                            </div>
                            <div class="flex-1">
                                <div
                                    class="border-2 border-white p-2 rounded hover:text-orange hover:bg-white hover:border-orange">
                                    <h3 class="text-white text-4xl bolder text-center uppercase hover:text-orange hover:bg-white hover:text-orange hover:bg-white">
                                        <a href="{{route('message',$player)}}">Message
                                            Now</a></h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@stop
