@extends('admin.layout.admin_master')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body">
            <!-- Book Cover and Title -->
            <div class="d-flex align-items-start align-items-sm-center gap-4 mb-4">
                <img src="{{ Storage::url($book->cover_path) }}" alt="{{ $book->title }}" class="d-block rounded"
                    height="300" width="200" id="bookCover">
                <div>
                    <h3 class="mb-1">{{ $book->title }}</h3>
                    <h6 class="mb-3">Jumlah Buku: {{ $book->quantity }}</h6>
                    <p class="mb-3"><strong>Kategori Buku:</strong> {{ $book->category->category_name ?? 'N/A' }}</p>
                    <p class="mb-3"><strong>Description:</strong> {{ $book->description }}</p>
                    <p class="mb-3"><strong>Tanggal upload:</strong> {{ $book->created_at->format('d M Y') }}</p>
                    <p class="mb-3"><strong>Di Upload Oleh:</strong></p>
                    <div class="d-flex align-items-center">
                        <img src="{{ $book->user->profile_photo ? asset('storage/' . $book->user->profile_photo) : 'assets-admin/img/avatars/nophoto.png' }}"
                            alt="User Avatar" class="rounded-circle" height="80" width="80">
                        <div class="ms-3">
                            <h6 class="mb-0">{{ $book->user->fullname }} | {{ $book->user->role }}</h6>
                            <small class="d-block">{{ $book->created_at->format('d M Y, H:i') }}</small>
                        </div>
                    </div>
                    <!-- Button to view PDF -->
                    @if ($book->file_path)
                        <a href="{{ Storage::url($book->file_path) }}" class="btn btn-primary mt-3" target="_blank">Lihat
                            Buku PDF Sekarang</a>
                    @else
                        <p class="mt-3 text-muted">No PDF available for this book.</p>
                    @endif
                </div>
            </div>

            <!-- Edit and Delete Buttons -->
            <div class="d-flex justify-content-end">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning me-2">Edit</a>
                <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger delete-book" data-id="{{ $book->id }}">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script for delete confirmation -->
    <script>
        document.querySelectorAll('.delete-book').forEach(button => {
            button.addEventListener('click', function() {
                let bookId = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Anda Yakin menghapus?',
                    text: "Jika anda menghapus data tidak dapat dikembalikan lagi!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + bookId).submit();
                    }
                });
            });
        });
    </script>
@endsection
