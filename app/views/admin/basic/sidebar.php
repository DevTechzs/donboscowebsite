<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="ITPLlogo.png" alt="Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-dark h5 text-info p-2 ">ITPL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- leads -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fad fas fa-taxi"></i>

                        Vehicle
                       
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="vehicle-register" class="nav-link">
                                <i class="fa fa-taxi"></i>
                                <p>Request For Registered</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="vehicle-info" class="nav-link">
                            <i class="fa fa-taxi"></i>
                                <p>Vehicle Info</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="vehicle-userlists" class="nav-link">
                                <i class="fa fa-users"></i>
                                <p>User Lists</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="vehicle-contactedcustomers" class="nav-link">
                            <i class="fa fa-user"></i>
                                <p>Contacted Customers</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <!-- support -->

                <!-- Administration -->


                <!-- logout -->
                <li>
                    <a href="logout" class="nav-link btn btn-danger text-white text-left">
                        <i class="fas fa-lock nav-icon"></i>
                        <p class="">Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<!-- jQuery -->
<script src="assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/admin/js/adminlte.js"></script>
<!-- Select2 -->
<script src="assets/admin/plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert2 -->
<script src="assets/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="assets/admin/plugins/toastr/toastr.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script src="assets/js/CallService.js"></script>

<script src="assets/js/commonfunctions.js"></script>
<script src="assets/js/md5.js"></script>
<!-- <script src="assets/js/index.js"></script> -->