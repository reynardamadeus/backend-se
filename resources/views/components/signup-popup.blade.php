<div class="form_popup" id="signup_popup"> <!--Sign Up-->
    <form class="signup-container" method="POST" action="{{route('register')}}">
        @csrf
        <button type="button" class="close-btn" onclick="closeSignup()">&times;</button>

        <h2 class="text-3xl font-bold">Sign Up</h2><br>

        <input class="inputForm" type="text" placeholder="First Name" required name="first_name" value="{{old('first_name')}}">
        <input class="inputForm" type="text" placeholder="Last Name" required name="last_name" value="{{old('last_name')}}">

        <input class="inputForm" type="email" placeholder="Email Address" required name="email" value="{{old('email')}}">
        <input class="inputForm" type="password" placeholder="Password" required name="password" value="{{old('password')}}">

        <button type="submit" class="signup_Form py-2 px-12 rounded-full text-white hover:bg-blue-700">Sign Up</button>
        @if (session('success'))
            <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 roundde">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
    </form>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-open signup popup if there are validation errors or session flags
        @if ($errors->any() || session('show_signup_popup') || session('success'))
            openSignup();
        @endif

    });
</script>
