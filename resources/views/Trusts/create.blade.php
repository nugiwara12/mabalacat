@extends('layouts.app1')
  
@section('title', 'Create Trust Funds')
  
@section('contents')


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
                <form action="{{ route('trust.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Date Received</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="Date" class="form-control @error('dateReceived') is-invalid @enderror" value="{{ old('dateReceived') }}"
                                                placeholder="Enter date" id="date-recieved" name="dateReceived" title="Date Received" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Date.
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
                                            <input type="text" class="form-control @error('Obligation') is-invalid @enderror" value="{{ old('Obligation') }}"
                                                placeholder="Enter Obligation Request No." id="obligation" name="Obligation" title="Obligation Request No.">
                                            <div class="form-control-icon">
                                                <i class="bi bi-list-ol"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Obligation Request No.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="col-md-4">
                                    <label>Department</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('Dept') is-invalid @enderror" value="{{ old('Dept') }}"
                                                placeholder="Enter Dept" id="department" name="Dept" title="Department">
                                            <div class="form-control-icon">
                                                <i class="bi bi-door-closed"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Department.
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
                                            <input type="text" class="form-control @error('Payee') is-invalid @enderror" value="{{ old('Payee') }}"
                                                placeholder="Enter Payee" id="payee" name="Payee" title="Payee">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Payee.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Account Code (As per budget)</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('Code') is-invalid @enderror" value="{{ old('Code') }}"
                                                placeholder="Enter Account Code" name="Code"  title="Account Code">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Account Number.
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-md-4">
                                    <label>Account Name</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('Name') is-invalid @enderror" value="{{ old('Name') }}"
                                                placeholder="Enter Account Name" name="Name" title="Account Name">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person-badge-fill"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Account Name.
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
                                            <input type="number" class="form-control @error('Netdv') is-invalid @enderror" value="{{ old('Netdv') }}"
                                                placeholder="Enter Net DV Amount" name="Netdv" title="Net Dv Amount">
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-stack"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Amount.
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
                                            <input type="text" class="form-control @error('Particulars') is-invalid @enderror" value="{{ old('Particulars') }}"
                                                placeholder="Enter Particulars" name="Particulars" title="Particulars">
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-right-text"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Particulars.
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
                                        <fieldset class="form-group">
                                                        <select class="form-select @error('Status') is-invalid @enderror" name="Status" id="Status"  title="Status">
                                                            <option selected disabled>Select Status</option>
                                                            <option value="Released ">Released</option>
                                                            <option value="Returned with compliance ">Returned with compliance</option>
                                                            <option value="For DV ">For DV</option>
                                                            <option value="For Review ">For review</option>
                                                            <option value="Final approval">Final approval</option>
                                                        </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-people"></i>                                               
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Status.
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
                                            <input type="text" class="form-control @error('Transmittedto') is-invalid @enderror" value="{{ old('Transmittedto') }}"
                                                placeholder="Enter Transmitted to" name="Transmittedto"  title="Transmitted to">
                                            <div class="form-control-icon">
                                                <i class="bi bi-box-arrow-right"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Transmitted to.
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
                                            <input type="text" class="form-control @error('Remarks') is-invalid @enderror" value="{{ old('Remarks') }}"
                                                placeholder="Enter Remarks" name="Remarks" title="Remarks">
                                            <div class="form-control-icon">
                                                <i class="bi bi-chat-square-dots-fill"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Remarks.
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
                                            <input type="Date" class="form-control @error('Released') is-invalid @enderror" value="{{ old('Released') }}"
                                                placeholder="Enter Date Released" name="Released" title="Date Released" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Date.
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
                                            <input type="number" class="form-control @error('Check') is-invalid @enderror" value="{{ old('Check') }}"
                                                placeholder="Enter Check Number" name="Check" title="Check">
                                            <div class="form-control-icon">
                                                 <i class="bi bi-card-checklist"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Check.
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
                                            <input type="Date" class="form-control @error('Issuance') is-invalid @enderror" value="{{ old('Issuance') }}"
                                                placeholder="Enter Date Of Issuance" name="Issuance" title="Date Of Issuance" min="2022-01-01" max="2099-12-31">
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-check-fill"></i>
                                            </div>
                                            <div class="invalid-feedback">
                                                Please provide valid Date.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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