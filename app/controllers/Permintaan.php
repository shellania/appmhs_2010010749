<?php
class Permintaan extends Controller
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
        $data['title'] = 'Data Permintaan';
        $data['permintaan'] = $this->model('PermintaanModel')->getAllPermintaan();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('permintaan/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Permintaan';
        $data['permintaan'] = $this->model('PermintaanModel')->cariPermintaan();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('permintaan/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Permintaan';
        $data['permintaan'] = $this->model('PermintaanModel')->getPermintaanById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('permintaan/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Permintaan';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('permintaan/create', $data);
        $this->view('templates/footer');
    }

    public function simpanPermintaan()
    {
        if ($this->model('PermintaanModel')->tambahPermintaan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/permintaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/permintaan');
            exit;
        }
    }

    public function updatePermintaan()
    {
        if ($this->model('PermintaanModel')->updateDataPermintaan($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/permintaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/permintaan');
            exit;
        }
    }

    public function handleFileUpload($uploadedFile)
    {
        // Direktori tempat menyimpan file
        $uploadDirectory = 'path/to/upload/file_permintaan/';

        // Membuat nama file yang unik
        $uploadedFileName = uniqid() . '_' . $uploadedFile['name'];

        // Menyusun path lengkap tujuan file
        $fileDestination = $uploadDirectory . $uploadedFileName;

        // Memindahkan file dari direktori sementara ke direktori tujuan
        move_uploaded_file($uploadedFile['tmp_name'], $fileDestination);

        // Setelah file dipindahkan, Anda dapat menyimpan informasi file ke database atau melakukan tindakan lainnya.
        // Contoh: menyimpan informasi file ke database
        $this->saveFileInfoToDatabase($uploadedFileName);

        // Mengembalikan nama file atau status unggahan
        return $uploadedFileName;
    }



    public function hapus($id)
    {
        if ($this->model('PermintaanModel')->deletePermintaan($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/permintaan');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/permintaan');
            exit;
        }
    }
}
