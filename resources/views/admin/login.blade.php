@extends('admin.adminlayout')
@section('form')
    <h1 class="auth-title">Log in.</h1>
    <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

    <form action="{{route('admin.authenticate')}}" method="post">
        @csrf
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="text" class="form-control form-control-xl" placeholder="Email Address" name="email">
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        <div class="form-group position-relative has-icon-left mb-4">
            <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
            <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
            </div>
        </div>
        <div class="form-check form-check-lg d-flex align-items-end">
            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                Keep me logged in
            </label>
        </div>
        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
    </form>
@endsection
