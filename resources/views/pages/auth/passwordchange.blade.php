@extends('layout.main')
@section('content')
    <div class="md:bg-home-image bg-black bg-scroll bg-cover bg-center h-screen">
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto leading-8"
                    style="color: orange; font-weight: 900;">Login</h1>
            </div>

            <form action="{{route('password.change.store',$user)}}" method="post">
                @csrf
                <div class="flex flex-col w-50 px-5 lg:pl-20 lg:px-3">
                    <p class="text-white text-2xl mb-5">Welcome to Non League Promoters. <br> We have noticed that you have logged in for the first time,
                        either after signing up or reset your password. Please enter a password below:</p>

                   <div class="mb-5">
                       @foreach ($errors->all() as $error)
                           <p class="text-orange">{{ $error }}</p>
                       @endforeach
                   </div>

                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="password">Password *</label>
                        <input type="password" class="border py-2 px-3 text-grey-darkest" id="password" name="password">
                    </div>
                    <div class="flex flex-col mb-2">
                        <label class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;" for="confirm_password">Confirm Password *</label>
                        <input type="password" class="border py-2 px-3 text-grey-darkest" id="confirm_password" name="confirm_password">
                    </div>
                    <button class="btn btn-danger border text-white p-3 uppercase"
                            style="background-color: orange; font-weight: 900; border-color: orange">Reset Password
                    </button>
                </div>
            </form>

        </div>
    </div>
@stop
