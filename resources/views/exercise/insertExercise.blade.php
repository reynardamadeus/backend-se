<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('styles/styledashboardprofile.css')}}" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="{{asset('js/systemdashboard.js')}}"></script>
    <title>Dashboard</title>
    <script src="{{asset('js/test.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css">
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="{{asset('js/createCourse.js')}}" defer></script>
    <script>
        const uploadUrl = "{{ route('quill.image.upload') }}";
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-white min-h-screen flex flex-col">
    <x-header />
        <div class="bg-gray-100 p-8">
            <div class="w-full mx-auto bg-white p-6 shadow-md rounded-lg">
                <h1 class="text-xl font-bold mb-4">Insert Exercise Content</h1>
                <!-- Start of Form -->
                <form id="editor-form" method="POST" action="{{ route('exercise.content.create', $id) }}" onsubmit="return submitQuillContent();">
                    @csrf
                    <!-- Quill Editor Container -->
                    <div id="editor-container" class="border p-2 min-h-[200px]"></div>

                    <!-- Hidden Input for Form Submission -->
                    <input type="hidden" name="content" id="content_input">

                    <br>
                    <button type="submit"
                        class="btn btn-primary flex items-center justify-center p-3 bg-sky-300 text-black font-normal rounded-xl shadow-md hover:bg-blue-700">
                        Submit
                    </button>
                </form>
                <!-- End of Form -->
            </div>
        </div>
    <x-footer />
</body>

</html>
