@extends('user.layouts.master')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h2>{{ $title }}</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid d-flex mx-auto my-4" src="{{ Storage::url($book->cover_path) }}">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid d-flex mx-auto my-4" src="{{ Storage::url($book->cover_path) }}">
                        </div>
                        <div class="single-prd-item">
                            <img class="img-fluid d-flex mx-auto my-4" src="{{ Storage::url($book->cover_path) }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $book->title }}</h3>
                        <h4>Kategori: {{ $book->category->category_name }}</h4>
                        <h2>Jumlah Buku: {{ $book->quantity }}</h2>
                        <div class="card_area d-flex align-items-center mb-4">
                            <a class="primary-btn" href="{{ Storage::url($book->file_path) }}" target="_blank">Lihat Buku
                                Sekarang</a>
                        </div>

                        <div class="uploaded-by mt-3">
                            <h4>Diunggah oleh</h4>
                            <div class="media align-items-center">
                                <div class="d-flex">
                                    <img src="{{ $book->user->profile_photo ? Storage::url($book->user->profile_photo) : asset('assets-publik/img/nophoto.png') }}"
                                        alt="User Photo" class="rounded-circle" width="80" height="80">
                                </div>
                                <div class="media-body ml-3">
                                    <h5 class="mb-1">{{ $book->user->fullname ?? $book->user->name }} |
                                        {{ $book->user->role }}</h5>
                                    <h6>{{ $book->created_at->format('d F, Y H:i') }}</h6>
                                </div>
                            </div>
                        </div>
                        <div class="product_description mt-4">
                            <h4>Deskripsi</h4>
                            <p>{{ $book->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
