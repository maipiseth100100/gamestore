@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>📂 Categories</h3>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
            + Add Category
        </a>
    </div>

    <div class="card shadow border-0">
        <div class="card-body">

            <table class="table table-bordered table-hover align-middle text-center">

                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($categories as $key => $category)
                        <tr>

                            <td>{{ $key + 1 }}</td>

                            {{-- ICON --}}
                            <td>
                                @if($category->icon_image)
                                    <img src="{{ asset('storage/'.$category->icon_image) }}"
                                         width="40"
                                         height="40"
                                         style="object-fit: cover; border-radius: 8px;">
                                @else
                                    <span class="text-muted">No Icon</span>
                                @endif
                            </td>

                            {{-- NAME --}}
                            <td>{{ $category->name }}</td>

                            {{-- SLUG --}}
                            <td>{{ $category->slug }}</td>

                            {{-- STATUS --}}
                            <td>
                                @if($category->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            {{-- DATE --}}
                            <td>{{ $category->created_at->format('d M Y') }}</td>

                            {{-- ACTION --}}
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this category?')">
                                        Delete
                                    </button>

                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection