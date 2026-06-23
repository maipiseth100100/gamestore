@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">

        <h3>User Details</h3>

    </div>

    <div class="card-body">

        <div class="row">

                <table class="table table-bordered">

                    <tr>
                        <th width="200">ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>

                    <tr>
                        <th>Role</th>
                        <td>{{ ucfirst($user->role) }}</td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>{{ $user->created_at }}</td>
                    </tr>

                    <tr>
                        <th>Updated At</th>
                        <td>{{ $user->updated_at }}</td>
                    </tr>

                </table>

                <a href="{{ route('admin.users.index') }}"
                   class="btn btn-secondary">

                    Back

                </a>
                
        </div>

    </div>

</div>

@endsection