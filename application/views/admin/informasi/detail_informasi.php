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
                    <div class="row">
                        <div class="col-4">
                            <h5>Judul Informasi</h5>
                        </div>
                        <div class="col">
                            <h6><?= $detail->judul_informasi; ?></h6>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">
                            <h5> Isi Informasi</h5>
                        </div>
                        <div class="col">
                            <h6><?= $detail->isi_informasi; ?></h6>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-4">
                            <h5> Foto</h5>
                        </div>
                        <div class="col-4">
                            <?php
                            if (!empty($detail->foto)) {
                                ?>
                                <img src="<?= base_url('./upload/informasi/' . $detail->foto) ?>" width="150px" />
                            <?php
                            } else {
                                echo "-";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>