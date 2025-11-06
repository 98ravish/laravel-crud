<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            background: linear-gradient(135deg, #667eea, #764ba2, #6a11cb, #2575fc);
            background-size: 400% 400%;
            animation: gradientMove 8s ease infinite;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 40px;
            width: 380px;
            color: #fff;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: all 0.4s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(31, 38, 135, 0.55);
        }

        .login-card h2 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.25);
            border: none;
            color: #fff;
            border-radius: 8px;
            padding: 12px;
            transition: 0.3s;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 10px #a18cd1;
            color: #fff;
        }

        .btn-login {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
            border-radius: 8px;
            width: 100%;
            padding: 12px;
            color: #fff;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: 0.4s;
            box-shadow: 0 0 10px rgba(101, 88, 245, 0.5);
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            box-shadow: 0 0 20px rgba(101, 88, 245, 0.8);
            transform: scale(1.03);
        }

        .text-small {
            font-size: 0.9rem;
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #ffd700;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 8px;
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>✨ Welcome Back</h2>
        <p class="text-center mb-4" style="opacity:0.8;">Login to your Admin Dashboard</p>

        @if(session('error'))
            <div class="alert alert-danger p-2">{{ session('error') }}</div>
        @endif

        @if(session('success'))
            <div class="alert alert-success p-2">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                @error('email') <small class="text-warning">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
                @error('password') <small class="text-warning">{{ $message }}</small> @enderror
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <!-- <p class="text-small mt-3">Don’t have an account? <a href="{{ url('/register') }}">Register now</a></p> -->
    </div>

</body>
</html>
