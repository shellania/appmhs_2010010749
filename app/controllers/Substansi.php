<?php
class Substansi extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Substansi';
        // ... Sesuaikan dengan model yang sesuai untuk tabel substansi ...
        $data['substansi'] = $this->model('SubstansiModel')->getAllSubstansi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('substansi/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Substansi';
        // ... Sesuaikan dengan model yang sesuai untuk tabel substansi ...
        $data['substansi'] = $this->model('SubstansiModel')->cariSubstansi();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('substansi/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Substansi';
        // ... Sesuaikan dengan model yang sesuai untuk tabel substansi ...
        $data['substansi'] = $this->model('SubstansiModel')->getSubstansiById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('substansi/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Substansi';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('substansi/create', $data);
        $this->view('templates/footer');
    }

    public function simpanSubstansi()
    {
        // ... Sesuaikan dengan model yang sesuai untuk tabel substansi ...
        if ($this->model('SubstansiModel')->tambahSubstansi($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/substansi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/substansi');
            exit;
        }
    }

    public function updateSubstansi()
    {
        // ... Sesuaikan dengan model yang sesuai untuk tabel substansi ...
        if ($this->model('SubstansiModel')->updateDataSubstansi($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/substansi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/substansi');
            exit;
        }
    }

    public function hapus($id)
    {
        // ... Sesuaikan dengan model yang sesuai untuk tabel substansi ...
        if ($this->model('SubstansiModel')->deleteSubstansi($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/substansi');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/substansi');
            exit;
        }
    }
}
