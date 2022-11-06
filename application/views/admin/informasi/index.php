  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h2 class="m-0 font-weight-bold text-primary">Data Informasi</h2>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Beranda'); ?>">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Data Informasi</li>
          </ol>
      </div>
      <p><?php echo $this->session->flashdata('msg'); ?></p> 
      <div class="col card-header text-right">
          <a href="<?php echo base_url('admin/C_Data_Informasi/tambah_data_informasi'); ?>">
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
                      <form action="<?php echo base_url('admin/C_Data_Informasi'); ?>" method="post">
                          <div class="col-sm-12 col-md-8">
                              <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" name="keyword" placeholder="masukan nama" aria-controls="dataTable"></label>
                                  <input class="btn btn-info btn-sm" type="submit" name="submit" style="width:100px ;">
                              </div>
                          </div>
                      </form>
                      <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                              <tr>
                                  <th>No</th>
                                  <th>judul Informasi</th>
                                  <th>Isi Informasi</th>
                                  <th>Foto</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                function limit_words($string, $word_limit)
                                {
                                    $words = explode(" ", $string);
                                    return implode(" ", array_splice($words, 0, $word_limit));
                                }
                                foreach ($informasi as $u) {
                                    ?>
                                  <tr>
                                      <td><?= ++$start; ?></td>
                                      <td><?= $u['judul_informasi']; ?></td>
                                      <td><?= limit_words($u['isi_informasi'], 20); ?></td>
                                      <td><img width="100 " src="<?php echo base_url(); ?>upload/informasi/<?= $u['foto']; ?>" /></td>
                                      <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $u['id_informasi'];?>">hapus</button>
                                          <a href="<?php echo base_url() . "admin/C_Data_Informasi/edit_data_informasi/" . $u['id_informasi']; ?>" class="btn  btn-warning  btn-sm">ubah</a>
                                          <a href="<?php echo base_url() . "admin/C_Data_Informasi/detail_data_informasi/" . $u['id_informasi']; ?>" class="btn  btn-primary  btn-sm">detail</a>
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

  </div>
  <!---Container Fluid-->
  <?php
    foreach ($informasi as $u) {
        ?>
      <div class="modal fade" id="delete<?php echo $u['id_informasi'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
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
                      <a href="<?php echo base_url() . "admin/C_Data_Informasi/hapus_data_informasi/" . $u['id_informasi']; ?>" class="btn btn-primary">Ya</a>
                  </div>
              </div>
          </div>
      </div>
  <?php } ?>
  </div>