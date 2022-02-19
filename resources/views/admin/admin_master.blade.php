<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Katheay Dai</title>

    <!-- vendor css -->
    <link href="{{ asset('adminbackend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('main/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">


    <link href="{{ asset('adminbackend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('adminbackend/css/starlight.css') }}">
    <link rel="stylesheet" href="{{ asset('adminbackend/css/custom.css') }}">
    <link href="{{ asset('main/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- summernote the Text Editor for laravel CSS -->
    <link href="{{ asset('adminbackend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <!-- tagsinput CSS -->
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />

    <!-- Toastr css for Notification -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    @yield('external-css')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('admin.body.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.body.header')

                <!-- ########## START: MAIN PANEL ########## -->
                <div class="container-fluid">
                    <nav class="breadcrumb sl-breadcrumb">
                        <a class="breadcrumb-item" href="{{ URL::to('/admin/dashboard') }}">Katheay Dai</a>
                        <span class="breadcrumb-item active">Dashboard</span>
                    </nav>

                    @yield('admin')

                    @include('admin.body.footer')
                </div><!-- sl-mainpanel -->
            </div>
        </div>
    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('admin.logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ asset('adminbackend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/d3/d3.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/Flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    <script src="{{ asset('adminbackend/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('adminbackend/js/starlight.js') }}"></script>
    <script src="{{ asset('adminbackend/js/ResizeSensor.js') }}"></script>
    <script src="{{ asset('adminbackend/js/dashboard.js') }}"></script>

    <!-- summernote js -->
    <script src="{{ asset('adminbackend/lib/medium-editor/medium-editor.js') }}"></script>
    <script src="{{ asset('adminbackend/lib/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('adminbackend/js/editor.js') }}"> </script>

    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />

    <!-- toastr js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- sweetalert js -->
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>

    <script>
        $(function($) {
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
        });
    </script>

</body>

</html>
