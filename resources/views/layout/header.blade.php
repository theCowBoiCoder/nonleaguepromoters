<header class="bg-black shadow ">
    <div class="flex flex-col p-7">
        <h1 class="text-6xl lg:text-6xl sm:text-2xl antialiased uppercase text-center text-white font-light font-Montserrat">{{env('APP_NAME')}}</h1>
    </div>
    <div class="container m-auto w-auto">
        <div class="flex items-center justify-center">
            <a href="#" class="text-white p-3 hover:text-blue-300 font-light font-Montserrat uppercase">Home</a>
            <a href="{{route('search')}}"
               class="text-white p-3 hover:text-blue-300 font-light font-Montserrat uppercase">Players</a>
            <a href="#" class="text-white p-3 hover:text-blue-300 font-light font-Montserrat uppercase">Podcast</a>
            <a href="#" class="text-white p-3 hover:text-blue-300 font-light font-Montserrat uppercase">Contact Us</a>
        </div>
    </div>

</header>
