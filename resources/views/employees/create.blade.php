@extends('layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">Add New Employee</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('employees.index') }}" class="btn btn-primary">
                <i class="las la-chevron-left"></i>
                 Back
            </a>
        </div>
    </div>
</div>


<div class="">
    <form class="form form-horizontal mar-top" action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data" id="choice_form" autocomplete="off">
        <div class="row gutters-5">
            <div class="col-lg-8">
                @csrf
                <input type="hidden" name="added_by" value="admin">
                <!-- Employee Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Employee Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Employee Name <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="employee_name" placeholder="Employee Name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Employee Id Card <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="employee_id_card" placeholder="Employee Id Card" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Employee Punch Card <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="employee_punch_card" placeholder="Employee Punch Card" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Mobile <span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Email </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">NID </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="nid" placeholder="NID">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Date Of Birth</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="date_of_birth" placeholder="Date Of Birth">
                            </div>
                        </div>

                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Religion</label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="religion" id="religion" data-live-search="true">
                                    <option value="N/A">Select Religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hinduism">Hinduism</option>
                                    <option value="Buddhism">Buddhism</option>
                                    <option value="Christianity">Christianity</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Sex</label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="religion" id="religion" data-live-search="true">
                                    <option value="N/A">Select Sex</option>
                                    <option value="Mele">Mele</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Marital Status</label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="marital_status" id="marital_status" data-live-search="true">
                                    <option value="N/A">Select Marital Status</option>
                                    <option value="Married">Married</option>
                                    <option value="Unmarried">Unmarried</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Blood group</label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="blood_group" id="blood_group" data-live-search="true">
                                    <option value="N/A">Select Blood Group</option>
                                    <option value="A(+)">A(+)</option>
                                    <option value="A(1)">A(1)</option>
                                    <option value="B(+)">B(+)</option>
                                    <option value="B(-)">B(-)</option>
                                    <option value="AB(+)">AB(+)</option>
                                    <option value="AB(-)">AB(-)</option>
                                    <option value="O(+)">O(+)</option>
                                    <option value="O(-)">O(-)</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row" id="brand">
                            <label class="col-md-3 col-from-label">Employee Status</label>
                            <div class="col-md-8">
                                <select class="form-control aiz-selectpicker" name="employee_status" id="employee_status" data-live-search="true">
                                    <option value="N/A">Select Sex</option>
                                    <option value="Regular">Regular</option>
                                    <option value="New">New</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Joining Date</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="joining_date" placeholder="Date Of Birth">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Employee Information -->

                <!-- Family Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Family Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Father Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="father_name" placeholder="Father Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Mother Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="mother_name" placeholder="Mother Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Emergency Contact Person Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="emergency_contact_person_name" placeholder="Emergency Contact Person Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Emergency Contact Person Number </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="emergency_contact_person_number" placeholder="Emergency Contact Person Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Present Address </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="present_address" placeholder="Present Address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Permanent Address </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="permanent_address" placeholder="Permanent Address">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Family Information -->

                <!-- Bank Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Bank Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Account Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="account_name" placeholder="Account Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Account Number </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="account_number" placeholder="Account Number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Bank Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="bank_name" placeholder="Bank Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Branch Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="bank_branch_name" placeholder="Branch Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Bank Address </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="bank_address" placeholder="Bank Address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Swift Code </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="swift_code" placeholder="Swift Code">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Bank Information -->

                <!-- Last Education Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Last Education Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Last Degree Title </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="degree_title" placeholder="Last Degree Title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Faculty </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="faculty" placeholder="Faculty">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Institute Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="institute_name" placeholder="Institute Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Duration </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="duration" placeholder="Duration">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Passing Year </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="passing_year" placeholder="Passing Year">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Result </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="result" placeholder="Result">
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Last Education Information -->

                <!-- Last Experience Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Last Experience Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Designation Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="designation_name" placeholder="Designation Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Company Name </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="company_name" placeholder="Company Name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Duration </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="duration" placeholder="Duration">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Location </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="location" placeholder="Location">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-from-label">Description </label>
                            <div class="col-md-8">
                            <textarea class="aiz-text-editor" name="description"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Last Experience Information -->

                <!-- Employee Images -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Employee Images</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="signinSrEmail">Images <small>(600x600)</small></label>
                            <div class="col-md-8">
                                <input type="file" name="employee_photo" class="selected-files">
                                <br />
                                <small class="text-muted">These images are visible in employee details page. Use 600x600 sizes images.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Employee Images -->
            </div>

            <div class="col-lg-4">

                <!-- Salary Information -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Salary Information</h5>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-md-4 col-from-label">Gross</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" onkeyup="calculate_salary()" name="gross_salary" id="gross_salary" placeholder="0.00">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-from-label">Basic</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="basic_salary" id="basic_salary" placeholder="0.00" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-from-label">House Rent</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="house_rent" id="house_rent" placeholder="0.00" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-from-label">Medical</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="medical_allowance" id="medical_allowance" placeholder="0.00" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-from-label">Transport</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="transport_allowance" id="transport_allowance" placeholder="0.00" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-from-label">Food</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="food_allowance" id="food_allowance" placeholder="0.00" readonly>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Salary Information -->

                <!-- Department -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Department</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="department_id" id="department_id" data-live-search="true" required>
                                <option value="">Select Department</option>
                                @foreach (\App\Models\Department::all() as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Department -->

                <!-- Designation -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Designation</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="designation_id" id="designation_id" data-live-search="true" required>
                                <option value="">Select Designation</option>
                                @foreach (\App\Models\Designation::all() as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->designation_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Designation -->

                <!-- Schedule -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Duty Schedule</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="schedule_id" id="schedule_id" data-live-search="true" required>
                                <option value="">Select Schedule</option>
                                @foreach (\App\Models\Schedule::all() as $schedule)
                                <option value="{{ $schedule->id }}">{{ $schedule->schedule_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Schedule -->

                <!-- Tax Status -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Tax Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="tax_status" id="tax_status" data-live-search="true" required>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Tax Status -->

                <!-- Schedule -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Tax</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="tax_id" id="tax_id" data-live-search="true" required>
                                @foreach (\App\Models\Tax::all() as $tax)
                                    <option value="{{ $tax->id }}">{{ $tax->tax_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Schedule -->

                <!-- Provident found -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Provident Found</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="provident_fund_status" id="provident_fund_status" data-live-search="true" required>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Provident found -->

                <!-- Transport allowance -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Transport Allowance</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="transport_allowance_status" id="transport_allowance_status" data-live-search="true" required>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Transport allowance -->

                <!-- Commission -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Commission Allowance</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="commission_status" id="commission_status" data-live-search="true" required>
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Commission -->

                <!-- Salary Withdraw -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Salary Withdraw</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="salary_withdraw" id="salary_withdraw" data-live-search="true" required>
                                <option value="cash">Cash</option>
                                <option value="bank">Bank</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Salary Withdraw -->

                <!-- Employee Status -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0 h6">Employee Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <select class="form-control aiz-selectpicker" name="status" id="status" data-live-search="true" required>
                                <option value="active">Active</option>
                                <option value="inactive">inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Employee Status -->

            </div>
            <!-- Button -->
            <div class="col-12">
                <div class="btn-toolbar float-right mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group" role="group" aria-label="Second group">
                        <button type="submit" name="button" value="publish" class="btn btn-success">Save & Publish</button>
                    </div>
                </div>
            </div>
            <!-- Button -->
        </div>
    </form>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $('form').bind('submit', function (e) {
        // Disable the submit button while evaluating if the form should be submitted
        $("button[type='submit']").prop('disabled', true);

        var valid = true;

        if (!valid) {
            e.preventDefault();

            // Reactivate the button if the form was not submitted
            $("button[type='submit']").button.prop('disabled', false);
        }
    });

    function calculate_salary() {

        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url:'{{ route('Get.Salary.Setting') }}',
                data: {},
                success: function(data) {
                    var gross_salary = document.getElementById("gross_salary").value;

                    document.getElementById("basic_salary").value = (gross_salary * data.salary_info.basic_salary) / 100;
                    document.getElementById("house_rent").value = (gross_salary * data.salary_info.house_rent) / 100;
                    document.getElementById("medical_allowance").value = (gross_salary * data.salary_info.medical_allowance) / 100;
                    document.getElementById("transport_allowance").value = (gross_salary * data.salary_info.transport_allowance) / 100;
                    document.getElementById("food_allowance").value = (gross_salary * data.salary_info.food_allowance) / 100;

                }
            });
    };
</script>
@endsection
