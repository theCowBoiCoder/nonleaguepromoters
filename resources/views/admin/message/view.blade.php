@extends('admin.layout')
@section('page')
    <div class="page-heading">
        <h3>View All Messages</h3>
    </div>
    <section class="section">
        @foreach($messages as $message)
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$message->subject}}</h4>
                </div>
                <div class="card-body">
                    {{\Illuminate\Support\Facades\Crypt::decrypt($message->message)}}
                </div>
                <div class="card-footer">
                    <h4 class="card-title">Sender: {{$message->user->name ?? 'No Account Found'}}</h4>
                    <h4 class="card-title">From: {{$message->from}}</h4>
                </div>
            </div>
        @endforeach

    </section>
    {{$messages->links('pagination::bootstrap-4')}}
@endsection
