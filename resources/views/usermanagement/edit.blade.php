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
                        <option value= "Admin">Admin</option>
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
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ $users->email }}"  required>
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