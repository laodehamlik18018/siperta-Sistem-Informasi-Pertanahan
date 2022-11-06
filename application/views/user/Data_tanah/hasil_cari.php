<?php $this->load->view('user/layout/header'); ?>
<style>
    .auth-wrapper-user {
        background-image: url("../images/back3.png");
        background-size: cover;
    }

    .nosubmit-user {
        width: 500px;
        border-radius: 50px;
        display: block;
        padding: 9px 4px 9px 40px;
        background: #ffffff;
    }

    #footer {
        width: 100%;
        /* background: #DCDCDC;
        color: white;
        position: fixed; */
        bottom: 0;
    }
</style>



<body class="auth-wrapper-user">
    <br><br><br>
    <h1 align="center">
        <span><img src="<?php echo base_url(); ?>assets/img/logo/logos.png" alt="" style="width:200px;"></span>
    </h1>
    <div align="center">
        <div class="col-6">
            <form action="<?php echo base_url('C_user/cari') ?>" method="post">
                <input class="nosubmit-user" type="search" placeholder="Masukkan Nomor Hak Tanah..." name="search" autofocus="autodocus">
            </form>
        </div>
    </div>

    <?php
    if ($hasil != []) {
    ?>
        <br>
        <br>

        <div class="container-fluid">

            <a href="<?= base_url('C_user'); ?>">
                <button type="button" class="btn btn-warning mb-1">Go Back</button></a>
            <div class="col-xl-14">
                <div class="card">
                    <br>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <h5>Hasil Cari : <?php echo $search . ' Menemukan ' . count($hasil) . ' Data'; ?></h5>
                            <?php

                            echo '<b>Total Execution Time:</b> ' . ($execution_time * 1000) . 'Milliseconds';
                            ?>

                            <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pemilik</th>
                                    <th>No Hak</th>
                                    <th>Surat Ukur</th>
                                    <th>NIB</th>
                                    <th>Luas Tanah</th>
                                    <th>Status Hak Tanah</th>
                                    <th>Status Sertifikat</th>
                                    <th>Status Sengketa</th>
                                    <th>Keterangan</th>
                                    <th>Detail</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 1;
                                    foreach ($hasil as $u) {
                                    ?>
                                        <tr>
                                            <td><?= $start; ?></td>

                                            <td><?= $u['nama_pemilik_akhir']; ?></td>
                                            <td><?= $u['no_hak']; ?></td>
                                            <td><?= $u['surat_ukur']; ?></td>
                                            <td><?= $u['nib']; ?></td>
                                            <td><?= $u['luas_tanah']; ?></td>
                                            <td><?= $u['status_hak_tanah']; ?></td>
                                            <td><?= $u['status_sertifikat']; ?></td>
                                            <td><?= $u['status_sengketa']; ?></td>
                                            <td><?= $u['keterangan']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url() . "C_user/detail_cari/" . $u['id_tanah']; ?>" class="btn  btn-primary  btn-sm">detail</a>
                                            </td>
                                        </tr>
                                    <?php $start++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <?php } elseif ($hasil == []) {
        ?>
            <div class="col-xl-12">
                <div class="card">
                    <br>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <h5>Hasil Cari : <?php echo $search . ' Menemukan ' . count($hasil) . ' Data'; ?></h5>
                            <h5 style="color:red ;">Data Tidak di Temukan, Silahkan masukkan Kata Kunci Lain...</h5>
                            <?php

                            echo '<b>Total Execution Time:</b> ' . ($execution_time * 1000) . 'Milliseconds';
                            ?>

                            <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>No Hak</th>
                                    <th>Surat Ukur</th>
                                    <th>NIB</th>
                                    <th>Luas Tanah</th>
                                    <th>Status Hak Tanah</th>
                                    <th>Status Sertifikat</th>
                                    <th>Status Sengketa</th>
                                    <th>Keterangan</th>
                                    <th>Detail</th>

                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 1;
                                    foreach ($hasil as $u) {
                                    ?>
                                        <tr>
                                            <td><?= $start; ?></td>
                                            <td><?= $u['no_hak']; ?></td>
                                            <td><?= $u['surat_ukur']; ?></td>
                                            <td><?= $u['nib']; ?></td>
                                            <td><?= $u['luas_tanah']; ?></td>
                                            <td><?= $u['status_hak_tanah']; ?></td>
                                            <td><?= $u['status_sertifikat']; ?></td>
                                            <td><?= $u['status_sengketa']; ?></td>
                                            <td><?= $u['keterangan']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url() . "user/detail_cari/" . $u['id_tanah']; ?>" class="btn  btn-primary  btn-sm">detail</a>
                                            </td>
                                        </tr>
                                    <?php $start++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</body>