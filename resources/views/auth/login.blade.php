<!DOCTYPE html>
<html>
<head>
    <title>Login - Sow & Borrow</title>
    <style>
        body {
            background: url(images/pic1.png) no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end; 
            align-items: center;
            height: 100vh;
            position: relative;
        }

        .container {
            position: relative;
            margin-right: 40px; 
            border: 1px solid gray;
            width: 380px;
            height: 450px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.4);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(33, 33, 33, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .header {
            margin-bottom: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .body p {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #00000076;
            text-align: center;
            margin-bottom: 20px;
        }

        #user,
        #pass {
            width: 228px;
            height: 40px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 17px;
            padding-left: 5px;
            margin-bottom: 10px;
        }

        .checkbox-container {
            display: inline-flex;
            align-items: center;
            margin-bottom: 15px;
        }

        #check {
            margin-right: 5px;
        }

        #keep {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 13px;
            margin: 0;
        }

        #button1 {
            width: 228px;
            height: 40px;
            background-color: #4CAF50;
            border: none;
            color: white;
            border: 0.5px #02224a solid;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 17px;
            cursor: pointer;
            margin-bottom: 15px;
        }

        #access,
        #help {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 13px;
            text-decoration: none;
            text-align: center;
            display: block;
            color: #02224a;
            margin-bottom: 2px;
        }

        #access:hover,
        #help:hover {
            text-decoration: underline;
        }

        #button2 {
            width: 228px;
            height: 40px;
            margin-top: 10px;
            background-color: #f44336;
            border: none;
            color: white;
            border: 0.5px #02224a solid;
            border-radius: 4px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 17px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="body">
                <p><b>Sign in to your account</b></p>

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="text" id="user" name="email" placeholder="Email or number" required>
                    <input type="password" id="pass" name="password" placeholder="Password" required>
                    <div class="checkbox-container">
                        <input type="checkbox" id="check" name="remember">
                        <label for="check" id="keep">Keep me signed in</label>
                    </div>
                    <input type="submit" id="button1" value="Sign In">
                </form>

                <form action="{{ route('register') }}" method="GET">
                    <input type="submit" id="button2" value="Create Account">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
