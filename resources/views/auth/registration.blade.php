<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School System - Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #6c757d;
            --success-color: #28a745;
            --danger-color: #dc3545;
            --background-color: #f8f9fa;
            --text-color: #333;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background-color: var(--background-color);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            display: flex;
            width: 900px;
            overflow: hidden;
        }

        .left-side {
            flex: 1;
            background-image: url('/api/placeholder/450/600');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0;
            height: auto;
        }

        .right-side {
            flex: 1;
            padding: 40px;
        }

        .card-header {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 700;
            color: var(--primary-color);
            font-size: 24px;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 400;
            line-height: 1.5;
            color: var(--text-color);
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 8px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            margin-bottom: 20px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 12px 16px;
            font-size: 16px;
            font-weight: 500;
            color: #fff;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004a9b;
        }

        .text-center {
            text-align: center;
        }

        .text-danger {
            color: var(--danger-color);
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.15s ease-in-out;
        }

        a:hover {
            color: #0056b3;
        }

        @media (max-width: 767px) {
            .container {
                flex-direction: column;
                width: 90%;
            }

            .left-side {
                height: 200px;
            }
        }
    </style>
</head>
<body>
<main class="signup-form">
    <div class="container">
        <div class="left-side">
        <img src="{{ asset('pics/left-image.png') }}" alt="Student illustration" style="max-width: 100%; height: auto;">
        </div>
        <div class="right-side">
            <h3 class="card-header">Student Registration</h3>
            <div class="card-body">
                <form action="{{ route('register.custom') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="Name" id="name" class="form-control" name="name" required autofocus>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="text" placeholder="Email" id="email_address" class="form-control" name="email" required autofocus>
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Sign up</button>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</body>
</html>