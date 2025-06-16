<div class="form_popup bg-gradient-to-b from-[#72C5E0] via-white to-[#72C5E0]" id="SelectionSMP">
    <div class="bg-white/50 backdrop-blur-lg p-8 rounded-xl shadow-lg w-96 text-center">
        <button type="button" class="close-btn" onclick="closeClassSelectionSMP()">&times;</button>
        <h3 class="text-xl font-bold text-black mb-6">Select Kelas</h3>
        <form action="{{route('material.filter')}}" method="post">
            @csrf
            <div class="space-y-4">
                <label class="block mb-4">
                    <input type="radio" name="kelas" value="SMP - Kelas 1" class="custom-radio w-full py-3 bg-white text-black font-bold rounded-xl
                    shadow-md hover:bg-gray-200" onclick="selectLevel('SMP - Kelas 1')" value="SMP - Kelas 1">
                    <span class="custom-label">Kelas 1</span>
                </label>
                <label class="block mb-4">
                    <input type="radio" name="kelas" value="SMP - Kelas 2" class="custom-radio w-full py-3 bg-white text-black font-bold rounded-xl
                    shadow-md hover:bg-gray-200" onclick="selectLevel('SMP - Kelas 2')" value="SMP - Kelas 2">
                    <span class="custom-label">Kelas 2</span>
                </label>
                <label class="block mb-4">
                    <input type="radio" name="kelas" value="SMP - Kelas 1" class="custom-radio w-full py-3 bg-white text-black font-bold rounded-xl
                    shadow-md hover:bg-gray-200" onclick="selectLevel('SMP - Kelas 3')" value="SMP - Kelas 3">
                    <span class="custom-label">Kelas 3</span>
                </label>
            </div>
            <div class="flex justify-between mt-6">
                <button class="w-24 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-md hover:bg-blue-700 cursor-pointer"
                    onclick="closeClassSelectionSMP(),openClassSelection()">Back</button>
                <button class="w-24 py-3 bg-gray-800 text-white font-bold rounded-xl shadow-md hover:bg-gray-900 cursor-pointer"
                    onclick="closeClassSelectionSMP()" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
