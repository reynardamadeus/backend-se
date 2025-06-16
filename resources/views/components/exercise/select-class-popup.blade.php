<div class="form_popup bg-gradient-to-b from-[#72C5E0] via-white to-[#72C5E0]" id="classSelectionPopup"> 
    <div class="bg-white/50 backdrop-blur-lg p-8 rounded-xl shadow-lg w-96 text-center">
        <button type="button" class="close-btn" onclick="closeClassSelection()">&times;</button>
        <h2 class="text-xl font-bold text-black mb-6">Select Level</h2>
        <div class="space-y-4">
            <button class="w-full py-3 bg-white text-black font-bold rounded-xl 
                shadow-md hover:bg-gray-200" onclick="openClassSelectionSD(),closeClassSelection()">SD</button>
            <button class="w-full py-3 bg-white text-black font-bold rounded-xl 
                shadow-md hover:bg-gray-200"
                onclick="openClassSelectionSMP(),closeClassSelection()">SMP</button>
            <button class="w-full py-3 bg-white text-black font-bold rounded-xl 
                shadow-md hover:bg-gray-200"
                onclick="openClassSelectionSMA(),closeClassSelection()">SMA</button>
        </div>
    </div>
</div>