@extends('user.layouts.master')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="comment-form">
                        <h4>Tambah Buku Baru</h4>
                        <form action="{{ route('user-book.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-lg-6">
                                    <!-- Book Title -->
                                    <div class="form-group mb-3">
                                        <label for="title">Judul Buku</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            placeholder="Masukkan Judul Buku" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Masukkan Judul Buku'" required>
                                    </div>

                                    <!-- Category -->
                                    <div class="form-group mb-3">
                                        <label for="bookcategory_id">Kategori</label>
                                        <select class="form-control" id="bookcategory_id" name="bookcategory_id" required>
                                            <option value="">Pilih Kategori</option>
                                            <!-- Assuming $categories is passed to the view -->
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group mb-3">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Masukkan Deskripsi Buku"
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan Deskripsi Buku'" required></textarea>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="form-group mb-3">
                                        <label for="quantity">Jumlah</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            placeholder="Masukkan Jumlah Buku" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Masukkan Jumlah Buku'" min="1" required>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-lg-6">
                                    <!-- Cover Image -->
                                    <div class="form-group mb-3">
                                        <label for="cover_path">Gambar Sampul</label>
                                        <input type="file" class="form-control" id="cover_path" name="cover_path"
                                            accept="image/*" required>
                                        <!-- Image preview -->
                                        <div class="mt-3">
                                            <img id="cover_image_preview" src="#" alt="Preview"
                                                style="display: none; max-width: 100%; height: auto;">
                                        </div>
                                    </div>

                                    <!-- PDF File -->
                                    <div class="form-group mb-3">
                                        <label for="file_path">File PDF</label>
                                        <input type="file" class="form-control" id="file_path" name="file_path"
                                            accept=".pdf" required>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="form-group mt-4">
                                        <button type="submit" class="primary-btn submit_btn">Tambah Buku</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript to preview the selected cover image -->
    <script>
        document.getElementById('cover_path').addEventListener('change', function(event) {
            const input = event.target;
            const file = input.files[0];
            const preview = document.getElementById('cover_image_preview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        });
    </script>
@endsection
