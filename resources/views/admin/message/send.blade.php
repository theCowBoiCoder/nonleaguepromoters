@extends('admin.layout')
@section('page')
    <div class="page-heading">
        <h3>Send Message</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">{!! \Session::get('success') !!}</div>
                        @endif
                        <form action="{{route('admin.messages.send.message')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="player_id">Name</label>
                                <select class="form-select" id="player_id" name="player_id">
                                    <option selected>Please Select</option>
                                    <option value="0">All</option>
                                    @foreach($players as $player)
                                        <option value="{{$player->id}}">{{$player->user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <input type="text" class="form-control" id="subject"
                                       name="subject">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Send Message</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
