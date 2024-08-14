@extends('admin.layout.admin_master')

@section('content')
    <div class="card mb-4">
        <h5 class="card-header">{{ $title }}</h5>
        <div class="card-body">
            <form id="formAccountSettings" action="{{ route('book-category.update', $bookCategory->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- Avatar Section -->
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <img src="{{ asset('storage/' . $bookCategory->image) }}" alt="Category Image"
                            class="d-block rounded" height="300" width="200" id="uploadedAvatar">
                    </div>

                    <!-- Form Section -->
                    <div class="col-md-8">
                        <div class="d-flex flex-column justify-content-start">
                            <div class="mb-3">
                                <label for="category_name" class="form-label">Nama Kategori</label>
                                <input class="form-control" type="text" id="category_name" name="category_name"
                                    value="{{ $bookCategory->category_name }}" autofocus>
                            </div>

                            <!-- File Upload and Reset Button -->
                            <div class="button-wrapper mb-4">
                                <label for="upload" class="btn btn-primary me-2" tabindex="0">
                                    <span class="d-none d-sm-block">Upload Foto Baru</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="image" class="account-file-input" hidden
                                        accept="image/png, image/jpeg">
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset">
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12 text-end">
                        <button type="button" class="btn btn-primary" id="submitBtn">Update Kategori</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Kategori akan diubah!",
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
