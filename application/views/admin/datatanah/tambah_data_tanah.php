<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="m-0 font-weight-bold text-primary">Tambah Data Tanah</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Admin/Beranda'); ?>">Home</a></li>
            <li class="breadcrumb-item">Data Tanah</li>
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
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/C_Data_Tanah/proses_tambah_tanah">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pemilik awal</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_pemilik_awal" placeholder="Nama Pemilik Awal" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pemilik Akhir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama_pemilik_akhir" placeholder="Nama Pemilik Akhir" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nomer Hak Tanah</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no_hak" placeholder="nomor hak tanah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Surat Ukur</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="surat_ukur" placeholder="Nmor Surat Ukur" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">NIB</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nib" placeholder="NIB" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Luas Tanah</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="luas_tanah" placeholder="Luas Tanah " required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Status Hak Tanah</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status_hak_tanah" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($kategori as $key) : ?>
                                        <option value="<?= $key->status_hak_tanah ?>" required><?= $key->status_hak_tanah ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Status Sertifikat</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status_sertifikat" required>
                                    <option value="">--Pilih--</option>
                                    <option>Bersertifikat</option>
                                    <option>Tidak Bersertifikat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Status Sengketa</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status_sengketa" required>
                                    <option value="">--Pilih--</option>
                                    <option>Bersengketa</option>
                                    <option>Tidak Bersengketa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Status Hak Tanah</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="warna_tanah" required>
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($kategori as $key) : ?>
                                        <option value="<?= $key->warna ?>"><?= $key->status_hak_tanah ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Latitude</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" name="latitude" placeholder="kordinat" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Longitude</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" name="longitude" placeholder="kordinat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleFormControlTextarea1" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="keterangan" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- <label for="inputPassword3" class="col-sm-3 col-form-label"></label> -->

                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" id="inputPassword3" name="warna" placeholder="kordinat">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Geojson</label>
                            <div><input type="file" name="polygon" required></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn  btn-primary" name="submit">Tambah Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>