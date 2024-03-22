<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            text-align: center;
            padding-top: 100px;
        }
        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #333;
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #666;
        }
        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            transition: background-color 0.3s ease;
            margin: 10px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .login-links {
            margin-top: 50px;
        }
        .login-links a {
            display: inline-block;
            margin: 0 10px;
            padding: 12px 24px;
            background-color: #fff;
            color: #007bff;
            border: 2px solid #007bff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .login-links a:hover {
            background-color: #007bff;
            color: #fff;
        }
      
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Your Student Management System</h1>
        <p>Manage your academic journey seamlessly with our comprehensive Student Management System. From course enrollment to grade tracking, we've got you covered!</p>
        <div class="login-links">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="button">Go to Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="button">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</body>
</html>
