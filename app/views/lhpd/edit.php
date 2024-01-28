<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Permintaan</h1>
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
            <form role="form" action="<?= base_url; ?>/lhpd/updateLhpd" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['lhpd']['id']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nama Pelapor</label>
                            <input type="text" class="form-control" placeholder="masukkan no. surat lhpd..." name="nama_pelapor" value="<?= $data['lhpd']['nama_pelapor']; ?>">
                        </div>
                        <label>Nama Substansi</label>
                        <select class="form-control" name="substansi_id">
                            <?php foreach ($data['substansi'] as $substansi) : ?>
                                <option value="<?= $substansi['id']; ?>" <?= ($substansi['id'] == $data['lhpd']['substansi_id']) ? 'selected' : ''; ?>>
                                    <?= $substansi['nama_substansi']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>No.Telepon</label>
                        <input type="text" class="form-control" placeholder="masukkan no. surat lhpd..." name="no_telp" value="<?= $data['lhpd']['no_telp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="masukkan lampiran..." name="alamat" value="<?= $data['lhpd']['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label>No KTP</label>
                        <input type="text" class="form-control" placeholder="masukkan lampiran..." name="no_KTP" value="<?= $data['lhpd']['no_KTP']; ?>">
                    </div>
                    <div class="form-group">
                        <label>NO REGISTRASI</label>
                        <input type="text" class="form-control" placeholder="masukkan lampiran..." name="no_registrasi" value="<?= $data['lhpd']['no_registrasi']; ?>">
                    </div>
                    <div class="form-group">
                        <label>NO AGENDA</label>
                        <input type="text" class="form-control" placeholder="masukkan lampiran..." name="no_agenda" value="<?= $data['lhpd']['no_agenda']; ?>">
                    </div>
                    <div class="form-group">
                        <label>INSTANSI TERLAPOR</label>
                        <input type="text" class="form-control" placeholder="masukkan lampiran..." name="instansi_terlapor" value="<?= $data['lhpd']['instansi_terlapor']; ?>">
                    </div>
                    <div class="form-group">
                        <label> PERIHAL</label>
                        <input type="text" class="form-control" placeholder="masukkan lampiran..." name="perihal" value="<?= $data['lhpd']['perihal']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Laporan</label>
                        <input type="date" class="form-control" placeholder="masukkan tanggal surat..." name="tgl_laporan" value="<?= $data['lhpd']['tgl_laporan']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Bedah</label>
                        <input type="date" class="form-control" placeholder="masukkan tanggal surat..." name="tgl_bedah" value="<?= $data['lhpd']['tgl_bedah']; ?>">
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