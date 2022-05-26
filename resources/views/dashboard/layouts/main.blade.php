<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Attendance Management System</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        #notification {
            display: none;
            position: absolute;
            width: 50%;
            transform: translateX(-50%);
            left: 50%;
            top: -15px;
            z-index: 10;
            font-weight: bolder;
            font-size: 18px;
        }

        #singleTable_filter {
            text-align: right;
        }

        #singleTable_filter>input {
            display: block;
            width: 400px;
        }

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                                <span class="img-profile rounded-circle">
                                    <i class="fa fa-user" style="font-size: 30px"></i>
                                </span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- As a heading -->
                    <div class="container">
                        <nav class="navbar navbar-light bg-light shadow shadow-md">
                            <span class="navbar-brand mb-0 h1">{{ $title }}</span>
                            <div>

                                @if (!Route::is('attendance.index'))
                                    <a href="{{ route('attendance.index') }}"
                                        class="btn btn-outline-secondary my-2 my-sm-0">
                                        All attendances
                                    </a>
                                @endif


                                @if (!Route::is('employee.index'))
                                    <a href="{{ route('employee.index') }}"
                                        class="btn btn-outline-secondary my-2 my-sm-0">
                                        All Employees
                                    </a>
                                @endif

                                @if (!Route::is('employee.create') && !Route::is('employee.edit'))
                                    <a href="{{ route('employee.create') }}"
                                        class="btn btn-outline-secondary my-2 my-sm-0">
                                        Add new Employee
                                    </a>
                                @endif

                            </div>
                        </nav>
                        @if (session()->has('msg'))
                            @include('dashboard.partials._success')
                        @endif
                    </div>
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Attendance Managment System - Moaz Hamde</span>
                        <a href="mailto:moaz98hamde@gmail.com" class="mt-2 d-block">moaz98hamde@gmail.com</a>
                        <a href="tel:971556045103" class="mt-2 d-block">+971556045103</a>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
                    <form action="{{ route('logout') }}" method="POST">
                        @method('POST')
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('dashboard/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>



    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#singleTable').DataTable({
                "lengthChange": false,
                "language": {
                    search: "",
                    searchPlaceholder: "Search"

                },

            });

            $('div.dataTables_filter input').attr('type', 'date');
        });

        $("#notification").slideDown();
        setTimeout(() => {
            $("#notification").slideUp();
        }, 7000);
    </script>

</body>

</html>
