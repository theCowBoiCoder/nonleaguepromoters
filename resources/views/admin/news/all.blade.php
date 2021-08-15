@extends('admin.layout')
@section('page')
    <div class="page-heading">
        <h3>View All News</h3>
    </div>
    <section class="section">
        <div class="table-responsive">
            <table class="table table-lg">
                <thead>
                <tr>
                    <th>TITLE</th>
                    <th>CREATED BY</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $news_item)
                    <tr>
                        <td>{{$news_item->title}}</td>
                        <td>{{$news_item->user->name}}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{route('admin.news.edit',$news_item)}}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{route('admin.news.delete', $news_item)}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    {{$news->links('pagination::bootstrap-4')}}
@endsection
