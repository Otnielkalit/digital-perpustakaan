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
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget mb-4">
                            <a href="{{ route('user-book.create') }}" class="primary-btn">Tambah Buku Sekarang</a>
                            <form action="{{ route('user-book.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search Books"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Books'"
                                        value="{{ request('search') }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="lnr lnr-magnifier"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Cari Berdasarkan Kategori</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="{{ route('user-book.index', ['category_id' => 'all']) }}"
                                        class="d-flex justify-content-between {{ $selectedCategory == 'all' ? 'active' : '' }}">
                                        <p>Semua Kategori</p>
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('user-book.index', ['category_id' => $category->id]) }}"
                                            class="d-flex justify-content-between {{ $selectedCategory == $category->id ? 'active' : '' }}">
                                            <p>{{ $category->category_name }}</p>
                                            <p>{{ $category->books()->count() }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="br"></div>
                        </aside>


                    </div>
                </div>
                <div class="col-lg-8 posts-list">
                    <div class="filter-bar d-flex flex-wrap align-items-center justify-content-between mb-4"></div>
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row">
                            @forelse($books as $book)
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="single-product">
                                        <a href="{{ route('publik.buku-detail', $book->id) }}">
                                            <img class="img-fluid" src="{{ asset('storage/' . $book->cover_path) }}"
                                                alt="{{ $book->title }}">
                                            <div class="product-details text-center">
                                                <h6>{{ $book->title }}</h6>
                                                <p>{{ $book->category->category_name }}</p>
                                                <!-- Edit and Delete Buttons -->
                                                <div class="btn-group mt-1">
                                                    <a href="{{ route('user-book.edit', $book->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('user-book.destroy', $book->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center">No books found</p>
                                </div>
                            @endforelse
                        </div>
                    </section>
                    <div class="filter-bar d-flex flex-wrap align-items-center justify-content-center mt-4">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
