@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Upload File</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Select Upload Excel</label>
                        <div class="col-md-9">
                            <input type="file" placeholder="Upload File Name" id="upload_file_name" name="upload_file_name" class="form-control" required>
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
