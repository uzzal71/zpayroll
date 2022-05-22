@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Advance Salary Edit</h5>
                <div class="col-md-6 text-md-right">
                    <a href="{{ route('advance_salaries.index') }}" class="btn btn-primary">
                        <i class="las la-chevron-left"></i>
                         Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('advance_salaries.update', $advance_salary->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input name="_method" type="hidden" value="PATCH">
                    @csrf
                    
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Employee Name</label>
                        <div class="col-md-9">
                            <input type="text" name="employee_name" id="employee_name" class="form-control" value="{{ $advance_salary->employee->employee_name }}" required>
                            <input type="hidden" name="employee_id" id="employee_id" value="{{ $advance_salary->employee_id }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Month</label>
                        <div class="col-md-9">
                            <select name="payment_month" id="payment_month" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                <option value="January" @if("January" == $advance_salary->payment_month) selected @endif>January</option>
                                <option value="February" @if("February" == $advance_salary->payment_month) selected @endif>February</option>
                                <option value="March" @if("March" == $advance_salary->payment_month) selected @endif>March</option>
                                <option value="April" @if("April" == $advance_salary->payment_month) selected @endif>April</option>
                                <option value="May" @if("May" == $advance_salary->payment_month) selected @endif>May</option>
                                <option value="June" @if("June" == $advance_salary->payment_month) selected @endif>June</option>
                                <option value="July" @if("July" == $advance_salary->payment_month) selected @endif>July</option>
                                <option value="August" @if("August" == $advance_salary->payment_month) selected @endif>August</option>
                                <option value="September" @if("September" == $advance_salary->payment_month) selected @endif>September</option>
                                <option value="October" @if("October" == $advance_salary->payment_month) selected @endif>October</option>
                                <option value="November" @if("November" == $advance_salary->payment_month) selected @endif>November</option>
                                <option value="December" @if("December" == $advance_salary->payment_month) selected @endif>December</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Year</label>
                        <div class="col-md-9">
                            <select name="payment_year" id="payment_year" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                 <option value="2021" @if(2021 == $advance_salary->payment_year) selected @endif>2021</option>
                                <option value="2022" @if(2022 == $advance_salary->payment_year) selected @endif>2022</option>
                                <option value="2023" @if(2023 == $advance_salary->payment_year) selected @endif>2023</option>
                                <option value="2024" @if(2024 == $advance_salary->payment_year) selected @endif>2024</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Amount</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" name="amount" id="amount" value="{{ $advance_salary->amount }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Remarks</label>
                        <div class="col-md-9">
                            <textarea name="remarks" id="remarks">{{ $advance_salary->remarks }}</textarea>
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
