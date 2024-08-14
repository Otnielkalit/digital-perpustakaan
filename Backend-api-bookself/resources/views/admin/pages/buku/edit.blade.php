@extends('admin.layout.admin_master')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body">
            <form id="formAccountSettings" action="{{ route('books.update', $book->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Left Section for Cover Image -->
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/' . $book->cover_path) }}" alt="Book Cover" class="d-block rounded"
                            height="300" width="200" id="uploadedAvatar">
                    </div>

                    <!-- Right Section for Form Fields -->
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Buku</label>
                            <input class="form-control" type="text" id="title" name="title"
                                value="{{ $book->title }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $book->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="bookcategory_id" class="form-label">Kategori</label>
                            <select class="form-select" id="bookcategory_id" name="bookcategory_id" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $book->bookcategory_id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input class="form-control" type="number" id="quantity" name="quantity"
                                value="{{ $book->quantity }}" min="1" required>
                        </div>

                        <div class="button-wrapper mb-4">
                            <label for="cover_path" class="btn btn-primary me-2" tabindex="0">
                                <span class="d-none d-sm-block">Upload Cover Baru</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="cover_path" name="cover_path" class="account-file-input" hidden
                                    accept="image/png, image/jpeg">
                            </label>
                            <p class="text-muted mb-0">Allowed JPG, GIF, or PNG. Max size of 800K</p>
                        </div>

                        <div class="mb-3">
                            <label for="file_path" class="form-label">File Buku (PDF)</label>
                            <input class="form-control" type="file" id="file_path" name="file_path"
                                accept="application/pdf">
                        </div>

                        <div class="text-end">
                            <button type="button" class="btn btn-primary" id="submitBtn">Update Buku</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data buku akan diubah!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah sekarang!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('formAccountSettings').submit();
                }
            });
        });
    </script>
@endsection
