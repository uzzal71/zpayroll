@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Salary Increment Edit</h5>
            </div>
            <div class="card-body p-0">
                <form class="p-4" action="{{ route('salary_increments.update', $salary_increment->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input name="_method" type="hidden" value="PATCH">
                	@csrf
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Employee Name</label>
                        <div class="col-md-9">
                           <select class="form-control aiz-selectpicker" name="employee_id" id="employee_id" data-live-search="true" required>
                                <option value="">Select Employee</option>
                                @foreach (\App\Models\Employee::all() as $employee)
                                <option value="{{ $employee->id }}" @if($employee->id == $salary_increment->employee_id) selected @endif>
                                    {{ $employee->employee_name }}
                                    ({{ $employee->employee_punch_card }})
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Gross Salary</label>
                        <div class="col-md-9">
                            <input type="number" placeholder="Gross Salary" id="gross_salary" name="gross_salary" class="form-control" value="{{ $salary_increment->gross_salary }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Basic Salary</label>
                        <div class="col-md-9">
                            <input type="number" placeholder="Basic Salary" id="basic_salary" name="basic_salary" class="form-control" value="{{ $salary_increment->basic_salary }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">House Rent</label>
                        <div class="col-md-9">
                            <input type="number" placeholder="House Rent" id="house_rent" name="house_rent" class="form-control" value="{{ $salary_increment->house_rent }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Medical Allowance</label>
                        <div class="col-md-9">
                            <input type="number" placeholder="Medical Allowance" id="medical_allowance" name="medical_allowance" class="form-control" value="{{ $salary_increment->medical_allowance }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Transport Allowance</label>
                        <div class="col-md-9">
                            <input type="number" placeholder="Transport Allowance" id="transport_allowance" name="transport_allowance" class="form-control" value="{{ $salary_increment->transport_allowance }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Food Allowance</label>
                        <div class="col-md-9">
                            <input type="number" placeholder="Food Allowance" id="food_allowance" name="food_allowance" class="form-control" value="{{ $salary_increment->food_allowance }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Effective Date</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="xxxx-xx-xx" id="effective_date" name="effective_date" class="form-control" value="{{ $salary_increment->effective_date }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Remarks</label>
                        <div class="col-md-9">
                            <textarea class="aiz-text-editor" name="remarks" placeholder="Remarks" required>{{ $salary_increment->remarks }}</textarea>
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
