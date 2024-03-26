@extends('layouts.app1')
  
@section('title', 'Edit Special Educational Funds')
  
@section('contents')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
  
    
@if (Auth::user()->role=='Admin')
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('special.update', $specials->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $specials->dateReceived }}" title="Date Received" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            @error('dateReceived')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $specials->Obligation }}" title="Obligation Request No.">
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                            @error('Obligation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Department</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Department" value="{{ $specials->Dept }}" title="Department">
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                            @error('Dept')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $specials->Payee }}" title="Payee">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            @error('Payee')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Account Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $specials->Code }}" title="Account Code">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Account Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $specials->Name }}" title="Account Name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $specials->Netdv }}" title="Net Dv Amount">
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                            @error('Netdv')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $specials->Particulars }}" title="Particulars">
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                            @error('Particulars')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <fieldset class="form-group">
                                                        <select class="form-select @error('Status') is-invalid @enderror" name="Status" id="Status" title="Status">
                                                            <option selected disabled>{{ $specials->Status }}</option>
                                                            <option value="Released ">Released</option>
                                                            <option value="Returned with compliance ">Returned with compliance</option>
                                                            <option value="For DV ">For DV</option>
                                                            <option value="For Review ">For review</option>
                                                            <option value="Final approval">Final approval</option>
                                                        </select>
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
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $specials->Transmittedto }}" title=" Transmitted to">
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                            @error('Transmittedto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $specials->Remarks }}" title="Remarks">
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                            @error('Remarks')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Released" class="form-control" placeholder="Released" value="{{ $specials->Released }}" title="Date Released" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Released')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Check" class="form-control" placeholder="Check" value="{{ $specials->Check }}" title="Check Number">
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                            @error('Check')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $specials->Issuance }}" title="Date Of Issuance" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Issuance')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="d-grid">
                                        <button class="btn btn-warning">Update</button>
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
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('special.update', $specials->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $specials->dateReceived }}" title="Date Received" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            @error('dateReceived')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $specials->Obligation }}" title="Obligation Request No.">
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                            @error('Obligation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Department</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Department" value="{{ $specials->Dept }}" title="Department">
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                            @error('Dept')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $specials->Payee }}" title="Payee">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            @error('Payee')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Account Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $specials->Code }}" title="Account Code">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Account Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $specials->Name }}" title="Account Name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $specials->Netdv }}" title="Net Dv Amount">
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                            @error('Netdv')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $specials->Particulars }}" title="Particulars">
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                            @error('Particulars')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <fieldset class="form-group">
                                                        <select class="form-select @error('Status') is-invalid @enderror" name="Status" id="Status" title="Status">
                                                            <option selected disabled>{{ $specials->Status }}</option>
                                                            <option value="Released ">Released</option>
                                                            <option value="Returned with compliance ">Returned with compliance</option>
                                                            <option value="For DV ">For DV</option>
                                                            <option value="For Review ">For review</option>
                                                            <option value="Final approval">Final approval</option>
                                                        </select>
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
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $specials->Transmittedto }}" title=" Transmitted to">
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                            @error('Transmittedto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $specials->Remarks }}" title="Remarks">
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                            @error('Remarks')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Released" class="form-control" placeholder="Released" value="{{ $specials->Released }}" title="Date Released" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Released')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Check" class="form-control" placeholder="Check" value="{{ $specials->Check }}" title="Check Number">
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                            @error('Check')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $specials->Issuance }}" title="Date Of Issuance" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Issuance')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="d-grid">
                                        <button class="btn btn-warning">Update</button>
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
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('special.update', $specials->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $specials->dateReceived }}" title="Date Received" min="2022-01-01" max="2099-12-31" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            @error('dateReceived')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $specials->Obligation }}" title="Obligation Request No." readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                            @error('Obligation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="col-md-4">-->
                                <!--    <label>Disbursement Voucher No.</label>-->
                                <!--</div>-->
                                <!--<div class="col-md-8">-->
                                <!--    <div class="form-group has-icon-left">-->
                                <!--        <div class="position-relative">-->
                                <!--        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $specials->Disbursement }}" title="Disbursement Voucher No." readonly>-->
                                <!--            <div class="form-control-icon">-->
                                <!--                <i class="bi bi-list-ol"></i>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div class="col-md-4">
                                    <label>Department</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Department" value="{{ $specials->Dept }}" title="Department" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                            @error('Dept')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $specials->Payee }}" title="Payee" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            @error('Payee')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Account Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $specials->Code }}" title="Account Code" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Account Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $specials->Name }}" title="Account Name" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $specials->Netdv }}" title="Net Dv Amount" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                            @error('Netdv')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $specials->Particulars }}" title="Particulars" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                            @error('Particulars')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <fieldset class="form-group">
                                                        <select class="form-select @error('Status') is-invalid @enderror" name="Status" id="Status" title="Status">
                                                            <option selected disabled>{{ $specials->Status }}</option>
                                                            <option value="Released ">Released</option>
                                                            <option value="Returned with compliance ">Returned with compliance</option>
                                                            <option value="For DV ">For DV</option>
                                                            <option value="For Review ">For review</option>
                                                            <option value="Final approval">Final approval</option>
                                                        </select>
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
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $specials->Transmittedto }}" title=" Transmitted to" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                            @error('Transmittedto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $specials->Remarks }}" title="Remarks">
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                            @error('Remarks')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Released" class="form-control" placeholder="Released" value="{{ $specials->Released }}" title="Date Released" min="2022-01-01" max="2099-12-31" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Released')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Check" class="form-control" placeholder="Check" value="{{ $specials->Check }}" title="Check Number" readonly>
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                            @error('Check')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $specials->Issuance }}" title="Date Of Issuance" min="2022-01-01" max="2099-12-31" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Issuance')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="d-grid">
                                        <button class="btn btn-warning">Update</button>
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
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('special.update', $specials->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $specials->dateReceived }}" title="Date Received" min="2022-01-01" max="2099-12-31" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            @error('dateReceived')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $specials->Obligation }}" title="Obligation Request No." readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                            @error('Obligation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="col-md-4">-->
                                <!--    <label>Disbursement Voucher No.</label>-->
                                <!--</div>-->
                                <!--<div class="col-md-8">-->
                                <!--    <div class="form-group has-icon-left">-->
                                <!--        <div class="position-relative">-->
                                <!--        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $specials->Disbursement }}" title="Disbursement Voucher No." readonly>-->
                                <!--            <div class="form-control-icon">-->
                                <!--                <i class="bi bi-list-ol"></i>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div class="col-md-4">
                                    <label>Department</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Department" value="{{ $specials->Dept }}" title="Department" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                            @error('Dept')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $specials->Payee }}" title="Payee" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            @error('Payee')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Account Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $specials->Code }}" title="Account Code" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Account Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $specials->Name }}" title="Account Name" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $specials->Netdv }}" title="Net Dv Amount" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                            @error('Netdv')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $specials->Particulars }}" title="Particulars" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                            @error('Particulars')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <fieldset class="form-group">
                                                        <select class="form-select @error('Status') is-invalid @enderror" name="Status" id="Status" title="Status">
                                                            <option selected disabled>{{ $specials->Status }}</option>
                                                            <option value="Released ">Released</option>
                                                            <option value="Returned with compliance ">Returned with compliance</option>
                                                            <option value="For DV ">For DV</option>
                                                            <option value="For Review ">For review</option>
                                                            <option value="Final approval">Final approval</option>
                                                        </select>
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
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $specials->Transmittedto }}" title=" Transmitted to" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                            @error('Transmittedto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $specials->Remarks }}" title="Remarks">
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                            @error('Remarks')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Released" class="form-control" placeholder="Released" value="{{ $specials->Released }}" title="Date Released" min="2022-01-01" max="2099-12-31" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Released')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Check" class="form-control" placeholder="Check" value="{{ $specials->Check }}" title="Check Number" readonly>
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                            @error('Check')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $specials->Issuance }}" title="Date Of Issuance" min="2022-01-01" max="2099-12-31" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Issuance')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="d-grid">
                                        <button class="btn btn-warning">Update</button>
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
<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Information</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                <hr />
                <form action="{{ route('special.update', $specials->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="dateReceived" class="form-control" placeholder="dateReceived" value="{{ $specials->dateReceived }}" title="Date Received" min="2022-01-01" max="2099-12-31" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            @error('dateReceived')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Obligation Request No.</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Obligation" class="form-control" placeholder="Obligation" value="{{ $specials->Obligation }}" title="Obligation Request No." readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                            @error('Obligation')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="col-md-4">-->
                                <!--    <label>Disbursement Voucher No.</label>-->
                                <!--</div>-->
                                <!--<div class="col-md-8">-->
                                <!--    <div class="form-group has-icon-left">-->
                                <!--        <div class="position-relative">-->
                                <!--        <input type="text" name="Disbursement" class="form-control" placeholder="Disbursement" value="{{ $specials->Disbursement }}" title="Disbursement Voucher No." readonly>-->
                                <!--            <div class="form-control-icon">-->
                                <!--                <i class="bi bi-list-ol"></i>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div class="col-md-4">
                                    <label>Department</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Dept" class="form-control" placeholder="Department" value="{{ $specials->Dept }}" title="Department" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                            @error('Dept')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Payee</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Payee" class="form-control" placeholder="Payee" value="{{ $specials->Payee }}" title="Payee" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            @error('Payee')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Account Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Code" class="form-control" placeholder="Code" value="{{ $specials->Code }}" title="Account Code" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Code')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Account Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Name" class="form-control" placeholder="Name" value="{{ $specials->Name }}" title="Account Name" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            @error('Name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Net Dv Amount</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Netdv" class="form-control" placeholder="Netdv" value="{{ $specials->Netdv }}" title="Net Dv Amount" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                            @error('Netdv')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Particulars</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Particulars" class="form-control" placeholder="Particulars" value="{{ $specials->Particulars }}" title="Particulars" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                            @error('Particulars')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Status</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <fieldset class="form-group">
                                                        <select class="form-select @error('Status') is-invalid @enderror" name="Status" id="Status" title="Status">
                                                            <option selected disabled>{{ $specials->Status }}</option>
                                                            <option value="Released ">Released</option>
                                                            <option value="Returned with compliance ">Returned with compliance</option>
                                                            <option value="For DV ">For DV</option>
                                                            <option value="For Review ">For review</option>
                                                            <option value="Final approval">Final approval</option>
                                                        </select>
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
                                        <input type="text" name="Transmittedto" class="form-control" placeholder="Transmittedto" value="{{ $specials->Transmittedto }}" title=" Transmitted to" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                            @error('Transmittedto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>Remarks</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="text" name="Remarks" class="form-control" placeholder="Remarks" value="{{ $specials->Remarks }}" title="Remarks" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                            @error('Remarks')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Released</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Released" class="form-control" placeholder="Released" value="{{ $specials->Released }}" title="Date Released" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Released')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Check Number</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="number" name="Check" class="form-control" placeholder="Check" value="{{ $specials->Check }}" title="Check Number" readonly>
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                            @error('Check')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Date Of Issuance</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input type="date" name="Issuance" class="form-control" placeholder="Issuance" value="{{ $specials->Issuance }}" title="Date Of Issuance" min="2022-01-01" max="2099-12-31" readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            @error('Issuance')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-12 d-flex justify-content-end">
                                <div class="row">
                                    <div class="d-grid">
                                        <button class="btn btn-warning">Update</button>
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