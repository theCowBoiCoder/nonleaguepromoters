@extends('layout.main')
@section('content')
    <div class="bg-repeat md:bg-about-image bg-scroll bg-mobile-image md:h-screen">
        @include('layout.login')
        <div class="container m-auto">
            <div class="text-center pt-10 pb-10 lg:pt-20 lg:pb-20 lg:pl-20 lg:text-left">
                <div class="flex justify-center visible md:invisible mb-3">
                    <div><img src="{{asset('images/mobile_logo.jpg')}}" alt="" width="150"></div>
                </div>
                <h1 class="uppercase text-white text-5xl lg:text-8xl bolder italic font-Roboto xs:leading-1"
                    style="color: orange; font-weight: 900;">Contact Us</h1>
                <h3 class="uppercase text-white text-1xl lg:text-2xl bolder italic font-Roboto xs:leading-1"
                    style="color: orange; font-weight: 900;"><a href="{{route('home')}}">
                        <i class="fas fa-long-arrow-alt-left"></i> Back</a></h3>
            </div>
            <div class="flex flex-col px-7 lg:pl-20 lg:px-3">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-success alert-block mb-4 text-uppercase">
                        <strong class="text-orange text-uppercase">{{ $error }}<br/></strong>
                    </div>

                @endforeach
                @if ($message = \Illuminate\Support\Facades\Session::get('success'))
                    <div class="alert alert-success alert-block mb-4 text-uppercase">
                        <strong class="text-orange text-uppercase">{{ $message }}</strong>
                    </div>
                @endif
                <form action="{{route('contact.store')}}" method="post">
                    @csrf
                    <div class="flex flex-col mb-2 mt-2">
                        <label for="name" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Name</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="name" name="name" value="{{old('name')}}">
                    </div>
                    <div class="flex flex-col mb-2 mt-2">
                        <label for="name" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Email</label>
                        <input type="email" class="border py-2 px-3 text-grey-darkest" id="name" name="email" value="{{old('email')}}">
                    </div>
                    <div class="flex flex-col mb-2 mt-2">
                        <label for="name" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Subject</label>
                        <input type="text" class="border py-2 px-3 text-grey-darkest" id="subject" name="subject" value="{{old('subject')}}">
                    </div>
                    <div class="flex flex-col mb-2 mt-2">
                        <label for="name" class="mb-2 uppercase font-bold text-lg text-grey-darkest"
                               style="color: orange; font-weight: 900;">Message</label>
                        <textarea name="message" id="message"
                                  class="border py-2 px-3 text-grey-darkest">{{old('message')}}</textarea>
                    </div>
                    <input type="submit" value="Contact Us Today" class="bg-orange hover:bg-white hover:text-orange inline-flex items-center px-3 py-2 font-medium rounded px-4 py-2 leading-5 bg-green-500 text-primary-100 text-white">
                </form>
            </div>
        </div>
    </div>
@endsection
