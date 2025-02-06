<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Credentials</title>
    <link rel="icon" href="{{ asset('images/logo2.jpg') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        
        .webcraft-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem; 
            font-weight: 700;
            color: #f39c12; 
            font-family: 'Dancing Script', cursive;
            margin-bottom: 20px;
        }

        .webcraft-logo i {
            font-size: 3.5rem; 
            margin-right: 12px;
        }

        .container {
            background-color: white;
            padding: 30px;
            background: radial-gradient(circle, rgba(255,255,255,1) 20%, rgba(104, 129, 198, 0.3) 100%);
            border-radius: 8px;
            width: 350px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .input-field:focus {
            border-color: #4caf50;
            outline: none;
        }

        .btn {
            width: 100%;
            max-width: 350px;
            padding: 15px;
            border: none;
            background: linear-gradient(135deg, #1a73e8, #003c8f);
            color: #fff;
            font-size: 18px;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background: #003c8f;
        }

        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 4px;
            text-align: left;
        }

        .success-message {
            color: green;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .error-message {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .field-error {
            color: red;
            font-size: 14px;
            text-align: left;
            margin-top: -8px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

   
    <div class="webcraft-logo">
        <i class="fas fa-code"></i> <span>Portfolio Lab</span>
    </div>

    <div class="container">
        <h1>Reset Credentials</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="message success-message">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="message error-message">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <form method="POST" action="{{ request()->is('change-credentials') ? route('reset-credentials') : route('update-credentials') }}">
            @csrf

            <!-- New Username Field -->
            <div>
                <input
                    type="text"
                    name="new_username"
                    class="input-field"
                    placeholder="New Username"
                    value="{{ old('new_username') }}"
                    required>
                @error('new_username')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password Field -->
            <div>
                <input
                    type="password"
                    name="password"
                    class="input-field"
                    placeholder="New Password"
                    required>
                @error('password')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn">Reset</button>
        </form>
    </div>

</body>
</html>
