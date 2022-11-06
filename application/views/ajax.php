<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "data_tanah");

//variabel nim yang dikirimkan form.php
$status_hak_tanah = $_GET['status_hak_tanah'];

//mengambil data
$query = mysqli_query($koneksi, "select * from data_tanah_autofill where status_hak_tanah='$status_hak_tanah'");
$kategori = mysqli_fetch_array($query);
$data = array(
            'warna'      =>  @$kategori['warna'],
        );

//tampil data
echo json_encode($data);
?>