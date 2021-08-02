@extends('admin.layout')
@section('page')
    <div class="page-heading">
        <h3>SEO</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">{!! \Session::get('success') !!}</div>
                        @endif
                        <form action="{{route('admin.marketing.seo.create')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="player_id">Route Name</label>
                                <select class="form-select" id="route" name="route">
                                    <option value="0" selected>Please Select</option>
                                    @foreach($routes as $route)
                                        @if($route != null)
                                            <option value="{{$route}}">{{$route}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title"
                                       name="meta_title">
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords"
                                       name="meta_keywords" placeholder="eg. Football, Goalkeeper">
                            </div>
                            <div class="form-group mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea class="form-control" id="meta_description" rows="3" name="meta_description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Create</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
