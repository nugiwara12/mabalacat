@extends('layouts.app1')

@section('title', 'Julius')

@section('contents')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('admin_assets/css/modalgrades.css') }}">

<div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('julius.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
        title="Add Grades">Add Grades</a>
</div>

<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<div class="table-responsive">
    <table class="table table-hover" id="example">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email Address</th>
                <th>LRN</th>
                <th>Section</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Teacher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($juliuses->count() > 0)
            @foreach($juliuses as $rs)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $rs->username }}</td>
                <td class="align-middle">{{ $rs->email_address }}</td>
                <td class="align-middle">{{ $rs->LRN_number }}</td>
                <td class="align-middle">{{ $rs->section }}</td>
                <td class="align-middle">{{ $rs->subject }}</td>
                <td class="align-middle">{{ $rs->grade }}</td>
                <td class="align-middle">{{ $rs->teacher_name }}</td>

                <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary detailBtn" data-toggle="modal"
                            data-target="#juliusModal" data-rsid="{{ $rs->id }}" data-placement="top"
                            title="View Details">
                            Detail
                        </button>

                        <a href="{{ route('julius.edit', $rs->id)}}" type="button" class="btn btn-warning"
                            data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                        <form action="{{ route('julius.destroy', $rs->id) }}" method="POST" class="btn btn-danger p-0"
                            onsubmit="return confirm('Delete?')" data-toggle="tooltip" data-placement="top"
                            title="Delete">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="9" class="text-center">No Grades found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>


<div class="modal fade" id="juliusModal" tabindex="-1" role="dialog" aria-labelledby="juliusModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="juliusModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="flex-container" id="juliusContainer">
                    @include('components.modals.juliusModal')
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            // dom: 'Bfrtip',
            // buttons: [
            //     'print',
            //     'excel'
            // ]
        });
    });
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
</footer>
@endsection