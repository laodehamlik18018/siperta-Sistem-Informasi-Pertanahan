<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="m-0 font-weight-bold text-primary">Ubah Kategori</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Beranda'); ?>">Home</a></li>
            <li class="breadcrumb-item">Data Kategori</li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="card-body">
                    <?php foreach ($kategori as $u) { ?>
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/Kategori_tanah/proses_edit_kategori">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Status Hak Tanah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="status_hak_tanah" value="<?php echo $u->status_hak_tanah; ?>" placeholder="Status Hak Tanah">
                                    <input type="hidden" name="id_kategori" class="form-control" value="<?php echo $u->id_kategori; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Warna</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="warna" value="<?php echo $u->warna; ?>" placeholder="warna">
                                </div>
                            </div>

                            <div class=" form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn  btn-primary" name="submit">Ubah Data</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>