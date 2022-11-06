<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="m-0 font-weight-bold text-primary">Ubah Data Tanah</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Beranda'); ?>">Home</a></li>
            <li class="breadcrumb-item">Data Tanah</li>
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
                    <?php foreach ($data_tanah as $u) { ?>
                        <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/C_Data_Tanah/proses_edit_data_tanah">

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pemilik Awal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_pemilik_awal" value="<?php echo $u->nama_pemilik_awal; ?>" placeholder="Nama Pemilik awal">
                                    <input type="hidden" name="id_tanah" class="form-control" placeholder="id tanah" value="<?php echo $u->id_tanah; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Pemilik Awal</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_pemilik_akhir" value="<?php echo $u->nama_pemilik_akhir; ?>" placeholder="nama pemilik akhir">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Nomor Hak Tanah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="no_hak" value="<?php echo $u->no_hak; ?>" placeholder="No Hak">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">NIB</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nib" value="<?php echo $u->nib; ?>" placeholder="Jenis Tanah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Surat Ukur</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="surat_ukur" value="<?php echo $u->surat_ukur; ?>" placeholder="Surat Ukur">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Luas Tanah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="luas_tanah" value="<?php echo $u->luas_tanah; ?>" placeholder="Luas Tanah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Status Hak Tanah</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="status_hak_tanah" required>
                                        <?php foreach ($kategori as $key) : ?>
                                            <option value="<?= $key->status_hak_tanah ?>" <?= $key->status_hak_tanah == $u->status_hak_tanah ? "selected" : null ?> required><?= $key->status_hak_tanah ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Status Sertifikat</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="exampleFormControlSelect1" name="status_sertifikat" value="<?php echo $u->status_sertifikat; ?>">
                                        <option value="Bersertifikat" <?php if ($u->status_sertifikat == 'Bersertifikat') {
                                                                            echo 'selected';
                                                                        } ?>>Bersertifikat</option>
                                        <option value="Tidak Bersertifikat" <?php if ($u->status_sertifikat == 'Tidak Bersertifikat') {
                                                                                echo 'selected';
                                                                            } ?>>Tidak Bersertifikat</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Status Sengketa</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="exampleFormControlSelect1" name="status_sengketa">
                                        <option value="Bersengketa" <?php if ($u->status_sengketa == 'Bersengketa') {
                                                                        echo 'selected';
                                                                    } ?>>Bersengketa</option>
                                        <option value="Tidak Bersengketa" <?php if ($u->status_sengketa == 'Tidak Bersengketa') {
                                                                                echo 'selected';
                                                                            } ?>>Tidak Bersengketa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Latitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPassword3" name="latitude" value="<?php echo $u->latitude; ?>" placeholder="kordinat">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Longitude</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputPassword3" name="longitude" value="<?php echo $u->longitude; ?>" placeholder="kordinat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <input type="textarea" class="form-control" id="inputPassword3" name="keterangan" value="<?php echo $u->keterangan; ?>" placeholder="keterangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Warna</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="warna_tanah" required>
                                        <option>pilih</option>
                                        <?php foreach ($kategori as $key) : ?>
                                            <option value="<?= $key->warna ?>" <?= $key->warna == $u->warna_tanah ? "selected" : null ?> required><?= $key->status_hak_tanah ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Geojson</label>
                                <div><input type="file" name="polygon" value="<?php echo $u->polygon; ?>"></div>
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