@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Company Information</h5>
            </div>
            <div class="card-body p-0">
                <form class="p-4" action="{{ route('provident_founds.update', $provident_found->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input name="_method" type="hidden" value="PATCH">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Provident Found Name</label>
                        <div class="col-md-9">
                            <input type="text" name="provident_found_name" value="{{ $provident_found->provident_found_name }}" class="form-control" id="name" placeholder="Provident Found Name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Percentage</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="percentage" value="{{ $provident_found->percentage }}" placeholder="Percentage">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Status</label>
                        <div class="col-md-9">
                            <select name="status" required class="form-control aiz-selectpicker mb-2 mb-md-0">
                                <option value="active" @if ($provident_found->status == 'active') selected @endif>Active</option>
                                <option value="inactive" @if ($provident_found->digital == 'inactive') selected @endif>Inactive</option>
                            </select>
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
