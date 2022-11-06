  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h2 class="m-0 font-weight-bold text-primary">Data Kategori</h2>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Admin/Beranda'); ?>">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Data Kategori</li>
          </ol>
      </div>
      <p><?php echo $this->session->flashdata('msg'); ?></p>
      <div class="col card-header text-right">
          <a href="<?php echo base_url('admin/Kategori_tanah/tambah_kategori'); ?>">
              <button type="button" class="btn btn-primary mb-1">Tambah</button>
          </a>
      </div>
      <!-- Row -->
      <div class="row">
          <!-- Datatables -->
          <div class="col-lg-12">
              <div class="card mb-4">
                  <div class="row">
                  </div>
                  <div class="table-responsive p-3">
                      <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                              <tr>
                                  <th>No</th>
                                  <th>Status Hak Tanah</th>
                                  <th>Warna</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                $no = 1;
                                foreach ($kategori as $u) {
                                ?>
                                  <tr>
                                      <td><?= $no++; ?></td>
                                      <td><?= $u['status_hak_tanah']; ?></td>
                                      <td bgcolor="<?= $u['warna']; ?>"></td>
                                      <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $u['id_kategori']; ?>">hapus</button>
                                          <a href="<?php echo base_url() . "admin/Kategori_tanah/edit_kategori/" . $u['id_kategori']; ?>" class="btn  btn-warning  btn-sm">ubah</a>

                                      </td>
                                  </tr>
                              <?php
                                }
                                ?>
                          </tbody>
                      </table>
                  </div>
              </div>

          </div>

      </div>
      <!--Row-->
  </div>
  <!---Container Fluid-->
  <?php
    foreach ($kategori as $u) {
    ?>
      <div class="modal fade" id="delete<?php echo $u['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
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
                      <a href="<?php echo base_url() . "admin/Kategori_tanah/hapus_kategori/" . $u['id_kategori']; ?>" class="btn btn-primary">Ya</a>
                  </div>
              </div>
          </div>
      </div>
  <?php } ?>