<style>
    .label {
        color: #1abc9c;
        font-family: helvetica;
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

    .nosubmit-user {
        width: 500px;
        border-radius: 50px;
        display: block;
        padding: 9px 4px 9px 40px;
        background: #ffffff;
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
                                <label class="label">Desa:</label><br>
                            </h5>
                            <h6 class="kotak">
                                Lantawonua
                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">Kecamatan :</label><br>
                            </h5>
                            <h6 class="kotak">
                                Rumbia
                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">Kabupaten</label><br>
                            </h5>
                            <h6 class="kotak">
                                Bombana
                            </h6>
                        </li>
                        <li>
                            <h5>
                                <label class="label">Kode Warna</label><br>
                            </h5>
                            <h6 class="kotak">
                                <img src="<?= base_url(); ?>assets/img/logo/kode2.png" alt="">
                            </h6>
                        </li>
                        <li>
                            <div class="container">
                                <img src="<?= base_url(); ?>assets/img/logo/arah.png" alt="" style="width:150px">
                            </div>
                        </li>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <div class="pcoded-main-container">
        <div class="pcoded-content-user">
            <form action="<?php echo base_url('C_user/cari') ?>" method="post">
                <input class="nosubmit-user" type="search" placeholder="Masukkan Nomor Hak Tanah..." name="search" autofocus="autodocus">
            </form><br>
            <!-- <a href="http://maps.google.com/maps?q=<?= $detail->latitude ?>,<?= $detail->longitude ?>"> <button type="button" class="btn btn-primary mb-1">rute</button></a>
            <a href="<?= base_url('C_user'); ?>"> <button type="button" class="btn btn-warning mb-1">Kembali</button></a> -->
            <div id="wrapper">
                <div id="mapid" style="width:1200px;height:600px;"></div>
            </div>

        </div>
        <!-- Warning Section Ends -->

    </div>

</body>
<script>
    var map = L.map('mapid').setView([-4.766200455, 122.0383087], 15);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/satellite-v9'
    }).addTo(map);
    // L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
    // }).addTo(map);
    //  
    $.getJSON("<?= base_url('upload/polygon/rumbia.geojson'); ?>", function(data) {
        // L.geoJson function is used to parse geojson file and load on to map
        L.geoJson(data).addTo(map);
    });
    <?php foreach ($data_tanah as $key) { ?>
        $.getJSON("<?php echo base_url('upload/polygon/' . $key['polygon']); ?>", function(data) {

            geoLayer = L.geoJson(data, {
                style: function(feature) {
                    return {
                        opacity: 1.0,
                        <?php if ($key['status_sengketa'] === 'Bersengketa') { ?>
                            color: '<?= '#FF0000' ?>'
                        <?php } else { ?>
                            color: '<?= $key['warna_tanah']; ?>'
                        <?php } ?>,

                    }
                },
            }).addTo(map).bindTooltip("No Hak : <?= $key['no_hak']; ?><br> NIB : <?= $key['nib']; ?><br> Jenis tanah : <?= $key['status_hak_tanah']; ?>");
        });
    <?php } ?>
</script>