  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h2 class="m-0 font-weight-bold text-primary">Data Tanah</h2>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Data Tanah</li>
          </ol>
      </div>
      <p><?php echo $this->session->flashdata('msg'); ?></p>
      <div class="col card-header text-right">
          <a href="<?php echo base_url('admin/C_Data_Tanah/tambah_tanah'); ?>">
              <button type="button" class="btn btn-primary mb-1">Tambah</button>
          </a>
      </div>
      <!-- Row -->
      <div class="row">
          <!-- Datatables -->
          <div class="col-lg-12">
              <div class="card mb-4"><br>
                  <form action="<?php echo base_url('admin/C_Data_Tanah'); ?>" method="post">
                      <div class="col-sm-12 col-md-8">
                          <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" name="keyword" placeholder="masukan nama" aria-controls="dataTable"></label>
                              <input class="btn btn-info btn-sm" type="submit" name="submit" style="width:100px ;">
                          </div>
                      </div>
                  </form>
                  <div class="table-responsive p-3">
                      <h5>Hasil Cari : <?php echo $keyword . ' Menemukan ' . $total_rows . ' Data'; ?></h5>
                      <?php
                        echo '<b>Total Execution Time:</b> ' . ($execution_time * 1000) . ' Milliseconds';
                        ?>

                      <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                              <tr>
                                  <th>No</th>
                                  <th>Nama pemilik Awal</th>
                                  <th>Nama pemilik Akhir</th>
                                  <th>No Hak</th>
                                  <th>Surat Ukur</th>
                                  <th>NIB</th>
                                  <th>Luas Tanah</th>
                                  <th>Status Hak Tanah</th>
                                  <th>Status Sertifikat</th>
                                  <th>Status Sengketa</th>
                                  <th>Latitude</th>
                                  <th>Longitude</th>
                                  <th>Warna</th>
                                  <th>Keterangan</th>
                                  <th>Polygon</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                foreach ($data_tanah as $u) {
                                ?>
                                  <tr>
                                      <td><?= ++$start; ?></td>
                                      <td><?= $u['nama_pemilik_awal']; ?></td>
                                      <td><?= $u['nama_pemilik_akhir']; ?></td>
                                      <td><?= $u['no_hak']; ?></td>
                                      <td><?= $u['surat_ukur']; ?></td>
                                      <td><?= $u['nib']; ?></td>
                                      <td><?= $u['luas_tanah']; ?></td>
                                      <td><?= $u['status_hak_tanah']; ?></td>
                                      <td><?= $u['status_sertifikat']; ?></td>
                                      <td><?= $u['status_sengketa']; ?></td>
                                      <td><?= $u['latitude']; ?></td>
                                      <td><?= $u['longitude']; ?></td>
                                      <td bgcolor="<?= $u['warna_tanah']; ?>"></td>
                                      <td><?= $u['keterangan']; ?></td>
                                      <td><a href="<?= 'upload/polygon/' . $u['polygon']; ?>" target="_BLANK"><?= $u['polygon']; ?></a></td>
                                      <td class="text-center"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $u['id_tanah']; ?>">hapus</button>
                                          <!-- <a href="<?php echo base_url() . "admin/C_Data_Tanah/hapus_data_tanah/" . $u['id_tanah']; ?>" class="btn  btn-danger btn-sm" data-togle="modal">Hapus</a> -->
                                          <a href="<?php echo base_url() . "admin/C_Data_Tanah/edit_data_tanah/" . $u['id_tanah']; ?>" class="btn  btn-warning  btn-sm">ubah</a>
                                          <a href="<?php echo base_url() . "admin/C_Data_Tanah/detail_data_tanah/" . $u['id_tanah']; ?>" class="btn  btn-primary  btn-sm">detail</a>
                                      </td>
                                  </tr>
                              <?php
                                }
                                ?>
                          </tbody>
                      </table>
                  </div>
              </div>
              <?= $this->pagination->create_links(); ?>
          </div>
      </div>
      <!--Row-->
      <?php
        foreach ($data_tanah as $u) {
        ?>
          <div class="modal fade" id="delete<?php echo $u['id_tanah']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabelLogout">Yakin Ingin Dihapus ?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tidak</button>
                          <a href="<?php echo base_url() . "admin/C_Data_Tanah/hapus_data_tanah/" . $u['id_tanah']; ?>" class="btn btn-primary">Ya</a>
                      </div>
                  </div>
              </div>
          </div>
      <?php } ?>
  </div>


  <!---Container Fluid-->