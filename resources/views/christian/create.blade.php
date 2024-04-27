@extends('layouts.app1')

@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Grade of Christian Joseph Sarmiento</div>

                <div class="card-body">
                    <form action="{{ route('christians.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Full Name</label>
                            <input type="text" name="username" id="username"
                                class="form-control @error('username') is-invalid @enderror" required>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email_address">Email Address</label>
                            <input type="email" name="email_address" id="email_address"
                                class="form-control @error('email_address') is-invalid @enderror" required>
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
                                class="form-control @error('LRN_number') is-invalid @enderror" required>
                            @error('LRN_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- New input fields -->
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select name="subject" id="subject"
                                class="form-control @error('subject') is-invalid @enderror">
                                <option value="" selected disabled>Select Subject</option>
                                <option value="Math">Math</option>
                                <option value="Science">Science</option>
                                <option value="Pe">Pe</option>
                                <option value="Capstone">Capstone</option>
                            </select>
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="text" name="grade" id="grade"
                                class="form-control @error('grade') is-invalid @enderror">
                            @error('grade')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="teacher_name">Teacher Name</label>
                            <input type="text" name="teacher_name" id="teacher_name"
                                class="form-control @error('teacher_name') is-invalid @enderror">
                            @error('teacher_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- End of new input fields -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection