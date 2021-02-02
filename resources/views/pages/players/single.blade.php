@extends('layout.main')
@section('content')
    <div class="container m-auto">
        <div class="flex flex-row m-6 items-center">
            <div class="w-auto mr-3">
                <img src="{{$player->profile_image}}" alt="Player Profile Image">
            </div>
            <div class="w-1/2 mt-4">
                <h3 class="font-bold font-Montserrat font-thin uppercase text-5xl pb-2">{{$player->name}}</h3>
                <p class="font-light font-Montserrat text-lg mb-3">{{$player->bio}}</p>
                <p class="font-light font-Montserrat text-md uppercase">Age: <strong
                        class="font-bold text-md">{{\Carbon\Carbon::parse($player->dob)->age}}</strong></p>
                @include('pages.players.partials.socials')
            </div>
        </div>
        @if(count($player->histories) >= 1)
            <div class="flex flex-row w-auto mb-7">
                <table class="table border-gray-500 text-md uppercase font-Montserrat border-collapse">
                    <thead>
                    <tr class="border-1 border-gray-500">
                        <th class="border-gray-500 p-3">Season</th>
                        <th class="border-gray-500 p-3">Club</th>
                        <th class="border-gray-500 p-3">Appearances</th>
                        <th class="border-gray-500 p-3">Goals</th>
                        <th class="border-gray-500 p-3">Assists</th>
                        <th class="border-gray-500 p-3">Clean Sheets</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($player->histories as $history)
                        <tr>
                            <td class="text-center p-3 border-gray-700 border-2">{{$history->season}}</td>
                            <td class="text-center p-3 border-gray-600 border-2">{{$history->club}}</td>
                            <td class="text-center p-3 border-gray-600 border-2">{{$history->appearances}}</td>
                            <td class="text-center p-3 border-gray-600 border-2">{{$history->goals}}</td>
                            <td class="text-center p-3 border-gray-600 border-2">{{$history->assists}}</td>
                            <td class="text-center p-3 border-gray-600 border-2">{{$history->clean_sheets}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
