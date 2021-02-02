@extends('layout.main')
@section('content')
<div class="container m-auto">
    <div class="flex flex-col mt-6">
        <h3 class="uppercase text-4xl mb-5 font-bold font-light font-Montserrat">Player Search</h3>
        <table class="table-auto border-collapse border-2 border-blue-600 ">
            <thead>
            <tr>
                <th class="pl-2 border-gray-400 border-2 text-left text-gray-800">Name</th>
                <th class="border-gray-400 border-2">Age</th>
                <th class="border-gray-400 border-2 w-32"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($players as $player)
                <tr class="bg-gray-{{($loop->iteration % 2 == 0)?"50":"300"}}">
                    <td class="border-gray-400 border-2 uppercase pl-2 font-light">{{$player->name}}</td>
                    <td class="border-gray-400 border-2 text-center">{{\Carbon\Carbon::parse($player->dob)->age}}</td>
                    <td class="border-gray-400 border-2 p-2 text-center">
                        <a href="{{route('single',$player)}}" class="text-sm border-1 bg-blue-400 p-1 rounded text-white uppercase font-light">View Details</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $players->render() !!}
    </div>
</div>
@endsection
