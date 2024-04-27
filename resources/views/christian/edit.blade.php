@extends('layouts.app1')

@section('title', 'Edit Christian Grades')

@section('contents')
<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Grade of Christian Joseph Sarmiento</div>

                <div class="card-body">
                    <form action="{{ route('christians.update', $christian->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="username">Full Name</label>
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ $christian->username }}">
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" name="email_address" id="email_address"
                                class="form-control @error('email_address') is-invalid @enderror"
                                value="{{ $christian->email_address }}">
                            @error('email_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <input type="text" name="section" id="section" class="form-control" value="ICT-12A"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="LRN_number">LRN Number</label>
                            <input type="text" name="LRN_number" id="LRN_number"
                                class="form-control @error('LRN_number') is-invalid @enderror"
                                value="{{ $christian->LRN_number }}">
                            @error('LRN_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- New input fields -->
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject"
                                class="form-control @error('subject') is-invalid @enderror"
                                value="{{ $christian->subject }}">
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="text" name="grade" id="grade"
                                class="form-control @error('grade') is-invalid @enderror"
                                value="{{ $christian->grade }}">
                            @error('grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="teacher_name">Teacher Name</label>
                            <input type="text" name="teacher_name" id="teacher_name"
                                class="form-control @error('teacher_name') is-invalid @enderror"
                                value="{{ $christian->teacher_name }}">
                            @error('teacher_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- End of new input fields -->
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection