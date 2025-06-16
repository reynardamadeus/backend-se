<div class="form_popup bg-gradient-to-b from-[#72C5E0] via-white to-[#72C5E0]" id="SelectionSD">
    <div class="bg-white/50 backdrop-blur-lg p-8 rounded-xl shadow-lg w-96 text-center">
        <button type="button" class="close-btn" onclick="closeClassSelectionSD()">&times;</button>
        <h2 class="text-xl font-bold text-black mb-6">Select Kelas</h2>
        <form action="{{route('material.filter')}}" method="post">
            @csrf
        <div class="grid grid-cols-2 gap-4">
            <label>
                <input type="radio" name="kelas" value="SD - Kelas 1" class="custom-radio"
                    onclick="selectLevel('SD - Kelas 1')">
                <span class="custom-label">Kelas 1</span>
            </label>
            <label>
                <input type="radio" name="kelas" value="SD - Kelas 2" class="custom-radio"
                    onclick="selectLevel('SD - Kelas 2')">
                <span class="custom-label">Kelas 2</span>
            </label>
            <label>
                <input type="radio" name="kelas" value="SD - Kelas 1" class="custom-radio"
                    onclick="selectLevel('SD - Kelas 3')">
                <span class="custom-label">Kelas 3</span>
            </label>
            <label>
                <input type="radio" name="kelas" value="SD - Kelas 2" class="custom-radio"
                    onclick="selectLevel('SD - Kelas 4')">
                <span class="custom-label">Kelas 4</span>
            </label>
            <label>
                <input type="radio" name="kelas" value="SD - Kelas 1" class="custom-radio"
                    onclick="selectLevel('SD - Kelas 5')">
                <span class="custom-label">Kelas 5</span>
            </label>
            <label>
                <input type="radio" name="kelas" value="SD - Kelas 2" class="custom-radio"
                    onclick="selectLevel('SD - Kelas 6')">
                <span class="custom-label">Kelas 6</span>
            </label>
        </div>
        <div class="flex justify-between mt-6">
            <button class="w-24 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-md hover:bg-blue-700 cursor-pointer"
                onclick="closeClassSelectionSD(),openClassSelection()">Back</button>
            <button class="w-24 py-3 bg-gray-800 text-white font-bold rounded-xl shadow-md hover:bg-gray-900 cursor-pointer"
                onclick="closeClassSelectionSD()" type="submit">Save</button>
        </div>
        </form>
    </div>
</div>
