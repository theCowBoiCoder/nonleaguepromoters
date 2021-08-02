@extends('admin.layout')
@section('page')
    <div class="page-heading">
        <h3>Edit SEO Details</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{route('admin.marketing.seo.edit.post', $seo)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="player_id">Route Name</label>
                                <select class="form-select" id="route" name="route">
                                    <option value="0">Please Select</option>
                                    @foreach($routes as $route)
                                        @if($route != null)
                                            <option
                                                {{($seo->route == $route) ?'selected':''}} value="{{$route}}">{{$route}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title"
                                       name="meta_title" value="{{$seo->meta_title}}">
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords"
                                       name="meta_keywords" placeholder="eg. Football, Goalkeeper"
                                       value="{{$seo->meta_keywords}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="meta_description" class="form-label">Meta Description</label>
                                <textarea
                                    class="form-control"
                                    id="meta_description" rows="3"
                                    name="meta_description">{{$seo->meta_description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
