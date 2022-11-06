<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="<?php echo base_url('upload/user/' . $session_user->foto); ?>" style="max-width: 100px">
                        <div class="user-details">
                            <span><?= $session_user->nama ?></span>
                            <div id="more-details">Admin</div>
                        </div>
                        <!-- <span class="ml-2 d-none d-lg-inline text-white small"><?= $session_user->nama ?></span> -->
                    </a>
                    <!-- Modal Logout -->
                </li>
            </ul>
        </nav>
        <!-- Topbar -->