<style>
    .label {
        color: #1abc9c;
        font-family: helvetica;
        font-weight: bold;
    }

    .kotak {
        box-shadow: inset 2px 4px 4px rgba(0, 0, 0, 0.1);
        padding: 10px;
        color: black;
        margin: 7px 0;
    }

    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }

    #footer {
        width: 100%;
        background: white;
        color: black;
        position: fixed;
        bottom: 0;
    }
</style>

<body>

    <nav class="pcoded-navbar" style="background:white;">
        <div class="navbar-wrapper " style="width: 300px;">
            <ul class="nav pcoded-inner-navbar ">
                <br>
                <div style="width: 5000px; height: 700px; overflow:scroll; ">
                    <div class="container-fluid">
                        <li>
                            <h5>
                                <label class="label">No Hak:</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->no_hak; ?>
                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">Surat Ukur:</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->surat_ukur; ?>

                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">NIB</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->nib; ?>
                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">Luas Tanah</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->luas_tanah; ?>
                            </h6>
                        </li>
                        <li>

                            <h5>
                                <label class="label">Status Hak Tanah</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->status_hak_tanah; ?>
                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">Status Sertifikat</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->status_sertifikat; ?>
                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">Status Sengketa</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->status_sengketa; ?>
                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">Latitude</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->latitude; ?>
                            </h6>
                        <li>
                            <h5>
                                <label class="label">Longitude</label><br>
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->longitude; ?>
                            </h6>
                        </li>

                        <li>
                            <h5>
                                <label class="label">Keterangan<label class="label">
                            </h5>
                            <h6 class="kotak">
                                <?= $detail->keterangan; ?>
                            </h6>
                        </li>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content-user">
            <a href="http://maps.google.com/maps?q=<?= $detail->latitude ?>,<?= $detail->longitude ?>"> <button type="button" class="btn btn-primary mb-1">rute</button></a>
            <a href="<?= base_url('C_user'); ?>"> <button type="button" class="btn btn-warning mb-1">Kembali</button></a>
            <div id="wrapper">
                <div id="mapid" style="width:1250px;height:550px;"></div>
                <img src="<?= base_url(); ?>assets/img/logo/kode3.png" alt="">
            </div>

        </div>
        <!-- Warning Section Ends -->

    </div>

</body>

<script>
    var map = L.map('mapid').setView([<?php echo $detail->latitude ?>, <?php echo $detail->longitude ?>], 25);

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