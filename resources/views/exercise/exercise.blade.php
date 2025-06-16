<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{asset('storage/'. $materials->image)}}">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{asset('styles/stylelesson.css')}}" />
    <link rel="stylesheet" href="{{asset('styles/styledashboard.css')}}" />
    <link rel="stylesheet" href="{{asset('styles/addButton.css')}}" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="{{asset('js/systemdashboard.js')}}"></script>
    <script src="{{asset('js/test.js')}}"></script>
    <script src="{{asset('js/addButton.js')}}"></script>
    <title>Lesson</title>
</head>

<div id="header"></div>

<body class="bg-white min-h-screen flex flex-col">
    <x-header />
    <div class="bg-sky-300 w-full h-24 flex items-center justify-between"><!--batas header-->
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
        <x-exercise.select-class-popup />
        <!-- Selection SD -->
        <x-exercise.sd-select-popup />
        <!-- Selection SMP -->
        <x-exercise.smp-select-popup />
        <!-- Selection SMA-->
        <x-exercise.sma-select-popup />
        <!--Search-->
        <form action="{{route('exercise.search')}}" method="post">
            @csrf
            <div class="search-container">
                <input type="text" name="name" placeholder="Find your study materials here...">
                <img src="{{asset('images/lens_logo.png')}}" alt="Search Button">
                <!-- <script src="systemdashboard.js"></script> -->
            </div>
        </form>
    </div>

    <div class="bg-white-100 w-full h-full border-b-2 border-black flex items-center justify-start">
        <a href="{{route('homepage')}}">
            <img class="w-12 h-12" src="{{asset('images/android-arrow-back.png')}}" alt="back">
        </a>
        <label class="font-serif text-2xl">{{$materials->name}}</label>
    </div>
    <div>
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="courseVideos border-r-2 border-black w-1/5">
                <div>
                    <label class="flex items-center justify-center font-bold">
                        List Of Course
                    </label>
                    <div class="listOfVids">
                    </div>
                    <div class="flex items-center justify-center flex-col gap-3 p-2">
                        @forelse ($exercises as $l)
                            <p class="text-sm lg:text-lg text-black  chapter-item underline cursor-pointer" data-target="lesson-{{ $l->id }}"><span class="font-bold">Bab {{ $l->chapter_number }}</span> {{$l->chapter}}</p>
                            @php
                                $videoId = Str::after($l->video, 'embed/');
                                $youtubeUrl = "https://www.youtube.com/watch?v=" . $videoId;
                            @endphp
                                <div class="w-full aspect-video relative">
                                    <iframe
                                        class="w-full"
                                        src="{{$l->video}}"
                                        frameborder="0"
                                        allowfullscreen
                                        >
                                    </iframe>
                                    <a href="{{ $youtubeUrl }}" target="_blank" class="absolute inset-0 z-10 cursor-pointer " title="Watch on YouTube">
                                    </a>
                                </div>
                        @empty
                            <p class="text-sm font-semibold text-gray-700">No Exercises added yet</p>
                        @endforelse
                        @if (Auth::user() != null)
                            @if(Auth::user()->role == "Admin")
                                <button id="openForm" class="subjectBtn flex flex-col items-center cursor-pointer" onclick="getBabName()">
                                    <img src="{{asset('images/add_subject.png')}}" alt="Add Subject" class="w-16 h-16 rounded-full shadow-md">
                                    <p class="text-sm font-semibold text-gray-700">Add Subject</p>
                                </button>
                            @endif
                        @endif
                    </div>
                    <x-exercise.create-subject-popup material-class="{{$materials->id}}"/>
                </div>
            </aside>

            <!-- Main content area -->
            <div class="materi_pelajaran" id="content">
                @foreach ($exercises as $l)
                <div id="lesson-{{ $l->id }}" class="lesson-content hidden">
                    <div class="bg-[#D9D9D9] w-full flex justify-center items-center flex-col py-1">
                        <h2 class="text-sm md:text-xl font-bold">Bab {{ $l->chapter_number }}</h2>
                        <h2 class="text-sm md:text-xl font-normal underline">{{ $l->chapter }}</h2>
                    </div>
                    <div class="prose p-4">
                        @if($l->content != null)
                        {!! $l->content !!}
                        @else

                        @if (Auth::user() != null)
                            @if(Auth::user()->role == "Admin")
                                <a href="{{route('exercise.content.form', $l->id)}}" class="flex items-center justify-center py-3 bg-sky-300 text-black font-normal rounded-xl shadow-md p-3 hover:bg-blue-700 cursor-pointer">Create Content</a>
                            @else
                             <p>The content is not available yet</p>
                            @endif
                        @else
                         <p>The content is not available yet</p>
                        @endif
                        @endif
                    </div>
                    <p class="text-sm md:text-xl font-bold ml-4">Masih bingung? Tonton video ini biar makin jelas!</p>
                    <div class="p-4 w-full aspect-video">
                        <iframe
                            class="w-full h-full"
                            src="{{$l->video}}"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                    </div>
                        </div>
                    @endforeach

                {{-- @if (Auth::user() != null)
                    @if(Auth::user()->role == "Admin")
                        <form id="editor" method="post">
                        <label for="editor-container" class="form-label">Content</label>
                        <div id="editor-container" class="border p-2 min-h-[200px]"></div>
                        <input type="hidden" name="content" id="content_input">
                        <br>
                        <button type="submit"
                            class="btn btn-primary flex items-center justify-center py-3 bg-blue-600 text-white font-bold rounded-xl shadow-md hover:bg-blue-700">Submit</button>
                        </form>
                    @endif
                @else

                @endif --}}

            </div>
        </div>
    </div>

    <x-footer />
</body>

