@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Weekend Create</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('weekend_entries.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                	@csrf
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Weekend Date</label>
                        <div class="col-md-9">
                            <input type="text" placeholder="xxxx-xx-xx" id="weekend_date" name="weekend_date" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Remarks</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="remarks" placeholder="Remarks" required>Office Weekend</textarea>
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
