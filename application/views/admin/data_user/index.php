  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h2 class="m-0 font-weight-bold text-primary">Data User</h2>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Beranda'); ?>">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Data User</li>
          </ol>
      </div>
      <!-- <div class="col card-header text-right">
          <a href="<?php echo base_url('admin/C_Data_User/tambah_data_User'); ?>">
              <button type="button" class="btn btn-primary mb-1">Tambah</button>
          </a>
      </div> -->
      <!-- Row -->
      <div class="row">
          <!-- Datatables -->
          <div class="col-lg-12">
              <div class="card mb-4">
                  <div class="row">
                  </div>
                  <div class="table-responsive p-3">
                      <form action="<?php echo base_url('admin/C_Data_User'); ?>" method="post">
                          <div class="col-sm-12 col-md-8">
                          </div>
                      </form>
                      <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                              <tr>
                                  <!-- <th>No</th> -->
                                  <th>E-mail</th>
                                  <th>Password</th>
                                  <th>Nama</th>
                                  <th>Foto</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                // $no = 1;
                                foreach ($user as $u) {
                                    ?>
                                  <tr>
                                      <!-- <td><?= $no++; ?></td> -->
                                      <td><?= $u['email']; ?></td>
                                      <td><?= $u['password']; ?></td>
                                      <td><?= $u['nama']; ?></td>
                                      <td><img width="100 " src="<?php echo base_url(); ?>upload/user/<?= $u['foto']; ?>" /></td>
                                      <td>
                                          <a href="<?php echo base_url() . "admin/C_Data_User/edit_data_user/" . $u['id']; ?>" class="btn  btn-warning  btn-sm">ubah</a>
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