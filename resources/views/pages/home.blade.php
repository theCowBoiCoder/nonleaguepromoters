@extends('layout.main')
@section('content')
    <div class="container mx-auto">
    <div class="flex flex-col lg:flex-col sm:flex-col mb-6 justify-center">
        <div class="mt-12 flex flex-wrap w-3/4 justify-center mx-auto">
            <p class="text-left lg:text-left sm:text-center mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Ad doloribus
                illum impedit incidunt nulla, possimus ratione saepe totam vel voluptatibus. Aliquam blanditiis
                doloribus fugiat iusto provident sint unde, vitae voluptatibus!</p>
            <p class="text-left mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad doloribus
                illum impedit incidunt nulla, possimus ratione saepe totam vel voluptatibus. Aliquam blanditiis
                doloribus fugiat iusto provident sint unde, vitae voluptatibus!</p>
            <a href="#" class="text-sm border-1 bg-blue-400 p-2 rounded text-white uppercase font-light text-center">Create
                Your
                Profile</a>
        </div>
    </div>
    </div>

    <div class="bg-black">
        <div class="container mx-auto p-6 flex flex-col">
            <div class="mb-3"><h3 class="text-white text-5xl uppercase font-Montserrat">Featured Player</h3></div>
            <div class="relative h-full flex flex-row">
                <div class="mr-7"><img src="https://via.placeholder.com/200x200" alt="" class="" width="200"></div>
                <div class="pt-20">
                    <h3 class="font-bold inline-block align-text-bottom font-Montserrat font-thin uppercase text-2xl pb-2 text-white">JOHN SMITH</h3>
                    <p class="font-light font-Montserrat text-md uppercase text-white">Age: <strong class="font-bold text-md">99</strong></p>
                </div>
            </div>


        </div>
    </div>
    <div class="container mx-auto">
        <div class="mt-12 flex flex-row justify-center mb-4">
            <div class="mr-3"><img src="https://via.placeholder.com/400x200" alt="" class="" width="400"></div>
            <div class="mr-3"><img src="https://via.placeholder.com/400x200" alt="" class="" width="400"></div>
            <div class="mr-3"><img src="https://via.placeholder.com/400x200" alt="" class="" width="400"></div>
            <div class="mr-3"><img src="https://via.placeholder.com/400x200" alt="" class="" width="400"></div>
        </div>
        </div>
    </div>
@stop
