@extends('layouts.app1')

@section('title', 'Show General Funds')
  
@section('contents')

@if (Auth::user()->role=='Admin')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
  
    <a href="{{ route('generals.show.pdf', ['id' => $general->id]) }}" class="btn btn-primary" target="_blank">Generate PDF</a>



    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $general->dateReceived }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $general->Obligation }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Disbursement Voucher No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $general->Disbursement }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Dept</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Dept" value="{{ $general->Dept }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $general->Payee }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Acct.Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $general->Code }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Acct Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $general->Name }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $general->Netdv }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $general->Particulars }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Status" class="form-control" placeholder="Status" value="{{ $general->Status }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-people"></i>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Transmitted to:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $general->Transmittedto }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $general->Remarks }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Released" class="form-control" placeholder="Released" value="{{ $general->Released }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Check" class="form-control" placeholder="Check" value="{{ $general->Check }}" readonly>
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $general->Issuance }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@endif

@if (Auth::user()->role=='Encoder')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
  
    


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $general->dateReceived }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $general->Obligation }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Disbursement Voucher No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $general->Disbursement }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Dept</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Dept" value="{{ $general->Dept }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $general->Payee }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Acct.Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $general->Code }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Acct Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $general->Name }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $general->Netdv }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $general->Particulars }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Status" class="form-control" placeholder="Status" value="{{ $general->Status }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-people"></i>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Transmitted to:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $general->Transmittedto }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $general->Remarks }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Released" class="form-control" placeholder="Released" value="{{ $general->Released }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Check" class="form-control" placeholder="Check" value="{{ $general->Check }}" readonly>
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $general->Issuance }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@endif

@if (Auth::user()->role=='Pre-Audit')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
  
    


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $general->dateReceived }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $general->Obligation }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Disbursement Voucher No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $general->Disbursement }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Dept</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Dept" value="{{ $general->Dept }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $general->Payee }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Acct.Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $general->Code }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Acct Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $general->Name }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $general->Netdv }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $general->Particulars }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Status" class="form-control" placeholder="Status" value="{{ $general->Status }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-people"></i>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Transmitted to:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $general->Transmittedto }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $general->Remarks }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Released" class="form-control" placeholder="Released" value="{{ $general->Released }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Check" class="form-control" placeholder="Check" value="{{ $general->Check }}" readonly>
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $general->Issuance }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@endif

@if (Auth::user()->role=='Post-Audit')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
  
    


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $general->dateReceived }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $general->Obligation }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Disbursement Voucher No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $general->Disbursement }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Dept</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Dept" value="{{ $general->Dept }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $general->Payee }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Acct.Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $general->Code }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Acct Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $general->Name }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $general->Netdv }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $general->Particulars }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Status" class="form-control" placeholder="Status" value="{{ $general->Status }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-people"></i>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Transmitted to:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $general->Transmittedto }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $general->Remarks }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Released" class="form-control" placeholder="Released" value="{{ $general->Released }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Check" class="form-control" placeholder="Check" value="{{ $general->Check }}" readonly>
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $general->Issuance }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@endif

@if (Auth::user()->role=='Releasing')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
  
    


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $general->dateReceived }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $general->Obligation }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Disbursement Voucher No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $general->Disbursement }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Dept</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Dept" value="{{ $general->Dept }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $general->Payee }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Acct.Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $general->Code }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Acct Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $general->Name }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $general->Netdv }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $general->Particulars }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Status" class="form-control" placeholder="Status" value="{{ $general->Status }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-people"></i>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Transmitted to:</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $general->Transmittedto }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $general->Remarks }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Released" class="form-control" placeholder="Released" value="{{ $general->Released }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Check" class="form-control" placeholder="Check" value="{{ $general->Check }}" readonly>
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $general->Issuance }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@endif

@if (Auth::user()->role=='Document Representative')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
  
    


    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('general.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $general->Obligation }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Disbursement Voucher No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $general->Disbursement }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Status" class="form-control" placeholder="Status" value="{{ $general->Status }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-people"></i>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $general->Remarks }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Released" class="form-control" placeholder="Released" value="{{ $general->Released }}" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@endif