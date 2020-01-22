<div id="content">

    <!-- Topbar -->
    @include('admin::layouts.template.header')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div id="app" >
            @yield('content')
        </div>
    </div>
    <!-- /.container-fluid -->

</div>