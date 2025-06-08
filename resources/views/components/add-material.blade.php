<div class="form_popup" id="add_material_popup">
    <form class="login-container" action="{{route('material.create')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <button type="button" class="close-btn" onclick="closeMaterialAdd()">&times;</button>
        <h2 class="text-3xl font-bold">Add Material</h2><br>
        <input class="inputForm" type="file" required name="image" value="{{old('image')}}"><br>
        <input class="inputForm" type="text" placeholder="Name" required name="name" value="{{old('name')}}">
        <label for="kelasSelect" class="text-[16px] font-bold">Pilih Kelas:</label>
        <select id="kelasSelect" name="class">
            <option value="">-- Pilih Kelas --</option>
            <option value="SD - Kelas 1">SD - Kelas 1</option>
            <option value="SD - Kelas 2">SD - Kelas 2</option>
            <option value="SD - Kelas 3">SD - Kelas 3</option>
            <option value="SD - Kelas 4">SD - Kelas 4</option>
            <option value="SD - Kelas 5">SD - Kelas 5</option>
            <option value="SD - Kelas 6">SD - Kelas 6</option>
            <option value="SMP - Kelas 1">SMP - Kelas 1</option>
            <option value="SMP - Kelas 2">SMP - Kelas 2</option>
            <option value="SMP - Kelas 3">SMP - Kelas 3</option>
            <option value="SMA - Kelas 1">SMA - Kelas 1</option>
            <option value="SMA - Kelas 2">SMA - Kelas 2</option>
            <option value="SMA - Kelas 3">SMA - Kelas 3</option>
        </select>
        <button type="submit" class="sign_in py-2 px-12 rounded-full text-white hover:bg-blue-700 mt-4">Add Material</button><br>
    </form>
</div>