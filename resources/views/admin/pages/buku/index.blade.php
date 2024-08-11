@extends('admin.layout.admin_master')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">Cari Buku</h5>
        <div class="card-body">
            <div class="row gx-3 gy-2 align-items-center">
                {!! Form::open(['route' => 'books.index', 'method' => 'GET', 'class' => 'd-flex']) !!}
                {!! Form::text('q', request('q'), [
                    'class' => 'form-control me-2',
                    'type' => 'search',
                    'placeholder' => 'Cari berdasarkan Judul, Penulis, deskripsi buku',
                    'aria-label' => 'Search',
                ]) !!}
                {!! Form::select(
                    'category',
                    $categories->pluck('category_name', 'id')->prepend('All Categories', ''),
                    request('category'),
                    ['class' => 'form-select me-2', 'aria-label' => 'Category'],
                ) !!}
                {!! Form::button('Search', ['class' => 'btn btn-outline-primary', 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah buku</a>
        <a href="{{ route('books.pdf') }}" class="btn btn-secondary">Print Semua Data Buku</a>
    </div>

    <div class="row mb-5">
        @forelse ($books as $book)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ $book->user->profile_photo ? asset('storage/' . $book->user->profile_photo) : 'assets-admin/img/avatars/nophoto.png' }}"
                                        alt="Profile Photo" class="w-px-40 h-auto rounded-circle">
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ $book->user->fullname }} |
                                    {{ $book->user->role }}</span>
                                <small>{{ $book->created_at->format('d M Y, H:i') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <img class="img-fluid d-flex mx-auto my-4" src="{{ Storage::url($book->cover_path) }}"
                            alt="{{ $book->title }}">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <h6 class="card-subtitle text-muted">Quantity: {{ $book->quantity }}</h6>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-primary">View Details</a>
                        <div class="d-flex">
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                            <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <button class="btn btn-sm btn-danger delete-book" data-id="{{ $book->id }}">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="container-xxl container-p-y d-flex justify-content-center align-items-center">
                <div class="misc-wrapper text-center">
                    <h2 class="mb-2 mx-2">Tidak Ada Daftar Buku</h2>
                    <div class="mt-4">
                        <img src="assets-admin/img/illustrations/girl-doing-yoga-light.png" alt="girl-doing-yoga-light"
                            width="500" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                            data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>

    <script>
        document.querySelectorAll('.delete-book').forEach(button => {
            button.addEventListener('click', function() {
                let bookId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + bookId).submit();
                    }
                })
            });
        });
    </script>
@endsection
