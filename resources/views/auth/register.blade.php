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
                Register Page
                <hr width="200px">
            </div>
            <div class="card-body">
                <form action="/register" method="POST" class="form">
                    @csrf
                    <div class="col-input">
                        <input placeholder="name" name="name" type="text" class="input">
                        <input type="email" placeholder="email" name="email" class="input">
                        <input type="password" placeholder="password" name="password" class="input">
                    </div>
                    <div class="form-footer">
                        <input type="checkbox" class="checkbox">
                        <p>I agree the <span>Terms and Conditions</span> </p>
                    </div>
                    <div class="form-button">
                        <button type="submit">SIGN UP</button>
                    </div>

                </form>

            </div>
            <div class="card-footer">
                <div class="link">Already have an account? <a href="/loginIndex" class="link-sign-in">Sign in</a></div>
            </div>
        </div>
    </div>



</html>