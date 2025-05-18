<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SiKANDA | Daftar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            overflow: hidden;
        }

        .container {
            width: 350px;
            padding: 20px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            transform: rotate(45deg);
            z-index: -1;
        }

        .container h2 {
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 24px;
        }

        .input-group {
            margin-bottom: 15px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            /* Lebar input 100% dari container */
            padding: 10px 15px 10px 40px;
            /* Padding disesuaikan */
            border: none;
            border-radius: 30px;
            outline: none;
            font-size: 14px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            box-sizing: border-box;
            /* Memastikan padding tidak mempengaruhi lebar total */
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        .btn {
            width: 100%;
            /* Lebar tombol 100% dari container */
            padding: 12px;
            border: none;
            border-radius: 30px;
            background: #2d89ff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            position: relative;
            overflow: hidden;
            box-sizing: border-box;
            /* Memastikan padding tidak mempengaruhi lebar total */
        }

        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%) rotate(45deg);
            transition: 0.5s;
            z-index: 0;
        }

        .btn:hover::after {
            width: 0;
            height: 0;
        }

        .btn:hover {
            background: #1c5ed6;
        }

        .links {
            margin-top: 10px;
            font-size: 14px;
        }

        .links a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .links a:hover {
            color: #2d89ff;
        }

        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            animation: moveBackground 10s infinite linear;
            z-index: -1;
        }

        @keyframes moveBackground {
            0% {
                transform: translateX(-100%) translateY(-100%);
            }

            100% {
                transform: translateX(100%) translateY(100%);
            }
        }
    </style>
</head>

<body>
    <div class="animated-bg"></div>
    <div class="container">
        <h2>Daftar ke SiKANDA</h2>
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
            </div>
            <div class="input-group">
                <i class="fa fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" class="btn">Daftar</button>
        </form>
        <div class="links">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
        </div>
    </div>
</body>

</html>
