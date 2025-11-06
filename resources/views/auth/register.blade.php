<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>User Register</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ url('/register') }}" method="POST">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <p style="color:red">{{ $message }}</p> @enderror
        <br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <p style="color:red">{{ $message }}</p> @enderror
        <br>

        <label>Password:</label><br>
        <input type="password" name="password">
        @error('password') <p style="color:red">{{ $message }}</p> @enderror
        <br><br>

        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="{{ url('/login') }}">Login here</a></p>
</body>
</html>
