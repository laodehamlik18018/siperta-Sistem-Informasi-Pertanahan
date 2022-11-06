<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="m-0 font-weight-bold text-primary">Tambah Data Informasi</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Beranda'); ?>">Home</a></li>
            <li class="breadcrumb-item">Data Informasi</li>
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
                    <?php foreach ($informasi as $u) { ?>
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/C_Data_Informasi/proses_edit_data_informasi">

                            <div class="form-group-row">
                                <label class="col-sm-3 col-form-label">Judul Informasi</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="id_informasi" value="<?php echo $u->id_informasi; ?>">
                                    <input type="text" class="form-control" name="judul_informasi" value="<?php echo $u->judul_informasi; ?>" aria-describedby="Masukkan Email and" placeholder="isi judul informasi">
                                </div>
                            </div>
                            <div class="form-group-row">
                                <label class="col-sm-3 col-form-label">Isi informasi</label>
                                <div class="col-sm-9">
                                    <textarea name="isi_informasi" class="ckeditor" id="ckeditor"><?= htmlentities($u->isi_informasi); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group-row">
                                <label class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="foto" value="<?php echo $u->foto ?>" />
                                </div>
                                <div class="form-group-row col-md-6">
                                    <?php
                                        if (!empty($u->foto)) {
                                            ?>
                                        <img src="<?= base_url('./upload/informasi/' . $u->foto) ?>" width="150px" />
                                    <?php
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                </div>
                                <div class="col-sm-9">
                                    <div><input type="file" name="foto" value="<?php echo $u->foto ?>"></div>
                                    <h6>jenis foto png, jpg, jpeg</h6>
                                </div>
                                <button type="submit" name="submit" class="btn  btn-primary">Ubah</button>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>