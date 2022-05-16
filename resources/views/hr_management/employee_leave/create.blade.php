@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Employee Leave Entry</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('employee_leaves.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                	@csrf

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Employee</label>
                        <div class="col-md-9">
                            <select class="form-control aiz-selectpicker" name="employee_id" id="employee_id" data-live-search="true" required>
                                <option value="">Select Employee</option>
                                @foreach (\App\Models\Employee::all() as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->employee_name }}({{ $employee->employee_punch_card }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Leave Type</label>
                        <div class="col-md-9">
                            <select name="leave_id" id="leave_id" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                <option value="">Select Leave</option>
                                @foreach (\App\Models\Leave::all() as $leave)
                                <option value="{{ $leave->id }}">{{ $leave->leave_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Form Date</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="xxxx-xx-xx" id="from_date" name="from_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">To Date</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="xxxx-xx-xx" id="to_date" name="to_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Remarks</label>
                        <div class="col-md-9">
                            <textarea class="aiz-text-editor" name="remarks" placeholder="Remarks" required></textarea>
                        </div>
                    </div>


                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
