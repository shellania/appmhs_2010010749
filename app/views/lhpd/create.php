<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/lhpd/simpanLhpd" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Pelapor</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama pelapor..." name="nama_pelapor">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" class="form-control" placeholder="Masukkan no. telepon..." name="no_telp">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat..." name="alamat">
                    </div>
                    <div class="form-group">
                        <label>No. KTP</label>
                        <input type="text" class="form-control" placeholder="Masukkan no. KTP..." name="no_KTP">
                    </div>
                    <div class="form-group">
                        <label>No. Registrasi</label>
                        <input type="text" class="form-control" placeholder="Masukkan no. registrasi..." name="no_registrasi">
                    </div>
                    <div class="form-group">
                        <label>No. Agenda</label>
                        <input type="text" class="form-control" placeholder="Masukkan no. agenda..." name="no_agenda">
                    </div>
                    <div class="form-group">
                        <label>Substansi</label>
                        <select class="form-control" name="substansi_id">
                            <?php foreach ($data['substansi'] as $substansi) : ?>
                                <option value="<?= $substansi['id']; ?>"><?= $substansi['nama_substansi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Instansi Terlapor</label>
                        <input type="text" class="form-control" placeholder="Masukkan instansi terlapor..." name="instansi_terlapor">
                    </div>
                    <div class="form-group">
                        <label>Perihal</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan perihal..." name="perihal"></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label>File LHPD</label>
                        <input type="file" class="form-control" name="file_lhpd">
                    </div> -->
                    <div class="form-group">
                        <label>Tanggal Bedah</label>
                        <input type="date" class="form-control" placeholder="Masukkan tanggal bedah..." name="tgl_bedah">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Laporan</label>
                        <input type="date" class="form-control" placeholder="Masukkan tanggal laporan..." name="tgl_laporan">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->