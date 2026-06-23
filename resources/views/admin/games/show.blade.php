@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">🎮 Game Details</h2>

        <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>
            Back
        </a>

    </div>

    <div class="card border-0 shadow-lg">

        <div class="card-body">

            <div class="row">

                {{-- MAIN IMAGE --}}
                <div class="col-md-4">

                    @if($game->image)
                        <img src="{{ asset('storage/' . $game->image) }}"
                             class="img-fluid rounded shadow"
                             style="width:100%; height:450px; object-fit:cover;">
                    @else
                        <img src="https://via.placeholder.com/400x500"
                             class="img-fluid rounded"
                             style="width:100%; height:450px; object-fit:cover;">
                    @endif

                </div>

                {{-- DETAILS --}}
                <div class="col-md-8">

                    <h2 class="fw-bold">{{ $game->title }}</h2>

                    <hr>

                    <table class="table">

                        <tr>
                            <th width="180">ID</th>
                            <td>{{ $game->id }}</td>
                        </tr>

                        <tr>
                            <th>Category</th>
                            <td>{{ $game->category->name ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Slug</th>
                            <td>{{ $game->slug }}</td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td>
                                <span class="badge bg-success fs-6">
                                    ${{ number_format($game->price, 2) }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Featured</th>
                            <td>
                                <span class="badge {{ $game->featured ? 'bg-warning text-dark' : 'bg-secondary' }}">
                                    {{ $game->featured ? 'Yes' : 'No' }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Latest Game</th>
                            <td>
                                <span class="badge {{ $game->latest_games ? 'bg-primary' : 'bg-secondary' }}">
                                    {{ $game->latest_games ? 'Yes' : 'No' }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge {{ $game->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $game->status ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Created At</th>
                            <td>{{ $game->created_at }}</td>
                        </tr>

                        <tr>
                            <th>Updated At</th>
                            <td>{{ $game->updated_at }}</td>
                        </tr>

                    </table>

                </div>

            </div>

            {{-- DESCRIPTION --}}
            <div class="mt-5">

                <h4 class="fw-bold mb-3">📝 Description</h4>

                <div class="card">
                    <div class="card-body">
                        {{ $game->description ?? 'No description available.' }}
                    </div>
                </div>

            </div>

            {{-- TRAILER --}}
            @if($game->trailer_url)

                @php
                    $url = $game->trailer_url;
                    $videoId = null;

                    if (str_contains($url, 'watch?v=')) {
                        $videoId = explode('watch?v=', $url)[1];
                        $videoId = explode('&', $videoId)[0];
                    }
                    elseif (str_contains($url, 'youtu.be/')) {
                        $videoId = explode('youtu.be/', $url)[1];
                        $videoId = explode('?', $videoId)[0];
                    }
                @endphp

                <div class="row mt-5">

                    <div class="col-12">

                        <h3 class="fw-bold mb-3">🎬 Watch Trailer</h3>

                        <div class="ratio ratio-16x9 shadow rounded">

                            @if($videoId)
                                <iframe
                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                    allowfullscreen
                                    frameborder="0">
                                </iframe>
                            @else
                                <div class="alert alert-danger m-3">
                                    Invalid YouTube URL
                                </div>
                            @endif

                        </div>

                    </div>

                </div>

            @endif

            {{-- SCREENSHOTS --}}
            @if(!empty($game->screenshots) && is_array($game->screenshots))

                <div class="mt-5">

                    <h4 class="fw-bold mb-3">🖼 Screenshots</h4>

                    <div class="row">

                        @foreach($game->screenshots as $screenshot)

                            <div class="col-md-3 mb-3">

                                <img src="{{ asset('storage/' . $screenshot) }}"
                                     class="img-fluid rounded shadow"
                                     style="height:200px; width:100%; object-fit:cover;">

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection