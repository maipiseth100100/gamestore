@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Users Management</h2>

</div>

<div class="card shadow">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th width="180">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                <tr>

                    <td>{{ $user->id }}</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->email }}</td>

                    <td>

                        @if($user->role == 'admin')

                            <span class="badge bg-danger">
                                Admin
                            </span>

                        @else

                            <span class="badge bg-primary">
                                User
                            </span>

                        @endif

                    </td>

                    <td>{{ $user->created_at->format('d M Y') }}</td>

                    <td>

                        <a href="{{ route('admin.users.show',$user->id) }}"
                           class="btn btn-info btn-sm">

                            View

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="8" class="text-center">
                        No Users Found
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        {{ $users->links() }}

    </div>

</div>

@endsection