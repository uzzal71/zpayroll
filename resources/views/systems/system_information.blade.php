@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">System Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>OS</td>
                        <td>Windows, Linux</td>
                    </tr>
                    <tr>
                        <td>PHP</td>
                        <td>Version ^7.4</td>
                    </tr>
                    <tr>
                        <td>Framework</td>
                        <td>Laravel ^8.0</td>
                    </tr>
                    <tr>
                        <td>Database</td>
                        <td>MySql</td>
                    </tr>
                    <tr>
                        <td>Frontend</td>
                        <td>HTML, CSS, Bootstrap 4, JavaScript, Jquery, Ajax</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
