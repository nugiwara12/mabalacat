@extends('layouts.app1')
  
@section('title', 'General Fund')
  
@section('contents')
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">-->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets/css/GeneralIndex.css') }}">


   


<?php /*----------------------------------------Admin-------------------------------------------------------*/ ?>

@if (Auth::user()->role=='Admin')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('general.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add General Funds">Add General Funds</a>
    </div>


    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif


    <form id="filterForm">
    <br>
    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate">

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate">
    <hr>
    <br>
    <label for="dateReceived">Date:</label>
    <input type="date" name="dateReceived" id="dateReceived">
    <br>
    <label for="particulars">Particulars:</label>
    <input type="text" name="particulars" id="particulars">
    <br>
    <label for="netdv">Amount:</label>
    <input type="text" name="netdv" id="netdv">
    <br>
    <button class="filter-button1" type="button" onclick="applyFilter()" data-toggle="tooltip" data-placement="top" title="Filter">Filter</button>
    <button class="filter-button2" type="button" onclick="clearFilter()" data-toggle="tooltip" data-placement="top" title="Clear">Clear</button>

    </form>

    


    <table class="table table-hover" id="example" style="width:100%">
        <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Date Received</th>
            <th>Obligation Request No.</th>
            <th>Disbursement Voucher No.</th>
            <th>Dept</th>
            <th>Payee</th>
            <th>Acct.Code (As per budget)</th>
            <th>Acct Name</th>
            <th>Net Dv Amount</th>
            <th>Particulars</th>
            <th>Status</th>
            <th>Transmitted to:</th>
            <th>Remarks</th>
            <th>Date Released</th>
            <th>Check Number</th>
            <th>Date Of Issuance</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($general->count() > 0)
                @foreach($general as $rs)
                <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->dateReceived }}</td>
                        <td class="align-middle">{{ $rs->Obligation }}</td>
                        <td class="align-middle">{{ date('Y-m-', strtotime($rs->created_at)) }} {{ $rs->Disbursement }}</td>
                        <td class="align-middle">{{ $rs->Dept }}</td>
                        <td class="align-middle">{{ $rs->Payee }}</td>
                        <td class="align-middle">{{ $rs->Code }}</td>
                        <td class="align-middle">{{ $rs->Name }}</td>
                        <td class="align-middle">{{ $rs->Netdv }}</td>
                        <td class="align-middle">{{ $rs->Particulars }}</td>
                        <td class="align-middle">{{ $rs->Status }}</td>
                        <td class="align-middle">{{ $rs->Transmittedto }}</td>
                        <td class="align-middle">{{ $rs->Remarks }}</td>
                        <td class="align-middle">{{ $rs->Released }}</td>
                        <td class="align-middle">{{ $rs->Check }}</td>
                        <td class="align-middle">{{ $rs->Issuance }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('general.show', $rs->id) }}" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Details">Detail</a>
                                @if (Auth::user()->role=='Encoder')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <a href="{{ route('generals.show.pdf', $rs->id) }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Generate Reports" target="_blank">Generate Reports</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                                
                                @if (Auth::user()->role=='Admin')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <a href="{{ route('generals.show.pdf', $rs->id) }}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Generate Reports" target="_blank">Generate Reports</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>
    <footer>
    @if (Auth::user()->role=='Admin')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>

    <!-- Include DataTables Buttons extension js for filter date -->
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>

<!-- Include DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<!-- Include DataTables JavaScript -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<!-- Include DataTables Buttons extension -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>

<!-- Include Datepicker library (assuming you are using jQuery UI datepicker) -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    @endif


    @if (Auth::user()->role=='Encoder')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
  <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif


    @if (Auth::user()->role=='Pre-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>
    
    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Post-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>
    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Releasing')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    </footer>
@endsection
@endif

<?php /*----------------------------------------Docrep-------------------------------------------------------*/ ?>

@if (Auth::user()->role=='Document Representative')


    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <form id="filterForm">
    <label for="netdv">Obligation Request No.</label>
    <input type="text" name="netdv" id="netdv">
    <br>
    <button class="filter-button1" type="button" onclick="applyFilter()" data-toggle="tooltip" data-placement="top" title="Filter">Filter</button>
    <button class="filter-button2" type="button" onclick="clearFilter()" data-toggle="tooltip" data-placement="top" title="Clear">Clear</button>
    </form>
    <br>
    <table class="table table-hover" id="example">
        <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Obligation Request No.</th>
            <th>Disbursement Voucher No.</th>
            <th>Status</th>
            <th>Remarks</th>
            <th>Date Released</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($general->count() > 0)
                @foreach($general as $rs)
                <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->Obligation }}</td>
                        <td class="align-middle">{{ date('Y-m-', strtotime($rs->created_at)) }} {{ $rs->Disbursement }}</td>
                        <td class="align-middle">{{ $rs->Status }}</td>
                        <td class="align-middle">{{ $rs->Remarks }}</td>
                        <td class="align-middle">{{ $rs->Released }}</td>
                        
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('general.show', $rs->id) }}" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Details">Detail</a>
                                @if (Auth::user()->role=='Encoder')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                                
                                @if (Auth::user()->role=='Admin')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>
    <footer>

    <!-- Add this script after your HTML code -->
<script>
    function applyFilter() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("netdv");
        filter = input.value.toUpperCase();
        table = document.getElementById("example");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Change index to the column you want to filter
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function clearFilter() {
        document.getElementById("filterForm").reset();
        var table, tr;
        table = document.getElementById("example");
        tr = table.getElementsByTagName("tr");

        for (var i = 0; i < tr.length; i++) {
            tr[i].style.display = "";
        }
    }
</script>

    @if (Auth::user()->role=='Admin')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Encoder')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Pre-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Post-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>
    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Releasing')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>
    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    </footer>
@endsection
@endif



<?php /*----------------------------------------PreAudit-------------------------------------------------------*/ ?>

@if (Auth::user()->role=='Pre-Audit')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('general.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add General Funds">Add General Funds</a>
    </div>


    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <form id="filterForm">
    <br>
    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate">

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate">
    <hr>
    <br>
    <label for="dateReceived">Date:</label>
    <input type="date" name="dateReceived" id="dateReceived">
    <br>
    <label for="particulars">Particulars:</label>
    <input type="text" name="particulars" id="particulars">
    <br>
    <label for="netdv">Amount:</label>
    <input type="text" name="netdv" id="netdv">
    <br>
    <button class="filter-button1" type="button" onclick="applyFilter()" data-toggle="tooltip" data-placement="top" title="Filter">Filter</button>
    <button class="filter-button2" type="button" onclick="clearFilter()" data-toggle="tooltip" data-placement="top" title="Clear">Clear</button>


    </form>
    <table class="table table-hover" id="example">
        <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Date Received</th>
            <th>Obligation Request No.</th>
            <th>Disbursement Voucher No.</th>
            <th>Dept</th>
            <th>Payee</th>
            <th>Acct.Code (As per budget)</th>
            <th>Acct Name</th>
            <th>Net Dv Amount</th>
            <th>Particulars</th>
            <th>Status</th>
            <th>Transmitted to:</th>
            <th>Remarks</th>
            <th>Date Released</th>
            <th>Check Number</th>
            <th>Date Of Issuance</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($general->count() > 0)
                @foreach($general as $rs)
                <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->dateReceived }}</td>
                        <td class="align-middle">{{ $rs->Obligation }}</td>
                        <td class="align-middle">{{ date('Y-m-', strtotime($rs->created_at)) }} {{ $rs->Disbursement }}</td>
                        <td class="align-middle">{{ $rs->Dept }}</td>
                        <td class="align-middle">{{ $rs->Payee }}</td>
                        <td class="align-middle">{{ $rs->Code }}</td>
                        <td class="align-middle">{{ $rs->Name }}</td>
                        <td class="align-middle">{{ $rs->Netdv }}</td>
                        <td class="align-middle">{{ $rs->Particulars }}</td>
                        <td class="align-middle">{{ $rs->Status }}</td>
                        <td class="align-middle">{{ $rs->Transmittedto }}</td>
                        <td class="align-middle">{{ $rs->Remarks }}</td>
                        <td class="align-middle">{{ $rs->Released }}</td>
                        <td class="align-middle">{{ $rs->Check }}</td>
                        <td class="align-middle">{{ $rs->Issuance }}</td>                     
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('general.show', $rs->id) }}" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Details">Detail</a>
                                @if (Auth::user()->role=='Encoder')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif

                                @if (Auth::user()->role=='Pre-Audit')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                @endif
                                
                                @if (Auth::user()->role=='Admin')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>
    <footer>
    @if (Auth::user()->role=='Admin')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Encoder')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>
    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Pre-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Post-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Releasing')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    </footer>
@endsection
@endif




<?php /*----------------------------------------Post-------------------------------------------------------*/ ?>

@if (Auth::user()->role=='Post-Audit')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('general.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add General Funds">Add General Funds</a>
    </div>


    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <form id="filterForm">
    <br>
    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate">

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate">
    <hr>
    <br>
    <label for="dateReceived">Date:</label>
    <input type="date" name="dateReceived" id="dateReceived">
    <br>
    <label for="particulars">Particulars:</label>
    <input type="text" name="particulars" id="particulars">
    <br>
    <label for="netdv">Amount:</label>
    <input type="text" name="netdv" id="netdv">
    <br>
    <button class="filter-button1" type="button" onclick="applyFilter()" data-toggle="tooltip" data-placement="top" title="Filter">Filter</button>
    <button class="filter-button2" type="button" onclick="clearFilter()" data-toggle="tooltip" data-placement="top" title="Clear">Clear</button>


    </form>
    <table class="table table-hover" id="example">
        <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Date Received</th>
            <th>Obligation Request No.</th>
            <th>Disbursement Voucher No.</th>
            <th>Dept</th>
            <th>Payee</th>
            <th>Acct.Code (As per budget)</th>
            <th>Acct Name</th>
            <th>Net Dv Amount</th>
            <th>Particulars</th>
            <th>Status</th>
            <th>Transmitted to:</th>
            <th>Remarks</th>
            <th>Date Released</th>
            <th>Check Number</th>
            <th>Date Of Issuance</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($general->count() > 0)
                @foreach($general as $rs)
                <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->dateReceived }}</td>
                        <td class="align-middle">{{ $rs->Obligation }}</td>
                        <td class="align-middle">{{ date('Y-m-', strtotime($rs->created_at)) }} {{ $rs->Disbursement }}</td>
                        <td class="align-middle">{{ $rs->Dept }}</td>
                        <td class="align-middle">{{ $rs->Payee }}</td>
                        <td class="align-middle">{{ $rs->Code }}</td>
                        <td class="align-middle">{{ $rs->Name }}</td>
                        <td class="align-middle">{{ $rs->Netdv }}</td>
                        <td class="align-middle">{{ $rs->Particulars }}</td>
                        <td class="align-middle">{{ $rs->Status }}</td>
                        <td class="align-middle">{{ $rs->Transmittedto }}</td>
                        <td class="align-middle">{{ $rs->Remarks }}</td>
                        <td class="align-middle">{{ $rs->Released }}</td>
                        <td class="align-middle">{{ $rs->Check }}</td>
                        <td class="align-middle">{{ $rs->Issuance }}</td>                     
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('general.show', $rs->id) }}" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Details">Detail</a>
                                @if (Auth::user()->role=='Encoder')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif

                                @if (Auth::user()->role=='Post-Audit')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                </form>
                                @endif
                                
                                @if (Auth::user()->role=='Admin')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>
    <footer>
    @if (Auth::user()->role=='Admin')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Encoder')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>
    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Pre-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Post-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Releasing')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    </footer>
@endsection
@endif


<?php /*----------------------------------------Releasing-------------------------------------------------------*/ ?>

@if (Auth::user()->role=='Releasing')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('general.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add General Funds">Add General Funds</a>
    </div>


    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <form id="filterForm">
    <br>
    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate">

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate">
    <hr>
    <br>
    <label for="dateReceived">Date:</label>
    <input type="date" name="dateReceived" id="dateReceived">
    <br>
    <label for="particulars">Particulars:</label>
    <input type="text" name="particulars" id="particulars">
    <br>
    <label for="netdv">Amount:</label>
    <input type="text" name="netdv" id="netdv">
    <br>
    <button class="filter-button1" type="button" onclick="applyFilter()" data-toggle="tooltip" data-placement="top" title="Filter">Filter</button>
    <button class="filter-button2" type="button" onclick="clearFilter()" data-toggle="tooltip" data-placement="top" title="Clear">Clear</button>


    </form>
    <table class="table table-hover" id="example">
        <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Date Received</th>
            <th>Obligation Request No.</th>
            <th>Disbursement Voucher No.</th>
            <th>Dept</th>
            <th>Payee</th>
            <th>Acct.Code (As per budget)</th>
            <th>Acct Name</th>
            <th>Net Dv Amount</th>
            <th>Particulars</th>
            <th>Status</th>
            <th>Transmitted to:</th>
            <th>Remarks</th>
            <th>Date Released</th>
            <th>Check Number</th>
            <th>Date Of Issuance</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($general->count() > 0)
                @foreach($general as $rs)
                <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->dateReceived }}</td>
                        <td class="align-middle">{{ $rs->Obligation }}</td>
                        <td class="align-middle">{{ date('Y-m-', strtotime($rs->created_at)) }} {{ $rs->Disbursement }}</td>
                        <td class="align-middle">{{ $rs->Dept }}</td>
                        <td class="align-middle">{{ $rs->Payee }}</td>
                        <td class="align-middle">{{ $rs->Code }}</td>
                        <td class="align-middle">{{ $rs->Name }}</td>
                        <td class="align-middle">{{ $rs->Netdv }}</td>
                        <td class="align-middle">{{ $rs->Particulars }}</td>
                        <td class="align-middle">{{ $rs->Status }}</td>
                        <td class="align-middle">{{ $rs->Transmittedto }}</td>
                        <td class="align-middle">{{ $rs->Remarks }}</td>
                        <td class="align-middle">{{ $rs->Released }}</td>
                        <td class="align-middle">{{ $rs->Check }}</td>
                        <td class="align-middle">{{ $rs->Issuance }}</td>                     
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('general.show', $rs->id) }}" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Details">Detail</a>
                                @if (Auth::user()->role=='Encoder')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif

                                @if (Auth::user()->role=='Releasing')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                @endif
                                
                                @if (Auth::user()->role=='Admin')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>
    <footer>
    @if (Auth::user()->role=='Admin')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Encoder')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Pre-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Post-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Releasing')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    </footer>
@endsection
@endif
<?php /*----------------------------------------Encoder-------------------------------------------------------*/ ?>

@if (Auth::user()->role=='Encoder')
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('general.create') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add General Funds">Add General Funds</a>
    </div>


    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif


    <form id="filterForm">
    <br>
    <label for="startDate">Start Date:</label>
    <input type="date" id="startDate">

    <label for="endDate">End Date:</label>
    <input type="date" id="endDate">
    <hr>
    <br>
    <label for="dateReceived">Date:</label>
    <input type="date" name="dateReceived" id="dateReceived">
    <br>
    <label for="particulars">Particulars:</label>
    <input type="text" name="particulars" id="particulars">
    <br>
    <label for="netdv">Amount:</label>
    <input type="text" name="netdv" id="netdv">
    <br>
    <button class="filter-button1" type="button" onclick="applyFilter()" data-toggle="tooltip" data-placement="top" title="Filter">Filter</button>
    <button class="filter-button2" type="button" onclick="clearFilter()" data-toggle="tooltip" data-placement="top" title="Clear">Clear</button>


    </form>
    <table class="table table-hover" id="example" style="width:100%">
        <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Date Received</th>
            <th>Obligation Request No.</th>
            <th>Disbursement Voucher No.</th>
            <th>Dept</th>
            <th>Payee</th>
            <th>Acct.Code (As per budget)</th>
            <th>Acct Name</th>
            <th>Net Dv Amount</th>
            <th>Particulars</th>
            <th>Status</th>
            <th>Transmitted to:</th>
            <th>Remarks</th>
            <th>Date Released</th>
            <th>Check Number</th>
            <th>Date Of Issuance</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($general->count() > 0)
                @foreach($general as $rs)
                <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->dateReceived }}</td>
                        <td class="align-middle">{{ $rs->Obligation }}</td>
                        <td class="align-middle">{{ date('Y-m-', strtotime($rs->created_at)) }} {{ $rs->Disbursement }}</td>
                        <td class="align-middle">{{ $rs->Dept }}</td>
                        <td class="align-middle">{{ $rs->Payee }}</td>
                        <td class="align-middle">{{ $rs->Code }}</td>
                        <td class="align-middle">{{ $rs->Name }}</td>
                        <td class="align-middle">{{ $rs->Netdv }}</td>
                        <td class="align-middle">{{ $rs->Particulars }}</td>
                        <td class="align-middle">{{ $rs->Status }}</td>
                        <td class="align-middle">{{ $rs->Transmittedto }}</td>
                        <td class="align-middle">{{ $rs->Remarks }}</td>
                        <td class="align-middle">{{ $rs->Released }}</td>
                        <td class="align-middle">{{ $rs->Check }}</td>
                        <td class="align-middle">{{ $rs->Issuance }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('general.show', $rs->id) }}" type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="top" title="View Details">Detail</a>
                                @if (Auth::user()->role=='Encoder')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                                
                                @if (Auth::user()->role=='Admin')
                                <a href="{{ route('general.edit', $rs->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Edit">Edit</a>
                                <form action="{{ route('general.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')"data-toggle="tooltip" data-placement="top" title="Delete">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else

            @endif
        </tbody>
    </table>
    <footer>
    @if (Auth::user()->role=='Admin')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>

    <!-- Include DataTables Buttons extension js for filter date -->
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    @endif


    @if (Auth::user()->role=='Encoder')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif


    @if (Auth::user()->role=='Pre-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>
    
    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Post-Audit')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>
    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    @if (Auth::user()->role=='Releasing')   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Setup - add a text input to each footer cell
        $('#example thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('#example thead');

        var table = $('#example').DataTable({
            orderCellsTop: true,
            fixedHeader: true,
            dom: 'Bfrtip',
            buttons: [
                'print',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'Generate Report',
                    filename: 'Vpro', // Set your custom filename here
                    pageSize: 'LEGAL',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Get the start and end dates from the date pickers
                        var startDate = document.getElementById('startDate').value;
                        var endDate = document.getElementById('endDate').value;

                        // Check if start and end dates are valid
                        if (!isNaN(new Date(startDate)) && !isNaN(new Date(endDate))) {
                            var startMonth = new Date(startDate).toLocaleString('en-US', { month: 'long' });
                            var endMonth = new Date(endDate).toLocaleString('en-US', { month: 'long' });

                            // Calculate the Sum of Net Dv Amount for the selected date range
                            var sumNetDvAmount = 0;
                            table.column(8, { search: 'applied' }).data().each(function (value, index) {
                                var currentDate = new Date(table.cell(index, 1).data());

                                if (currentDate >= new Date(startDate) && currentDate <= new Date(endDate)) {
                                    sumNetDvAmount += parseFloat(value);
                                }
                            });

                            // Add custom content to the PDF document
                            doc.content.unshift({
                                text: 'VPRO',
                                style: 'header'
                            });

                            doc.content.push({
                                text: 'Monthly Summary Report',
                                style: 'title'
                            });

                            // Display selected date range
                            doc.content.push({
                                text: 'Selected Date Range: ' + startMonth + ' to ' + endMonth,
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });

                            // Display the Sum of Net Dv Amount for the selected date range
                            doc.content.push({
                                text: 'Sum of Net Dv Amount: ' + sumNetDvAmount.toFixed(2),
                                style: {
                                    fontSize: 14,
                                    alignment: 'left'
                                }
                            });
                        } else {
                            console.error('Invalid start or end date');
                        }
                    }
                }
            ],
            initComplete: function () {
                var api = this.api();

                // For each column
                api.columns().eq(0).each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" placeholder="' + title + '" />');
                    if ($(api.column(colIdx).header()).index() >= 0) {
                        $(cell).html('<input type="text" placeholder="' + title + '"/>');
                    }

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
            },
        });
    });
</script>

<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>

    <script>
    function applyFilter() {
        // Get filter values
        var dateReceivedFilter = $('#dateReceived').val();
        var particularsFilter = $('#particulars').val().toLowerCase();
        var netdvFilter = $('#netdv').val();

        // Loop through table rows and hide/show based on filters
        $('#example tbody tr').each(function () {
            var dateReceived = $(this).find('td:eq(1)').text();
            var particulars = $(this).find('td:eq(9)').text().toLowerCase();
            var netdv = $(this).find('td:eq(8)').text();

            // Perform filtering logic
            var dateReceivedMatch = dateReceived.includes(dateReceivedFilter);
            var particularsMatch = particulars.includes(particularsFilter);
            var netdvMatch = netdv.includes(netdvFilter);

            // Show/hide the row based on the filtering result
            if (dateReceivedMatch && particularsMatch && netdvMatch) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
    function clearFilter() {
        // Clear filter values and show all rows
        $('#dateReceived').val('');
        $('#particulars').val('');
        $('#netdv').val('');

        // Show all rows
        $('#example tbody tr').show();}

        
    </script>

    <!-- Include DataTables Buttons extension CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>

    <!-- Include ExcelJS library for Excel export -->
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    @endif
    </footer>
@endsection
@endif
