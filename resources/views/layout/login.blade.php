<div class="hidden sm:block fixed top-0 right-0 h-48 flex flex-wrap content-start w-50 h-50 items-stretch text-center">

    @if(\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('profile')}}" class="text-white font-medium uppercase"><img
                src="{{asset('images/login.png')}}">
            <strong>My Profile</strong></a>
    @else
        <a href="{{route('login')}}" class="text-white font-medium uppercase">
            <img src="{{asset('images/login.png')}}">
            Login</a>
    @endif

</div>

