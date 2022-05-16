@extends('layouts.app')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">All Weekend Entry</h1>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('weekend_entries.create') }}" class="btn btn-primary">
                <span>Add New Weekend</span>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-block d-md-flex">
        <h5 class="mb-0 h6">Weekend Entries</h5>
        <form class="" id="sort_categories" action="" method="GET">
            <div class="box-inline pad-rgt pull-left">
                <div class="" style="min-width: 200px;">
                    <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="Type name & Enter">
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Weekend Date</th>
                    <th>Remarks</th>
                    <th>Status</th>
                    <th class="text-right">Options</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weekend_entries as $key => $weekend_entry)
                    <tr>
                        <td>{{ ($key+1) + ($weekend_entries->currentPage() - 1)*$weekend_entries->perPage() }}</td>
                        <td>{{ Carbon::parse($weekend_entry->weekend_date)->format('l') }}</td>
                        <td>{{ $weekend_entry->weekend_date }}</td>
                        <td>{{ $weekend_entry->remarks }}</td>
                        <td>{{ $weekend_entry->status }}</td>
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('weekend_entries.edit', $weekend_entry->id)  }}" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{ route('weekend_entries.destroy', $weekend_entry->id) }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $weekend_entries->appends(request()->input())->links() }}
        </div>
    </div>
</div>
@endsection


@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')

@endsection
