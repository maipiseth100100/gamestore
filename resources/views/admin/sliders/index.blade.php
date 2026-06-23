@extends('admin.layouts.app')

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))

<div class="alert alert-danger alert-dismissible fade show">
    {{ session('error') }}
    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">


<h2 class="fw-bold">🎞 Hero Sliders</h2>

<a href="{{ route('admin.sliders.create') }}"
   class="btn btn-primary">

    <i class="fas fa-plus me-1"></i>
    Add Slider

</a>


</div>

<div class="card border-0 shadow">

<div class="card-body table-responsive">

    <table class="table table-bordered align-middle">

        <thead class="table-dark">

            <tr>
                <th>ID</th>
                <th width="220">Image</th>
                <th>Title</th>
                <th>Status</th>
                <th width="220">Action</th>
            </tr>

        </thead>

        <tbody>

            @forelse($sliders as $slider)

            <tr>

                <td>{{ $slider->id }}</td>

                <td>

                    @if(!empty($slider->image))

                        <img
                            src="{{ asset('uploads/sliders/'.$slider->image) }}"
                            alt="{{ $slider->title }}"
                            width="180"
                            height="100"
                            class="rounded border shadow-sm"
                            style="object-fit:cover;">

                    @else

                        <img
                            src="https://via.placeholder.com/180x100?text=No+Image"
                            alt="No Image"
                            width="180"
                            height="100"
                            class="rounded border shadow-sm">

                    @endif

                </td>

                <td>

                    <strong>{{ $slider->title }}</strong>

                    @if($slider->subtitle)
                        <br>
                        <small class="text-muted">
                            {{ $slider->subtitle }}
                        </small>
                    @endif

                </td>

                <td>

                    @if($slider->status)

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

                    @if(Route::has('admin.sliders.show'))

                    <a href="{{ route('admin.sliders.show', $slider->id) }}"
                       class="btn btn-info btn-sm">

                        <i class="fas fa-eye"></i>

                    </a>

                    @endif

                    <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                       class="btn btn-warning btn-sm">

                        <i class="fas fa-edit"></i>

                    </a>

                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Delete this slider?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm">

                            <i class="fas fa-trash"></i>

                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6"
                    class="text-center py-5 text-muted">

                    No sliders found.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    <div class="mt-3">
        {{ $sliders->links() }}
    </div>

</div>


</div>

@endsection
