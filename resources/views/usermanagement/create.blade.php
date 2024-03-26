@extends('layouts.app1')
  
@section('title', 'Create Users Account')
  
@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>VOUPRO:VOUCHER PROCESSING AND MONITORING SYSTEM</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="shortcut icon" href="{{ URL::to('admin_assets/img/accounting.png') }}">
  <link rel="shortcut icon" href="{{ URL::to('admin_assets/img/accounting.png') }}" type="image/x-icon">

  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-8 col-md-9"> <!-- Adjust the column width as needed -->
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                  <!-- <img src="admin_assets/img/accounting.png" alt="logo"> -->
                    <h1 class="h4 text-gray-900 mb-4">Add Users</h1>
                  </div>
                  <form action="{{ route('usermanagement.store') }}" method="POST" class="user">
                    @csrf
                <div class="form-group">
                    <label for="exampleInputName" class="form-label">Full Name</label>
                    <input name="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Name" autocomplete="Name">
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Role -->
                <div>               
                    <x-input-label for="role" value="{{ __('Role') }}" />
                    <fieldset class="form-group">
                        <select class="form-select @error('role') is-invalid @enderror" name="role" id="role" required autofocus autocomplete="role">
                            <option selected disabled>User Types</option>
                            <option value="Admin">Admin</option>
                            <option value="Encoder">Encoder</option>
                            <option value="Document Representative">Document Representative</option>
                            <option value="Pre-Audit">Pre-Audit</option>
                            <option value="Post-Audit">Post-Audit</option>
                            <option value="Releasing">Releasing</option>
                        </select>
                            <div class="form-control-icon">
                                <i class="bi bi-exclude"></i>
                            </div>
                    </fieldset>
                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail" class="form-label">Email Address</label>
                    <input name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Email Address" autocomplete="Email">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                  <div id="passwordHelp" class="form-text">Must be 8-20 characters long, Input atleast 1 number and letters with Upper and Lowe case.</div>
                  @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" id="exampleRepeatPassword" placeholder="Repeat Password">
                  @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
              </form>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
@endsection