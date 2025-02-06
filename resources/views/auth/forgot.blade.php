<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Verification Code</title>
    <link rel="icon" href="{{ asset('images/logo2.jpg') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
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

        .form-container {
            background: #ffffff;
            padding: 25px 35px;
            border-radius: 10px;
            background: radial-gradient(circle, rgba(255,255,255,1) 20%, rgba(104, 129, 198, 0.3) 100%);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: 0.3s ease-in-out;
        }

        
        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,1) 20%, rgba(104, 129, 198, 0.3) 100%);
            z-index: -1;
            transition: 0.3s ease-in-out;
        }

        

        .form-container h2 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 1.8rem;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
            font-size: 1rem;
            font-weight: bold;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        
        .submit-btn {
            width: 100%;
            max-width: 350px;
            padding: 15px;
            border: none;
            background: linear-gradient(135deg, #1a73e8, #003c8f);
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            border-radius: 30px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .submit-btn:hover {
            background: #003c8f;
        }

        .message {
            text-align: center;
            font-size: 1rem;
            margin-top: 10px;
        }

        .message.error {
            color: red;
        }

        .message.success {
            color: green;
        }
    </style>
</head>
<body>

   
    <div class="webcraft-logo">
        <i class="fas fa-code"></i> <span>Portfolio Lab</span>
    </div>

    <div class="form-container">
        <h2>Enter Your Registered Email</h2>
        <form action="{{ route('send-code') }}" method="POST">
            @csrf
           
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="submit-btn">Request Verification Code</button>

            <!-- Display error messages -->
            @if (session('error'))
                <div class="message error">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Display success messages -->
            @if (session('success'))
                <div class="message success">
                    {{ session('success') }}
                </div>
            @endif
        </form>
    </div>

</body>
</html>
