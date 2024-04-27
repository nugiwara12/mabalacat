<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Portal</title>
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('admin_assets/css/forgot-password.css') }}" rel="stylesheet"> -->
    <link rel="shortcut icon" href="{{ URL::to('admin_assets/img/logo.png') }}">
    <link rel="shortcut icon" href="{{ URL::to('admin_assets/img/logo.png') }}" type="image/x-icon">
    <!-- CSS -->
    <link href="{{ asset('admin_assets/css/forgot.css') }}" rel="stylesheet">
</head>

<body>



    <body>
        <div class="wrapper">
            <div class="text-center">
                <img class="title-logo" src="admin_assets/img/logo.png" alt="logo">
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
            </div>
            <form class="user" method="POST" action="/new-password">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputEmail" class="form-label">Email Address</label>
                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                        aria-describedby="emailHelp" placeholder="Enter Email Address...">
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-user">Reset Password</button>
            </form><br>
            <div class="text-center">
                <a class="form-label" href="login">Back to Login</a>
            </div>
            <hr>
        </div>
    </body>

</body>

</html>