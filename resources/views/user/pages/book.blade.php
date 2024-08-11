@extends('user.layouts.master')
@section('content')
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>List Data Buku</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Cari berdasarkan Kategori</div>
                    <ul class="main-categories">
                        <li class="main-nav-list">
                            <a href="{{ route('publik.buku') }}">
                                <span class="lnr lnr-arrow-right"></span> Semua Kategori
                            </a>
                        </li>
                        @foreach ($categories as $category)
                            <li class="main-nav-list">
                                <a href="{{ route('publik.buku', ['category' => $category->id]) }}">
                                    <span class="lnr lnr-arrow-right"></span>{{ $category->category_name }}
                                    <span>({{ $category->books->count() }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="filter-bar d-flex flex-wrap align-items-center justify-content-center">
                    <form action="{{ route('publik.buku') }}" method="GET" class="sorting">
                        <input class="form-control" name="search" placeholder="Cari Buku..."
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search for books...'" required=""
                            type="text" value="{{ request('search') }}" style="width: 100%;">
                    </form>
                </div>
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @forelse($books as $book)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <a href="{{ route('publik.buku-detail', $book->id) }}">
                                        <img class="img-fluid" src="{{ asset('storage/' . $book->cover_path) }}"
                                            alt="">
                                        <div class="product-details">
                                            <h6>{{ $book->title }}</h6>
                                            <p>{{ $book->category->category_name }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p>No books found</p>
                        @endforelse
                    </div>
                </section>
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
