@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Employee Attendance</h5>
            </div>
            <div class="card-body">
                <!-- Search Form -->
                <form class="" id="sort_salary_advances" action="" method="GET" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Employee Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{ Auth::user()->name; }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Month</label>
                        <div class="col-md-9">
                            <select name="month" id="month" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                <option value="0">Select Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Year</label>
                        <div class="col-md-9">
                            <select name="year" id="year" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                <option value="0">Select Year</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <!-- Search Form -->
            </div>
        </div>
        @if(!empty($employee_payslips))
        <div class="card">
            <div class="card-body">
                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center lh-1 mb-2">
                                <h6 class="fw-bold">Payslip</h6> <span class="fw-normal">Payment slip for the month of June 2021</span>
                            </div>
                            <div class="d-flex justify-content-end"> <span>Working Branch:ROHINI</span> </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">EMP Code</span> <small class="ms-3">39124</small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">EMP Name</span> <small class="ms-3">Ashok</small> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">PF No.</span> <small class="ms-3">101523065714</small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">NOD</span> <small class="ms-3">28</small> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">ESI No.</span> <small class="ms-3"></small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">Mode of Pay</span> <small class="ms-3">SBI</small> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">Designation</span> <small class="ms-3">Marketing Staff (MK)</small> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div> <span class="fw-bolder">Ac No.</span> <small class="ms-3">*******0701</small> </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="mt-4 table table-bordered">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th scope="col">Earnings</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Deductions</th>
                                            <th scope="col">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Basic</th>
                                            <td>16250.00</td>
                                            <td>PF</td>
                                            <td>1800.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">DA</th>
                                            <td>550.00</td>
                                            <td>ESI</td>
                                            <td>142.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">HRA</th>
                                            <td>1650.00 </td>
                                            <td>TDS</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">WA</th>
                                            <td>120.00 </td>
                                            <td>LOP</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">CA</th>
                                            <td>0.00 </td>
                                            <td>PT</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">CCA</th>
                                            <td>0.00 </td>
                                            <td>SPL. Deduction</td>
                                            <td>500.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">MA</th>
                                            <td>3000.00</td>
                                            <td>EWF</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sales Incentive</th>
                                            <td>0.00</td>
                                            <td>CD</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Leave Encashment</th>
                                            <td>0.00</td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Holiday Wages</th>
                                            <td>500.00</td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Special Allowance</th>
                                            <td>100.00</td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bonus</th>
                                            <td>1400.00</td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Individual Incentive</th>
                                            <td>2400.00</td>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="border-top">
                                            <th scope="row">Total Earning</th>
                                            <td>25970.00</td>
                                            <td>Total Deductions</td>
                                            <td>2442.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-4"> <br> <span class="fw-bold">Net Pay : 24528.00</span> </div>
                                <div class="border col-md-8">
                                    <div class="d-flex flex-column"> <span>In Words</span> <span>Twenty Five thousand nine hundred seventy only</span> </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="d-flex flex-column mt-2"> <span class="fw-bolder">For Kalyan Jewellers</span> <span class="mt-4">Authorised Signatory</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
