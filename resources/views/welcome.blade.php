<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('styles\styledashboard.css')}}" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="{{asset('js/systemdashboard.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    
    <title>Dashboard</title>

</head>
<body class="bg-white min-h-screen flex flex-col">
    <x-header />
    <x-login-popup />
    <x-signup-popup />
    <x-add-material />
    <div class="bg-sky-300 w-full h-24 flex items-center justify-center"><!--batas header-->
        <div class="flex items-center bg-sky-300 p-3 rounded-md w-fit mr-18">
            <label for="level" class="text-black text-lg font-medium mr-2">Select Level:</label>
            <div class="relative">
                <button id="level"
                    class="appearance-none bg-sky-200 text-black text-lg font-medium px-2 py-2 rounded-lg pr-20 cursor-pointer"
                    onclick="openClassSelection()">
                    Select your level
                </button>
                <!-- Ikon dropdown -->
                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 pointer-events-none">▼</span>
            </div>
        </div>

        <x-select-class-popup />
        <!-- Selection SD -->
        <x-sd-select-popup />
        <!-- Selection SMP -->
        <x-smp-select-popup />
        <!-- Selection SMA-->
        <x-sma-select-popup />

        <!--Search-->
        <div class="search-container">
            <input type="text" placeholder="Find your study materials here...">
            <img src="{{asset('images/lens_logo.png')}}" alt="Search Button">
            <!-- <script src="systemdashboard.js"></script> -->
        </div>
    </div>

    <div class="flex items-center justify-center bg-gray-100 flex-col"> <!--Deskripsi Belajar-->
        <p class="text-lg font-bold text-black font-Trispace ml-7 text-[24px] mt-8 ">Mau belajar apa hari ini?</p>
        <div class="subjectContainer flex justify-items-start gap-8 text-center mt-5 bg-[#78B2C7] rounded-3xl w-3/4 h-80 items-start ml-7 p-10">
            @forelse ($material as $m)
            <button class="subjectBtn  flex flex-col items-center">
                <img src="{{asset('storage/'.$m->image)}}" alt="Mathematics" class="w-24 h-24">
                <p class="mt-2 text-sm font-semibold">{{$m->name}}</p>
            </button>
            @empty
                <p class="text-center text-gray-500 mt-4">No materials found.</p>
            @endforelse
            @if(Auth::user()->role == "Admin")
            <button class="subjectBtn flex flex-col items-center" onclick="openMaterialAdd()">
                <img src="{{asset('images/plus.svg')}}" class="w-24" alt="">
                <p class="mt-2 text-sm font-semibold">Add Material</p>
            </button>
            @endif
        </div>
    </div>
<x-footer />
</body>

</html>