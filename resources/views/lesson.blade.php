<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('styles/stylelesson.css')}}" />
    <link rel="stylesheet" href="{{asset('styles/styledashboard.css')}}" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="{{asset('js/systemdashboard.js')}}"></script>
    <script src="{{asset('js/test.js')}}"></script>
    <script src="{{asset('js/createCourse.js')}}" defer></script> -->
    <title>Lesson</title>
</head>
<body class="bg-white min-h-screen flex flex-col">

    

    <div class="bg-sky-300 w-full h-24 flex items-center justify-center"><!--batas header-->
   

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
            <img src="lens logo.png" alt="Search Button">
            <!-- <script src="systemdashboard.js"></script> -->
        </div>
    </div>

    <div class="bg-white-100 w-full h-full border-b-2 border-black flex items-center justify-start">
        <a href="Dashboard.html">
            <img class="w-12 h-12" src="images/other/android-arrow-back (1).png" alt="back">
        </a>
        <label class="font-serif text-2xl">Mathematics</label>
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
                    <button
                        class="flex items-center justify-center py-3 bg-blue-600 text-white font-bold rounded-xl shadow-md hover:bg-blue-700"
                        onclick="getBabName()">Add Video</button>
                    <div class="inputBab" id="textboxInputBab">
                        <label for="nama _bab">Nama Bab:</label>
                        <input type="text" id="nama_bab" name="nama_bab">
                        <label for="video_link">Link video:</label>
                        <input type="text" id="video_link" name="video_link">
                        <button type="button" onclick="handleSubmit()">Submit</button>
                    </div>
                </div>
            </aside>

            <!-- Main content area -->
            <div class="materi_pelajaran flex-1 p-4" id="content">
                <div class="videoContainer">

                </div>
            </div>
        </div>
    </div>

</body>


<!-- <form action="" method="post">
            <div class="mb-3">
                <label for="chapter" class="form-label">Chapter Title</label>
                <input type="text" class="form-control" id="chapter" placeholder="Title">
            </div>
            <label for="editor-container" class="form-label">Content</label>
            <div id="editor-container" class="border p-2 min-h-[200px]"></div>

            <input type="hidden" name="content" id="content">
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> -->
