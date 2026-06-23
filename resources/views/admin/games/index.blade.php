@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🎮 Games</h2>

        <a href="{{ route('admin.games.create') }}"
           class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Game
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th width="70">ID</th>
                            <th width="100">Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th>Latest</th>
                            <th>Status</th>
                            <th width="180">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($games as $game)

                            <tr>

                                <td>{{ $game->id }}</td>

                                <td>
                                    @if($game->image)
                                        <img src="{{ asset('storage/'.$game->image) }}"
                                             width="70"
                                             class="rounded">
                                    @endif
                                </td>

                                <td>{{ $game->title }}</td>

                                <td>
                                    {{ $game->category->name ?? '-' }}
                                </td>

                                <td>
                                    ${{ number_format($game->price,2) }}
                                </td>

                                <td>
                                    @if($game->featured)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>

                                <td>
                                    @if($game->latest_games)
                                        <span class="badge bg-info">Yes</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </td>


                                <td>
                                    @if($game->status)
                                        <span class="badge bg-success">
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('admin.games.show',$game) }}"
                                       class="btn btn-info btn-sm">
                                        View
                                    </a>

                                    <a href="{{ route('admin.games.edit',$game) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.games.destroy',$game) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Delete game?')">
                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="10" class="text-center">
                                    No Games Found
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $games->links() }}
            </div>

        </div>

    </div>

</div>

@endsection