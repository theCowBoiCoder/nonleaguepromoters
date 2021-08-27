@extends('admin.layout')
@section('page')
    <div class="page-heading">
        <h3>View All Users</h3>
    </div>
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success">{!! \Session::get('success') !!}</div>
                        @endif
                        <!-- Table with outer spacing -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>TYPE</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-bold-500">{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-bold-500">
                                                @if($user->player)
                                                    <p>Player</p>
                                                @elseif($user->staff)
                                                    <p>Staff</p>
                                                @else
                                                    <p>Unknown</p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-warning">Send Password Reset</a>
                                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                                <a href="{{route('admin.users.delete',$user)}}"
                                                   class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$users->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
