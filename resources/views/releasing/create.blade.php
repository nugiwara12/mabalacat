@extends('layouts.app1')
  
@section('title', 'Create Releasing Users')
  
@section('contents')
    <form action="{{ route('releasings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="Fname" class="form-control form-control-user @error('Fname')is-invalid @enderror" placeholder="Enter First Name">
                <div class="invalid-feedback">
                    Please provide valid First Name.
                </div>
            </div>
            <div class="col">
                <input type="text" name="Lname" class="form-control form-control-user @error('Lname')is-invalid @enderror" placeholder="Enter Last Name">
                <div class="invalid-feedback">
                    Please provide valid Last Name.
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="email" name="email_address" class="form-control form-control-user @error('email_address')is-invalid @enderror" placeholder="Enter Email Address">
                <div class="invalid-feedback">
                    Please provide valid Email.
                </div>
            </div>
            <div class="col">
                <input type="number" name="Phone_number" class="form-control form-control-user @error('Phone_number')is-invalid @enderror" placeholder="Enter Phone Number">
                <div class="invalid-feedback">
                    Please provide valid phone number.
                </div>
            </div>
            <div class="col">
                <input type="text" name="Role" class="form-control" value="Releasing" readonly>
            </div>
        </div>
 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Submit">Submit</button>
            </div>
        </div>
    </form>
@endsection