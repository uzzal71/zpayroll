@extends('layouts.app')

@section('content')

<!-- get Attendance -->
@isset($attendances)
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                      <h5 class="card-title mt-3">Attendance Approval</h5>
                    </div>
                    <div class="col-sm-6">
                        <form class="form-horizontal" id="search_form" action="{{ route('approval.attendance') }}" method="GET" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <input type="text" class="form-control mt-2" id="search" name="search" @isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type Card Id & Enter">
                    </form>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('attendances.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" name="">
                                </th>
                                <th>Card Id</th>
                                <th>Date</th>
                                <th>In</th>
                                <th>Out</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $key => $attendance)
                            <tr>
                                <td>
                                    <input type="checkbox" name="employee_id[]">
                                </td>
                                <td>{{ $attendance->employee_id }}</td>
                                <td>{{ $attendance->attendance_date }}</td>
                                <td>{{ $attendance->attendance_in }}</td>
                                <td>{{ $attendance->attendance_out }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endisset

@endsection

@section('script')
<script>
var input = document.getElementById("punch_card");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("myBtn").click();
  }
});
</script>

<style type="text/css">
    .form-customer {
        width: 90px !important;
        text-align: center !important;
    }
</style>
@endsection
