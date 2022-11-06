<style>
    #footer {
        width: 100%;
        /* background: #DCDCDC;
        color: white; */
        position: fixed;
        bottom: 0;
    }
</style>
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Informasi</h2>
            <p> </p>
        </div>
    </div><!-- End Breadcrumbs -->
    <?php
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
    ?>
    <!-- ======= Courses Section ======= -->
    <div class="container">
        <div class="row">
            <?php
            foreach ($informasi as $i) :
                $id = $i['id_informasi'];
                $judul = $i['judul_informasi'];
                $image = $i['foto'];
                $isi = $i['isi_informasi'];
                ?>
                <div class="col-xl-4">
                    <hr>
                    <div class="card-deck">
                        <div class="card">
                            <img class="img-fluid card-img-top" src="<?php echo base_url() . 'upload/informasi/' . $image; ?>" style="width:500px;height:300px; text-align:center" alt=" Card image cap">
                            <div class="card-body">
                                <a href="<?php echo base_url() . 'C_User/detail_informasi/' . $id; ?>">
                                    <h5 class="card-title" style="color:#1abc9c ;"><?php echo $judul; ?></h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</main>