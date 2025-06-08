<div class="form_popup" id="login_popup"> <!-- login -->
    <form class="login-container" action="{{route('login')}}" method="POST">
        @csrf
        <button type="button" class="close-btn" onclick="closeLogin()">&times;</button>
        <h2 class="text-3xl font-bold">Log In</h2><br>
        <input class="inputForm" type="email" placeholder="Email Address" required name="email" value="{{old('email')}}"><br>
        <input class="inputForm" type="password" placeholder="Password" required name="password" value="{{old('password')}}">

        <a href="/forgot-password-web" class="forgot-password">Forgot Password?</a>
        <button type="submit" class="sign_in py-2 px-12 rounded-full text-white hover:bg-blue-700 mt-4">Sign-In</button><br>
        <p class="createAcc mt-3">Not an education member yet?
            <a class="underline-offset-1 hover:underline" onclick="openSignup();">Create an Account</a>
        </p>
    </form>
</div>
@if ($errors->any())
<div class="mt-4 text-red-600">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (session('success'))
<div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
    {{ session('success') }}
</div>
@endif

<!-- Display error message -->
@if (session('error'))
<div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
    {{ session('error') }}
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Auto-open signup popup if there are validation errors or session flags
        @if ($errors->any() || session('show_login_popup') || session('success'))
            openLogin();
        @endif
    
    });
</script>