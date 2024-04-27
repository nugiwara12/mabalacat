<!-- resources/views/christian/create.blade.php -->

@extends('layouts.app1')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Christian</div>

                <div class="card-body">
                    <form action="{{ route('christians.store1') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" name="email_address" id="email_address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" name="section" id="section" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="LRN_number">LRN Number</label>
                            <input type="text" name="LRN_number" id="LRN_number" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection