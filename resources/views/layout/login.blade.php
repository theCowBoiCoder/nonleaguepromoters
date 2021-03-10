<div class="hidden sm:block fixed top-0 right-0 h-48 flex flex-wrap content-start w-50 h-50 items-stretch text-center">
    <img src="{{asset('images/login.png')}}">
    @if(\Illuminate\Support\Facades\Auth::check())
        <a href="{{route('profile')}}" class="text-orange font-medium uppercase"><strong>My Profile</strong></a>
    @else
        <a href="{{route('login')}}" class="text-orange font-medium uppercase">Login</a>
    @endif

</div>

