<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="assets-admin/" data-template="vertical-menu-template-free">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} | {{ $title }}</title>
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="assets-admin/img/favicon/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets-admin/vendor/fonts/boxicons.css">
    <link rel="stylesheet" href="assets-admin/vendor/css/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="assets-admin/vendor/css/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="assets-admin/css/demo.css">
    <link rel="stylesheet" href="assets-admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets-admin/vendor/libs/apex-charts/apex-charts.css">
    <script src="assets-admin/vendor/js/helpers.js"></script>
    <script src="assets-admin/js/config.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS for SweetAlert z-index -->
    <style>
        .swal2-container {
            z-index: 2000 !important;
            /* Adjust this value if necessary */
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.layout.sidebar')
            <div class="layout-page">
                @include('admin.layout.header')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @include('flash::message')
                        @include('sweetalert::alert')
                        @yield('content')
                    </div>
                    @include('admin.layout.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="assets-admin/vendor/libs/jquery/jquery.js"></script>
    <script src="assets-admin/vendor/libs/popper/popper.js"></script>
    <script src="assets-admin/vendor/js/bootstrap.js"></script>
    <script src="assets-admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets-admin/vendor/js/menu.js"></script>
    <script src="assets-admin/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets-admin/js/main.js"></script>
    <script src="assets-admin/js/dashboards-analytics.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="assets-admin/js/pages-account-settings-account.js"></script>

</body>

</html>
