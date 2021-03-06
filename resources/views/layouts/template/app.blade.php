<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/admin/css/fontawesome-free.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('vendor/admin/css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/admin/css/bootstrap-table.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">


        <!-- Sidebar -->
    @include('admin::layouts.template.sidebar')
    <!-- End of Sidebar -->

        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->

        @include('admin::layouts.template.main')
        <!-- End of Main Content -->

            <!-- Footer -->
        @include('admin::layouts.template.footer')
        <!-- End of Footer -->


        <!-- End of Content Wrapper -->
    </div>


        <flash-component
                :message="{{ json_encode(session()->get('message')) }}"
        ></flash-component>

</div>
<!-- End of Page Wrapper -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Custom scripts for all pages-->

<script src="{{ asset("vendor/admin/js/app.js") }}"></script>

@stack('scripts')
</body>

</html>
