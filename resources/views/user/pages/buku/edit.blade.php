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
                <div class="col-lg-12">
                    <form action="{{ route('user-book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $book->bookcategory_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" required>{{ $book->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="cover">Cover Image</label>
                            <input type="file" name="cover" class="form-control">
                            <small>Leave empty if you don't want to change the cover.</small>
                        </div>

                        <div class="form-group">
                            <label for="file">Book File (PDF)</label>
                            <input type="file" name="file" class="form-control">
                            <small>Leave empty if you don't want to change the file.</small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="primary-btn">Update Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
