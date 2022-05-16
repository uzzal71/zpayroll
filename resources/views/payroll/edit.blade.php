@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Upload File Edit</h5>
            </div>
            <div class="card-body p-0">
                <form class="p-4" action="{{ route('upload.update', $upload->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input name="_method" type="hidden" value="PATCH">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Select Upload Excel</label>
                        <div class="col-md-9">
                            <input type="file" placeholder="Upload File Name" id="upload_file_name" name="upload_file_name" class="form-control">
                            <input type="hidden" name="old_upload_file_name" value="{{ $upload->upload_path }}">
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
