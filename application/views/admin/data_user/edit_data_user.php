<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="m-0 font-weight-bold text-primary">Tambah Data User</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Beranda'); ?>">Home</a></li>
            <li class="breadcrumb-item">Data User</li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="card-body">
                    <?php foreach ($user as $u) { ?>

                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url() . 'admin/C_Data_User/proses_edit_data_user'; ?>">
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="username">E-mail</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo $u->email; ?>" id="username" aria-describedby="Masukkan Email and" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" value="<?php echo $u->password; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    <button type="submit" name="update" class="btn  btn-primary" value="update">Ubah</button>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label>Nama User</label>
                                        <input type="hidden" name="id" class="form-control" placeholder="Nama Lengkap" value="<?php echo $u->id; ?>">
                                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?php echo $u->nama; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Foto</label>
                                        <input type="hidden" name="foto" value="<?php echo $u->foto ?>" />
                                        <div class="form-group col-md-6">
                                            <?php
                                                if (!empty($u->foto)) {
                                                    ?>
                                                <img src="<?= base_url('./upload/user/' . $u->foto) ?>" width="150px" />
                                            <?php
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                        </div>
                                        <div><input type="file" name="foto" value="<?php echo $u->foto ?>"></div>

                                    </div>
                                </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>