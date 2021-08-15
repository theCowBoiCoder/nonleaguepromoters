@extends('admin.layout')
@section('page')
    <div class="page-heading">
        <h3>View All SEO Details</h3>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                @if (\Session::has('success'))
                    <div class="alert alert-success">{!! \Session::get('success') !!}</div>
                @endif
                @if (\Session::has('deleted'))
                    <div class="alert alert-danger">{!! \Session::get('deleted') !!}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Route Name</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keywords</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($seos as $seo)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$seo->route}}</td>
                                    <td>{{$seo->meta_title}}</td>
                                    <td>{{$seo->meta_description}}</td>
                                    <td>{{$seo->meta_keywords}}</td>
                                    <td>
                                        <a href="{{route('admin.marketing.seo.edit',$seo)}}"
                                           class="btn btn-sm btn-info">Edit</a>
                                        <a href="{{route('admin.marketing.seo.delete',$seo)}}"
                                           class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
