@extends('admin.layout.admin_master')
@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div class="d-flex flex-column justify-content-center">
            <h4 class="mb-1 mt-3">{{ $title }}</h4>
        </div>
        <div class="d-flex align-content-center flex-wrap gap-3">
            <a href="{{ route('book-category.create') }}" class="btn btn-primary">Buat Kategori</a>
        </div>
    </div>
    <div class="row">
        @forelse ($categories as $data)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="mb-2 pb-1 text-center">{{ $data['category_name'] }}</h4>
                        <div class="rounded-3 text-center mb-3 pt-4">
                            <img class="img-fluid w-60"
                                src="{{ $data->image ? asset('storage/' . $data->image) : 'path/to/default-image.png' }}"
                                alt="Card image" />
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <a href="{{ route('book-category.edit', $data->id) }}" class="btn btn-warning">
                                    <span class="tf-icons bx bx-pencil"></span>&nbsp;Edit
                                </a>
                            </div>
                            <div class="col-auto">
                                <form action="{{ route('book-category.destroy', $data->id) }}" method="POST"
                                    class="delete-category-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-delete-category">
                                        <span class="tf-icons bx bx-trash"></span>&nbsp;Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="container-xxl container-p-y d-flex justify-content-center align-items-center">
                <div class="misc-wrapper text-center">
                    <h2 class="mb-2 mx-2 ">Belum ada Kategori Buku</h2>
                    <a href="{{ route('book-category.create') }}" class="btn btn-primary">Buat Kategori</a>
                    <div class="mt-4">
                        <img src="assets-admin/img/illustrations/girl-doing-yoga-light.png" alt="girl-doing-yoga-light"
                            width="500" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png"
                            data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                    </div>
                </div>
            </div>
        @endforelse
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete-category');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const form = button.closest('form');
                Swal.fire({
                    title: 'Yakin Menghapus Kategori ini?',
                    text: "Jika anda menghapus maka data tidak akan bisa kembali!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
    