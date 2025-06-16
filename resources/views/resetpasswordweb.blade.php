<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('styles/styleforgotpassword.css')}}" />
    <title>Forgot Password</title>
</head>
<body>
    <form class="forgot-password-container" action="{{route('forgot.password.request')}}" method="POST">
        @csrf
        <h2>Forgot Your Password</h2>
        <p>Please enter the email address you'd like password reset information sent to</p><br>

        <label for="Email">Enter Email address</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
        @if (session('success'))
            <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success')}}
            </div>
        @endif

        @if (session('email'))
            <div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('email') }}
            </div>
        @endif
        <button type="submit" class="btn">Request reset link</button>
        <a href="/" class="back-to-login">Back To Login</a>
    </form>
</body>
</html>
