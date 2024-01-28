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
        <div class="row">
            <div class="col-sm-12">
                <?php Flasher::Message(); ?>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title'] ?></h3>
                <a href="<?= base_url; ?>/lhpd/tambah" class="btn float-right btn-xs btn btn-primary">Tambah LHPD</a>

                <a href="<?= base_url; ?>/lhpd/laporan" class="btn float-right btn-xs btn btn-info" target="_blank">Laporan LHPD</a>
                <a href="<?= base_url; ?>/lhpd/lihatlaporan" class="btn float-right btn-xs btn btn-warning" target="_blank">Lihat Laporan LHPD</a>
                <a href="<?= base_url; ?>/lhpd/laporanjumlah" class="btn float-right btn-xs btn btn-success" target="_blank">Lihat Laporan Jumlah LHPD Per Substansi</a>
            </div>
            <div class="card-body">
                <form action="<?= base_url; ?>/lhpd/cari" method="post">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="" name="key">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/lhpd">Reset</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <!-- <th>ID</th> -->
                            <th>Nama Pelapor</th>
                            <th>Nama Substansi</th>
                            <th>No. Telepon</th>
                            <!-- <th>Alamat</th> -->
                            <th>No. KTP</th>
                            <th>No. Registrasi</th>
                            <th>No. Agenda</th>
                            <!-- <th>Substansi ID</th> -->
                            <th>Instansi Terlapor</th>
                            <!-- <th>Perihal</th> -->
                            <!-- <th>File LHPD</th> -->
                            <!-- <th>Tanggal Bedah</th> -->
                            <!-- <th>Tanggal Laporan</th> -->
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['lhpd'] as $lhpd) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <!-- <td>< ?= $lhpd['id']; ?></td> -->
                                <td><?= $lhpd['nama_pelapor']; ?></td>
                                <td><?= $lhpd['nama_substansi']; ?></td>
                                <td><?= $lhpd['no_telp']; ?></td>
                                <!-- <td>< ?= $lhpd['alamat']; ?></td> -->
                                <td><?= $lhpd['no_KTP']; ?></td>
                                <td><?= $lhpd['no_registrasi']; ?></td>
                                <td><?= $lhpd['no_agenda']; ?></td>
                                <!-- <td>< ?= $lhpd['substansi_id']; ?></td> -->
                                <td><?= $lhpd['instansi_terlapor']; ?></td>
                                <!--<td>< ?= $lhpd['perihal']; ?></td>-->
                                <!-- <td>< ?= $lhpd['file_lhpd']; ?></td> -->
                                <!-- <td>< ?= $lhpd['tgl_bedah']; ?></td>
                                <td>< ?= $lhpd['tgl_laporan']; ?></td> -->
                                <td>
                                    <a href="<?= base_url; ?>/lhpd/edit/<?= $lhpd['id'] ?>" class="badge badge-info">Edit</a>
                                    <a href="<?= base_url; ?>/lhpd/hapus/<?= $lhpd['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->