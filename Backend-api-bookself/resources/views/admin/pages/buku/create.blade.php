@extends('admin.layout.admin_master')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Form Left Section -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Buku</label>
                            <input class="form-control" type="text" id="title" name="title"
                                value="{{ old('title') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="bookcategory_id" class="form-label">Kategori</label>
                            <select class="form-select" id="bookcategory_id" name="bookcategory_id" required>
                                <option value="" selected disabled>Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input class="form-control" type="number" id="quantity" name="quantity"
                                value="{{ old('quantity') }}" min="1" required>
                        </div>
                    </div>

                    <!-- Form Right Section -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cover_path" class="form-label">Cover Buku</label>
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="assets-admin/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                    height="100" width="100" id="uploadedAvatar">
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload cover</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" name="cover_path" id="upload" class="account-file-input"
                                            hidden accept="image/png, image/jpeg">
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                    <p class="text-muted mb-0">Format yang diperbolehkan JPG, GIF, atau PNG. Ukuran maksimal
                                        800K</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="file_path" class="form-label">File Buku (PDF)</label>
                            <input class="form-control" type="file" id="file_path" name="file_path"
                                accept="application/pdf" required>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary">Tambah Buku</button>
                </div>
            </form>
        </div>
    </div>
@endsection
