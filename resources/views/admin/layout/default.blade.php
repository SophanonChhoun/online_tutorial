@include("admin.layout.header")
<body class="sb-nav-fixed" id="app" >
@include("admin.layout.head")

<div id="layoutSidenav">
    @include("admin.layout.sidebar")

    <div id="layoutSidenav_content">
        <!-- Page Heading -->
            <main>
                @yield("content")
            </main>
        <!-- /.row -->

    </div>
        <!-- /.container-fluid -->

    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
@include("admin.layout.footer")
@include("admin.layout.alert")

