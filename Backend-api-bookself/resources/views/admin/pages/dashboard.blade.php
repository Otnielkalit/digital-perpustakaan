@extends('admin.layout.admin_master')
@section('content')
    <div class="row">
        <!-- Welcome Card -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-8">
                        <div class="card-body">
                            <h5 class="card-title text-primary display-4">Welcome, {{ $adminName }}! 🎉</h5>
                            <p class="mb-4 fs-5">
                                Here's a summary of your digital library's data.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="assets-admin/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="col-12">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="assets-admin/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded">
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 fs-4">Categories Buku</span>
                            <h3 class="card-title mb-2 display-6">{{ $categoryCount }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="assets-admin/img/icons/unicons/wallet-info.png" alt="Users Count"
                                        class="rounded">
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 fs-4">Jumlah Users</span>
                            <h3 class="card-title text-nowrap mb-1 display-6">{{ $userCount }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="assets-admin/img/icons/unicons/wallet-info.png" alt="Books Count"
                                        class="rounded">
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1 fs-4">Jumlah Buku</span>
                            <h3 class="card-title text-nowrap mb-1 display-6">{{ $bookCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
