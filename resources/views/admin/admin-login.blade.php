<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Desa Capkala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            padding: 30px;
        }
        .login-container img {
            display: block;
            margin: 0 auto 20px;
            width: 80px;
        }
        .login-container h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-control {
            border: none;
            border-bottom: 2px solid #ccc;
            border-radius: 0;
            height: 45px;
            font-size: 14px;
            padding-left: 10px;
            box-shadow: none;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #ccc; /* Tetap netral */
            outline: none; /* Hilangkan efek outline */
        }
        .form-control::placeholder {
            color: #aaa;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            height: 45px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }

        .toast {
            border-radius: 15px !important;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('image/Sambas Logo.png') }}" alt="Logo Kecamatan">
        <h2>Desa Capkala </h2>
        <form action="/adminlogin" method="POST">
            @csrf
            <!-- Username Field -->
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <!-- Password Field -->
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-submit w-100">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000"
            };

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @elseif (session('info'))
                toastr.info("{{ session('info') }}");
            @endif
        });
    </script>
</body>
</html>
