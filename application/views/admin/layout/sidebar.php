<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Admin/Beranda'); ?>">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url(); ?>assets/img/logo/logoku.png">
                </div>
                <div class=" sidebar-brand-text mx-3">Siperta-Sistem Informasi Pertanahan</div>
            </a><br>
            <hr class="sidebar-divider my-0">
            <div class="sidebar-heading">
                Admin
            </div>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('Admin/Beranda'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Menu
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/C_Data_Tanah'); ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data tanah</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/kategori_tanah'); ?>">
                    <i class="fas fa-fw fa-qrcode"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/C_Data_Informasi'); ?>">
                    <i class="fas fa-fw fa-newspaper"></i>
                    <span>Data Informasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/C_Data_User'); ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Keluar</span>
                </a>
            </li>
        </ul>
        <!-- Sidebar -->
        <!-- Modal Logout -->
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda Yakin Untuk Keluar ? </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url('admin/login/logout'); ?>" class="btn btn-primary">Keluar</a>
                    </div>
                </div>
            </div>
        </div>