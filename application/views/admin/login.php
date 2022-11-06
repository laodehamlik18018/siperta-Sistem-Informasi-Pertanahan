<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <img src="<?php echo base_url(); ?>assets/img/logo/logoku.png" alt="" class="img-fluid mb-4">
                                        <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold;">SISTEM INFORMASI PERTANIAN</h1>
                                    </div>
                                    <form action="<?php echo base_url('Admin/login/aksi_login'); ?>" method="post">
                                        <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="email">
                                        </div>
                                        <div class="form-group mb-4">
                                            <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
                                        </div>
                                        <button class="btn btn-block btn-primary mb-4" type="submit" name="login">Login</button>
                                        <div class="container my-auto py-2">
                                            <div class="copyright text-center my-auto">
                                                <span>copyright &copy; <script>
                                                        document.write(new Date().getFullYear());
                                                    </script> - distributed by
                                                    <b>La Ode Hamlik Daratu Putra</a></b>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
</body>