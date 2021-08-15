@extends('admin.layout')
@section('page')
    <div class="page-heading">
        <h3>Create News</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{!! \Session::get('success') !!}</div>
                        @endif
                        <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$news->title ?? NULL}}">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea class="form-control" id="description" rows="3" name="description">{{$news->description ?? NULL}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Save News</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
