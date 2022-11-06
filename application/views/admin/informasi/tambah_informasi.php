<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h2 class="m-0 font-weight-bold text-primary">Tambah Data Informasi</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('Beranda'); ?>">Home</a></li>
            <li class="breadcrumb-item">Data Informasi</li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/C_Data_Informasi/proses_tambah_data_informasi">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Judul Informasi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="judul_informasi" placeholder="Judul Informasi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Isi informasi</label>
                            <div class="col-sm-9">
                                <textarea id="ckeditor" class="ckeditor" name="isi_informasi" id="exampleFormControlTextarea1" rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" name="foto" required>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn  btn-primary" style="float:right ;">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var editor = CKEDITOR.replace( 'ckedutor', {
    language: 'en',
    extraPlugins: 'notification'
});

editor.on( 'required', function( evt ) {
    editor.showNotification( 'This field is required.', 'warning' );
    evt.cancel();
} );
</script>