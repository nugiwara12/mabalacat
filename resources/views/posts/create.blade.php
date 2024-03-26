@extends('layouts.app1')
  
@section('title', 'Create Announcements')
  
@section('contents')

<link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://fontawesome.com/icons/folder?f=classic&s=light">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  

<link rel="stylesheet" href="{{ asset('admin_assets/css/announcement.css') }}">

<center>
<body>

<div class="announcement-box">
    <div class="form-container">
        <form action="/posts" method="POST" class="mb-0">
            @csrf
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-input" value="{{ old('title') }}" autofocus required>

            <label for="text" class="form-label">Text</label>
            <textarea id="text" name="text" class="form-input" required>{{ old('text') }}</textarea>

            @if($errors->any())
                <div class="error-container">
                    <ul class="error-message">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="submit-button">Post</button>
        </form>
    </div>
</div>
</center>

</body>
</html>

@endsection