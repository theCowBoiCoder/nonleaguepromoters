@extends('layout.main')
@section('content')
    <players-component :players="{{$players}}"></players-component>
@endsection
