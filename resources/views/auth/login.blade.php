<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shell - Login</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
</head>
<body>
    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px #eee inset !important;
        }

        input:-webkit-autofill{
            -webkit-text-fill-color: black !important;
        }

        html {
            height: 100%;
        }
        body {
            margin:0;
            padding:0;
            font-family: sans-serif;
            background: #ECAF0C;
        }

        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: rgb(238,238,238);
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0,0,0,.6);
            border-radius: 10px;
        }

        .login-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #ECAF0C;
            text-align: center;
        }

        .login-box .user-box {
            position: relative;
        }

        .login-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #ECAF0C;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #ECAF0C;
            outline: none;
            background: transparent;
        }
        .login-box .user-box label {
            position: absolute;
            top:-20px;
            left: 0;
            padding: 10px 0;
            font-size: 12px;
            color: #ECAF0C;
            pointer-events: none;
            transition: .5s;
        }


        .login-box form button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #ECAF0C;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .login-box button:hover {
            background: #ECAF0C;
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px #ECAF0C,
            0 0 25px #ECAF0C,
            0 0 50px #ECAF0C,
            0 0 100px #ECAF0C;
        }

        .login-box button span {
            position: absolute;
            display: block;
        }

        .login-box button span:nth-child(1) {
            top: 0;
            left: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ECAF0C);
            animation: btn-anim1 1s linear infinite;
        }

        @keyframes btn-anim1 {
            0% {
                left: -100%;
            }
            50%,100% {
                left: 100%;
            }
        }

        .login-box button span:nth-child(2) {
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg, transparent, #ECAF0C);
            animation: btn-anim2 1s linear infinite;
            animation-delay: .25s
        }

        @keyframes btn-anim2 {
            0% {
                top: -100%;
            }
            50%,100% {
                top: 100%;
            }
        }

        .login-box button span:nth-child(3) {
            bottom: 0;
            right: -100%;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg, transparent, #ECAF0C);
            animation: btn-anim3 1s linear infinite;
            animation-delay: .5s
        }

        @keyframes btn-anim3 {
            0% {
                right: -100%;
            }
            50%,100% {
                right: 100%;
            }
        }

        .login-box button span:nth-child(4) {
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg, transparent, #ECAF0C);
            animation: btn-anim4 1s linear infinite;
            animation-delay: .75s
        }

        @keyframes btn-anim4 {
            0% {
                bottom: -100%;
            }
            50%,100% {
                bottom: 100%;
            }
        }

        .checkbox-label {
            color: #fff;
        }

        .checkbox:checked ~ .checkbox-label {
            color: #ECAF0C;
        }
    </style>

    <main>
        <div class="login-box">
            <h2>Login</h2>
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="user-box">
                    <input type="text" name="email" id="email" placeholder="email" required>
                    <label for="email">Մուտքանուն</label>
                </div>
                <div class="user-box">
                    <input type="password" name="password" id="password" placeholder="password" required>
                    <label for="password">Գաղտնաբառ</label>
                </div>
                <div class="form-check">
                    <input name="remember" class="checkbox" type="checkbox" id="remember-check" checked>
                    <label class="checkbox-label" for="remember-check">Հիշել</label>
                </div>
                <button>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Login
                </button>
            </form>
        </div>
    </main>
</body>
</html>
