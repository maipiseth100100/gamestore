@extends('admin.layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            📂 Category Details
        </h3>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary">
            ← Back
        </a>

    </div>

    <div class="card border-0 shadow-lg">

        <div class="card-body">

            {{-- HEADER --}}
            <div class="d-flex align-items-center gap-3 mb-4">

                {{-- ICON --}}
                @if($category->icon_image)
                    <img src="{{ asset('storage/' . $category->icon_image) }}"
                         width="70"
                         height="70"
                         class="rounded shadow"
                         style="object-fit:cover;">
                @else
                    <div class="bg-secondary text-white d-flex justify-content-center align-items-center rounded"
                         style="width:70px;height:70px;">
                        N/A
                    </div>
                @endif

                <div>
                    <h2 class="mb-0 fw-bold">
                        {{ $category->name }}
                    </h2>

                    <small class="text-muted">
                        Slug: {{ $category->slug }}
                    </small>
                </div>

            </div>

            <hr>

            {{-- DETAILS TABLE --}}
            <div class="table-responsive">

                <table class="table table-bordered">

                    <tr>
                        <th width="200">ID</th>
                        <td>{{ $category->id }}</td>
                    </tr>

                    <tr>
                        <th>Name</th>
                        <td>{{ $category->name }}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{ $category->slug }}</td>
                    </tr>

                    <tr>
                        <th>Status</th>
                        <td>
                            @if($category->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Total Games</th>
                        <td>
                            {{ $category->games_count ?? 0 }}
                        </td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>
                            {{ $category->created_at->format('d M Y - h:i A') }}
                        </td>
                    </tr>

                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $category->updated_at->format('d M Y - h:i A') }}
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection