@extends('layouts.app1')

@section('title', 'Edit Users')

@section('contents')
<hr />
<form action="{{ route('usermanagement.update', $users->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $users->name }}" required>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3">
            <label class="form-label">Role</label>
            <fieldset class="form-group">
                <select class="form-select" name="role" id="role" value="{{ $users->role }}">
                    <option selected disabled>{{ $users->role }}</option>
                    <option value="Admin">Admin</option>
                    <option value="Student-1">Student-1</option>
                    <option value="Student-2">Student-2</option>
                    <option value="Student-3">Student-3</option>
                    <option value="Student-4">Student-4</option>
                    <option value="Student-5">Student-5</option>
                    <option value="Student-6">Student-6</option>
                    <option value="Student-7">Student-7</option>
                    <option value="Student-8">Student-8</option>
                    <option value="Student-9">Student-9</option>
                    <option value="Student-11">Student-11</option>
                    <option value="Student-12">Student-12</option>
                    <option value="Student-13">Student-13</option>
                    <option value="Student-14">Student-14</option>
                    <option value="Student-15">Student-15</option>
                    <option value="Student-16">Student-16</option>
                    <option value="Student-17">Student-17</option>
                    <option value="Student-18">Student-18</option>
                    <option value="Student-19">Student-19</option>
                    <option value="Student-20">Student-20</option>
                    <option value="Student-21">Student-21</option>
                    <option value="Student-22">Student-22</option>
                    <option value="Student-23">Student-23</option>
                    <option value="Student-24">Student-24</option>
                    <option value="Student-25">Student-25</option>
                    <option value="Student-26">Student-26</option>
                    <option value="Student-27">Student-27</option>
                    <option value="Student-28">Student-28</option>
                    <option value="Student-29">Student-29</option>
                    <option value="Student-30">Student-30</option>
                    <option value="Student-31">Student-31</option>
                    <option value="Student-32">Student-32</option>
                    <option value="Student-33">Student-33</option>
                    <option value="Student-34">Student-34</option>
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
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" placeholder="Email Address"
                value="{{ $users->email }}" required>
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button class="btn btn-warning">Update</button>
        </div>

        <div class="d-grid mt-2">
            <a href="{{ route('usermanagement') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</form>
@endsection