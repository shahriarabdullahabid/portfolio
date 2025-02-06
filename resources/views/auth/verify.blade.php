<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code</title>
    <link rel="icon" href="{{ asset('images/logo2.jpg') }}" type="image/png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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

        .form-container {
            background: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            background: radial-gradient(circle, rgba(255,255,255,1) 20%, rgba(104, 129, 198, 0.3) 100%);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555555;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn {
            width: 100%;
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
        .btn.resend {
            background-color: #003c8f;
            display: none; /* Initially hidden */
        }

        

        .message {
            text-align: center;
            font-size: 14px;
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .message.error {
            font-size: 16px;
            font-weight: bold;
            color: red;
            margin-bottom: 15px;
        }

        .message.success {
            color: #0f5132;
            background-color: #d1e7dd;
            border: 1px solid #badbcc;
        }

        a {
            color: #1a73e8;
            text-decoration: none;
            font-size: 14px;
            display: block;
            margin-top: 15px;
        }

        /* Timer Style */
        #timer {
            font-size: 16px;
            font-weight: bold;
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <div class="webcraft-logo">
        <i class="fas fa-code"></i> <span>Portfolio Lab</span>
    </div>

    <div class="form-container">
        <h2>Enter Verification Code</h2>

        <!-- Display success or error message -->
        @if(session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif



        <form action="{{ route('post-verify-code') }}" method="POST">
            @csrf

            
            <input type="text" id="code" name="code" required placeholder="Verification code" value="{{ old('code') }}">

            <button type="submit" class="btn" id="verify-btn">Verify Code</button>
        </form>

        <!-- Display validation errors -->
        @if ($errors->has('code'))
            <div class="message error">
                {{ $errors->first('code') }}
            </div>
        @endif

        <!-- Timer -->
        <div id="timer" style="padding-top: 20px;">YOUR CODE EXPIRES IN 1:00</div>


        <form action="{{ route('resend-verification-code') }}" method="POST">
            @csrf
            <button type="submit" class="btn resend" id="resend-btn">Resend Verification Code</button>
        </form>

        <a href="{{ route('forgot-login') }}">Back to Forgot Password</a>
    </div>




    <script>
        window.onload = function () {
            let timerElement = document.getElementById("timer");
            let verifyButton = document.getElementById("verify-btn");
            let resendButton = document.getElementById("resend-btn");
            let errorMessage = document.querySelector(".message.error");

            if (errorMessage) {
                // If an error exists, disable Verify button and show Resend button, no timer
                verifyButton.style.display = "none"; // Hide verify button
                resendButton.style.display = "block"; // Show resend button
                timerElement.textContent = ""; // Show error message in place of timer
                document.getElementById('code').disabled = true;

            } else {
                // If no error, start the timer
                startTimer();
            }
        };

        function startTimer() {
            let timeLeft = 60; // 1 minute
            let timerElement = document.getElementById("timer");
            let verifyButton = document.getElementById("verify-btn");
            let resendButton = document.getElementById("resend-btn");

            let countdown = setInterval(() => {
                let minutes = Math.floor(timeLeft / 60);
                let seconds = timeLeft % 60;
                let formattedSeconds = seconds < 10 ? "0" + seconds : seconds;
                timerElement.textContent = `YOUR CODE EXPIRES IN ${minutes}:${formattedSeconds}`;

                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    timerElement.textContent = "YOUR CODE HAS EXPIRED! Please request a new one.";
                    verifyButton.style.display = "none"; // Hide verify button
                    resendButton.style.display = "block"; // Show resend button
                    document.getElementById('code').disabled = true;

                }

                timeLeft--;
            }, 1000);
        }
    </script>




</body>
</html>
