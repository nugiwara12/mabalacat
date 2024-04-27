<link rel="stylesheet" href="{{ asset('admin_assets/css/modalgrades.css') }}">

@if($joshuas->count() > 0)
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Username</th>
                <th>Email Address</th>
                <th>LRN Number</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Teacher</th>
                <th>Remark</th>
            </tr>
        </thead>
        <tbody>
            @foreach($joshuas as $rs)
            <tr>
                <td>
                    <img class="card-image rounded-circle" src="{{ asset('admin_assets/img/pink.jpg') }}"
                        alt="Piece Image">
                </td>
                <td>{{ $rs->username }}</td>
                <td>{{ $rs->email_address }}</td>
                <td>{{ $rs->LRN_number }}</td>
                <td>{{ $rs->section }}</td>
                <td>{{ $rs->subject }}</td>
                <td>{{ $rs->grade }}</td>
                <td>{{ $rs->teacher_name }}</td>
                <td>{!! $rs->print_action !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<p>No Christians found.</p>
@endif