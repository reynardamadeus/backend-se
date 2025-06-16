<div id="textboxInputBab" class="form_popup items-center justify-center hidden z-50">
    <form
        class="bg-gradient-to-b from-sky-300 via-white to-sky-300 p-10 rounded-xl shadow-lg w-full max-w-sm text-center relative"
        action="{{route('lesson.subject.create', $materialClass)}}" method="POST">
        @csrf
        <h2 class="text-2xl font-bold text-black mb-6">Add Sub Material</h2>
        <div class="flex flex-col items-center mb-6">
            <p class="mt-2 text-sm text-gray-700"></p>
        </div>
        <div class="mb-6 text-left">
            <label class="block text-sm text-gray-700 mb-1" for="nama_bab">Input Chapter
                Name</label>
            <input id="nama_bab"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500"
                type="text" placeholder="Enter chapter name" name="chapter" required />
        </div>
        <div class="mb-6 text-left">
            <label class="block text-sm text-gray-700 mb-1" for="video_link">Enter
                Video Link</label>
            <input id="video_link"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-500"
                type="text" placeholder="Enter Video Link" required  name="video"/>
        </div>
        <button type="submit" class="py-2 px-6 rounded-md text-white bg-cyan-900 hover:bg-cyan-800 cursor-pointer">
            Submit
        </button>
        <button type="button"
            class="absolute top-2 right-2 text-black hover:text-red-500 text-lg font-bold cursor-pointer" onclick="closeaddsubject()">×</button>
    </form>
</div>
