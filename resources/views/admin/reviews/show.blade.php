@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h3>Review Details</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">User</th>
                <td>{{ $review->user->name ?? 'Unknown User' }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $review->user->email ?? '-' }}</td>
            </tr>

            <tr>
                <th>Game</th>
                <td>{{ $review->game->title ?? 'Unknown Game' }}</td>
            </tr>

            <tr>
                <th>Rating</th>
                <td>
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->rating)
                            ⭐
                        @else
                            ☆
                        @endif
                    @endfor
                </td>
            </tr>

            <tr>
                <th>Comment</th>
                <td>{{ $review->review }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    @if($review->status)
                        <span class="badge bg-success">Approved</span>
                    @else
                        <span class="badge bg-warning">Pending</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>Created At</th>
                <td>{{ $review->created_at->format('Y-m-d H:i') }}</td>
            </tr>

        </table>

        <div class="mt-3">

            <form action="{{ route('admin.reviews.approve', $review->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button class="btn btn-success">
                    Approve
                </button>

            </form>

            <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                  method="POST"
                  class="d-inline">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger">
                    Delete
                </button>

            </form>

            <a href="{{ route('admin.reviews.index') }}"
               class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>

</div>

@endsection