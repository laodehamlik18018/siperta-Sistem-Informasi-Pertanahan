<?php
$b = $data->row_array();
?>
<style>
    #footer {
        width: 100%;
        /* background: #DCDCDC;
        color: white; */
        position: fixed;
        bottom: 0;
    }
</style>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
        <div class="container">
            <h2>Informasi/Detail Informasi</h2>
            <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-8">
                    <img src="<?php echo base_url() . 'upload/informasi/' . $b['foto']; ?>" class="img-fluid" alt="">
                    <h3><?= $b['judul_informasi']; ?></h3>
                    <p>
                        <?= $b['isi_informasi']; ?>
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End Cource Details Section -->

    <!-- ======= Cource Details Tabs Section ======= -->


</main><!-- End #main -->