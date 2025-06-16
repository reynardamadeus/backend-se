<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('styles/styleforgotpassword.css')}}" />
    <title>Forgot Password</title>
</head>
<body>
    <form class="forgot-password-container" action="{{route('password.reset')}}" method="POST">
        @csrf
        <h2>Forgot Your Password</h2>
        <p>Please enter the email address you'd like password reset information sent to</p><br>

        <label for="Password">Enter New Password</label>
        <input type="password" id="Password" name="password"  required>
        @error('password')
            <div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ $message}}
            </div>
        @enderror

        <input type="hidden" name="email" value="{{$email}}"  required>
        <label for="password_confirm">Confirm Password</label>
        <input type="password" id="password_confirm" name="password_confirmation"  required>
        <button type="submit" class="btn">save</button>
    </form>
</body>
</html>
