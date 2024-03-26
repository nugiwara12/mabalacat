<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOUPRO:VOUCHER PROCESSING AND MONITORING SYSTEM</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        .align-middle {
            vertical-align: middle;
        }

        .total-row {
            background-color: yellow;
            font-weight: bold;
        }
    </style>
</head>
<body>
<center><h1>Trusts Funds For 2024</h1></center>
    <table class="table table-hover" id="example">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Date Received</th>
                <th>Dept</th>
                <th>Payee</th>
                <th>Type Of Vouchers</th>
                <th>Acct Name</th>
                <th>Net Dv Amount</th>
                <th>Transmitted to:</th>
                <th>Date Released</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalNetDV = 0;
            @endphp
            @if($trusts->count() > 0)
                @foreach($trusts as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->dateReceived }}</td>
                        <td class="align-middle">{{ $rs->Dept }}</td>
                        <td class="align-middle">{{ $rs->Payee }}</td>
                        <td class="align-middle">General Funds</td>
                        <td class="align-middle">{{ $rs->Name }}</td>
                        <td class="align-middle">{{ $rs->Netdv }}</td>
                        <td class="align-middle">{{ $rs->Transmittedto }}</td>
                        <td class="align-middle">{{ $rs->Released }}</td>
                        @php
                            $totalNetDV += $rs->Netdv;
                        @endphp
                    </tr>
                @endforeach
                <!-- Display total row at the bottom of the table -->
                <tr class="total-row">
                    <td colspan="6">Total Net Dv Amount:</td>
                    <td class="align-middle">{{ number_format($totalNetDV, 2) }}</td>
                    <td colspan="2"></td>
                </tr>
            @else
                <!-- Handle case where there are no records -->
            @endif
        </tbody>
    </table>

</body>
</html>
