@extends('admin.layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Reviews Management</h2>

</div>

<div class="card shadow">

    <div class="card-body">

        <table class="table table-bordered table-hover">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Game</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th width="150">Action</th>
                </tr>

            </thead>

            <tbody>

                @forelse($reviews as $review)

                <tr>

                    <td>{{ $review->id }}</td>

                    <td>
                        {{ $review->user->name ?? '-' }}
                    </td>

                    <td>
                        {{ $review->game->title ?? '-' }}
                    </td>

                    <td>

                        @for($i = 1; $i <= 5; $i++)

                            @if($i <= $review->rating)

                                ⭐

                            @else

                                ☆

                            @endif

                        @endfor

                    </td>

                    <td>

                        @if($review->status)

                            <span class="badge bg-success">
                                Approved
                            </span>

                        @else

                            <span class="badge bg-warning">
                                Pending
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $review->created_at->format('d M Y') }}
                    </td>

                    <td>

                        <a href="{{ route('admin.reviews.show',$review->id) }}"
                           class="btn btn-info btn-sm">

                            View

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center">

                        No Reviews Found

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

        {{ $reviews->links() }}

    </div>

</div>

@endsection