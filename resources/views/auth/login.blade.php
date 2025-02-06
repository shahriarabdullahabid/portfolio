<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" href="{{ asset('images/logo2.jpg') }}" type="image/png">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background-color: #f4f4f4;
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
            margin-right: 10px;
        }

        .container {
            display: flex;
            max-width: 1000px;
            width: 90%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .left-section {
            flex: 1;
            position: relative;
            background: url('{{ asset('images/admin2.jpg') }}') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            padding: 50px;
        }
        .left-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(11, 75, 86, 0.156); 
        }
        .left-section-content {
            position: relative;
            z-index: 1;
        }
        .left-section h2 {
            font-size: 48px; 
            font-weight: bold;
            margin-bottom: 10px;
            color: #ffffff; 
            font-family: 'Poppins', sans-serif;
            text-shadow: 4px 4px 12px rgba(0, 0, 0, 0.4); 
        }

        .left-section p {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .right-section {
            flex: 1;
            background: radial-gradient(circle, rgba(255,255,255,1) 20%, rgba(104, 129, 198, 0.3) 100%);
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .right-section .user-icon {
            font-size: 60px;
            color: #1a73e8;
            margin-bottom: 20px;
        }

        .error {
            color: #ff4d4d;
            font-size: 16px;
            margin-bottom: 20px;
            background-color: rgba(255, 77, 77, 0.1);
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .error i {
            margin-right: 10px;
            color: #ff4d4d;
        }

        
        .success {
            color: #28a745; 
            font-size: 16px;
            margin-bottom: 20px;
            background-color: rgba(40, 167, 69, 0.1); 
            padding: 10px;
            border-radius: 5px;
            display: flex;
            align-items: center;
        }

        .success i {
            margin-right: 10px;
            color: #28a745;
        }

        .right-section h2 {
            font-size: 32px;
            font-weight: bold;
            color: #000;
            margin-bottom: 30px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        }

        .input-group {
            width: 100%;
            max-width: 350px;
            margin-bottom: 20px;
            position: relative;
        }
        .input-group input {
            width: 100%;
            padding: 15px;
            padding-left: 45px;
            border: none;
            border-radius: 30px;
            background: #f3f3f3;
            font-size: 16px;
            color: #000;
            outline: none;
            box-shadow: inset 0 0 10px rgba(0,0,0,0.1);
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #aaa;
        }

        .login-btn {
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

        .login-btn:hover {
            background: #003c8f;
        }

        .footer {
            margin-top: 30px;
            font-size: 16px;
            color: #555;
            text-align: center;
        }

        .forgot-password-link {
            color: #1a73e8;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.2s ease;
        }

        .forgot-password-link:hover {
            color: #003c8f;
            transform: translateY(-2px);
        }

        .forgot-password-link:focus {
            outline: none;
            text-decoration: underline;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                width: 100%;
            }
            .left-section, .right-section {
                flex: none;
                width: 100%;
                padding: 20px;
            }
            .webcraft-logo {
                font-size: 2.5rem;
            }
            .left-section h2 {
                font-size: 36px;
            }
            .right-section h2 {
                font-size: 28px;
            }
            .input-group input {
                padding-left: 40px;
                font-size: 14px;
            }
            .login-btn {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="left-section">
            <div class="admin-section">
               
                <div class="webcraft-logo">
                    <i class="fas fa-code"></i> <span>Portfolio Lab</span>
                </div>
                <h2>Welcome Back!</h2>
                <p>Manage your portfolio content and stay updated with the latest projects and posts.</p>
            </div>
        </div>
        <div class="right-section">
            <i class="fas fa-user-circle user-icon"></i>
            <h2>Login</h2>

            <!-- Display success message if session contains success -->
            @if(session('success'))
            <div class="success" id="success-message">
                <i class="fas fa-check-circle"></i> 
                {{ session('success') }}
            </div>
            @endif

            <!-- Display error message if session contains error -->
            @if(session('error'))
            <div class="error" id="error-message">
                <i class="fas fa-exclamation-triangle"></i> 
                {{ session('error') }}
            </div>
            @endif


            @if ($errors->has('access'))
            <p style="color: red;"> <strong>Error:</strong> {{ $errors->first('access') }} </p>
            @endif
        
            <!-- Login Form -->
            <form action="{{ route('login.process') }}" method="POST">
                @csrf
                <!-- Username Input -->
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="Username" required value="{{ old('username') }}">
                </div>
                <!-- Password Input -->
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <!-- Login Button -->
                <button type="submit" class="login-btn">Login</button>
            </form>

             <!-- Forgot Password Link -->
             <div class="footer">
                <p>Forgot your password? 
                    <a href="/forgot-login" class="forgot-password-link">Click here</a> to reset it.
                </p>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to hide success and error messages when clicking outside of them
        document.addEventListener('click', function(event) {
            const errorMessage = document.getElementById('error-message');
            const successMessage = document.getElementById('success-message');
            
            if (errorMessage && !errorMessage.contains(event.target)) {
                errorMessage.style.display = 'none';
            }

            if (successMessage && !successMessage.contains(event.target)) {
                successMessage.style.display = 'none';
            }
        });
    </script>
</body>
</html>