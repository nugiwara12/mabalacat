<!DOCTYPE html>
<html lang="en">

<head>

    <title>Student Portal</title>

    <link rel="shortcut icon" href="{{ URL::to('admin_assets/logo.png') }}">
    <link rel="shortcut icon" href="{{ URL::to('admin_assets/logo.png') }}" type="image/x-icon">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/new-password.css') }}" rel="stylesheet">


</head>


<body>
    <div class="wrapper">
        <div class="text-center">
            <img class="title-logo" src="admin_assets/img/logo.png" alt="logo">
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
        </div>
        <form class="user" method="post" action="reset_password">

            @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
                @endforeach
            </div>
            @endif

            @if(isset($error))
            <div class="alert alert-danger" role="alert">{{ $error }}</div>
            @endif
            @csrf

            {{--                                        <div class="form-group">--}}
            {{--                                            <input type="email" class="form-control form-control-user"--}}
            {{--                                                   id="exampleInputEmail" aria-describedby="emailHelp"--}}
            {{--                                                   placeholder="Retype password" name="email" value="{{ $email }}"
            readonly>--}}
            {{--                                        </div>--}}
            <div class="form-group">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="inputOTP" aria-describedby="otpcode"
                        placeholder="OTP Code" name="otp" @error('otp') style="border: 3px solid #F19E9EFF;" @enderror
                        required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        aria-describedby="emailHelp" placeholder="Password" name="password" @error('password')
                        style="border: 3px solid #F19E9EFF;" @enderror required>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                        aria-describedby="emailHelp" placeholder="Retype password" name="password_confirmation"
                        @error('password') style="border: 3px solid #F19E9EFF;" @enderror required>
                </div>

                <input type="submit" class="btn btn-primary btn-user btn-block" value="Reset password">
            </div>
        </form>
        <hr>
    </div>
</body>


</html>