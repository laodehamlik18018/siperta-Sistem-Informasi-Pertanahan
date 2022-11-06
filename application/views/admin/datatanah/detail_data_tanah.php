  <!-- Container Fluid-->
  <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Data Tanah</h1>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Admin/Beranda'); ?>">Home</a></li>
              <li class="breadcrumb-item">Tables</li>
              <li class="breadcrumb-item active" aria-current="page">Detail Data Tanah</li>
          </ol>
      </div>
      <!-- Row -->
      <div class="row">
          <!-- Datatables -->
          <div class="col-lg-12">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                  </div>
                  <a href="http://maps.google.com/maps?q=<?= $detail->latitude ?>,<?= $detail->longitude ?>">
                      <button type="button" class="btn btn-primary mb-1">lokasi</button></a>
                  <div class="row">

                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <div id="mapid" style="width:100%;height:380px;"></div>
                      </div>
                  </div>
                  <div class="table-responsive p-3">
                      <div class="container">

                      </div>
                      <table class="table align-items-center table-flush" id="dataTable">
                          <thead class="thead-light">
                              <tr>
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
                                  <th>Polygon</th>
                                  <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody>
                              <td><?= $detail->nama_pemilik_awal; ?></td>
                              <td><?= $detail->nama_pemilik_akhir; ?></td>
                              <td><?= $detail->no_hak; ?></td>
                              <td><?= $detail->surat_ukur; ?></td>
                              <td><?= $detail->nib; ?></td>
                              <td><?= $detail->luas_tanah; ?></td>
                              <td><?= $detail->status_hak_tanah; ?></td>
                              <td><?= $detail->status_sertifikat; ?></td>
                              <td><?= $detail->status_sengketa; ?></td>
                              <td><?= $detail->latitude; ?></td>
                              <td><?= $detail->longitude; ?></td>
                              <td><?= $detail->polygon; ?></td>
                              <td><?= $detail->keterangan; ?></td>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <!--Row-->

  </div>
  <script>
      var map = L.map('mapid').setView([<?php echo $detail->latitude ?>, <?php echo $detail->longitude ?>], 30);

      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
          attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
              '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
              'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          id: 'mapbox/satellite-v9'
      }).addTo(map);
      // L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      //     attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
      // }).addTo(map);
      $.getJSON("<?= base_url('upload/polygon/' . $detail->polygon); ?>", function(data) {
          geoLayer = L.geoJson(data, {
              style: function(feature) {
                  return {
                      opacity: 1.0,
                      <?php if ($detail->status_sengketa === 'Bersengketa') { ?>
                          color: '<?= '#FF0000' ?>'
                      <?php } else { ?>
                          color: '<?= $detail->warna_tanah; ?>'
                      <?php } ?>,

                  }
              },
          }).addTo(map)
      });
  </script>
  <!---Container Fluid-->