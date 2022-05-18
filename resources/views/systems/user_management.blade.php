@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="aiz-titlebar text-left mt-2 mb-3">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="h3">All User</h1>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        <span>Add User</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-10 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">User Management</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th class="text-right">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (\App\Models\User::all() as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user_type }}</td>
                            <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{ route('users.edit', $user->id)  }}" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{ route('users.destroy', $user->id) }}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection


@section('script')

@endsection

