@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Department Edit</h5>
            </div>
            <div class="card-body p-0">
                <form class="p-4" action="{{ route('employee_leaves.update', $employee_leave->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input name="_method" type="hidden" value="PATCH">
                	@csrf

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Employee</label>
                        <div class="col-md-9">
                            <select class="form-control aiz-selectpicker" name="employee_id" id="employee_id" data-live-search="true" required>
                                <option value="">Select Employee</option>
                                @foreach (\App\Models\Employee::all() as $employee)
                                <option value="{{ $employee->id }}" @if($employee->id == $employee_leave->employee_id) selected @endif>{{ $employee->employee_name }}({{ $employee->employee_punch_card }})</option>
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
                                <option value="{{ $leave->id }}" @if($leave->id == $employee_leave->leave_id) selected @endif>{{ $leave->leave_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Form Date</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="xxxx-xx-xx" id="form_date" name="from_date" class="form-control" value="{{ $employee_leave->form_date }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">To Date</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="xxxx-xx-xx" id="to_date" name="to_date" class="form-control" value="{{ $employee_leave->to_date }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Remarks</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="remarks" placeholder="Remarks" required>{{ $employee_leave->remarks }}</textarea>
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