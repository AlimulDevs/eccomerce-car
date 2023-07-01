<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    <link href="{{asset('bootstrap/assets/css/custom.css')}}" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Login Page
                <hr width="200px">
            </div>
            <div class="card-body">
                <form action="/login" method="POST" class="form">
                    @csrf
                    <div class="col-input">

                        <input type="email" placeholder="email" name="email" class="input">
                        <input type="password" placeholder="password" name="password" class="input">
                    </div>

                    <div class="form-button">
                        <button type="submit">SIGN IN</button>
                    </div>

                </form>

            </div>
            <div class="card-footer">
                <div class="link">No have an account? <a href="/registerIndex" class="link-sign-in">Sign Up</a></div>
            </div>
        </div>
    </div>



</html>