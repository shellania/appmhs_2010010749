<?php

class Mahasiswa extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['session_login']) || $_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Mahasiswa';
        // Ganti model dan method sesuai dengan kebutuhan
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Mahasiswa';
        // Ganti model dan method sesuai dengan kebutuhan
        $data['program_studi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/create', $data);
        $this->view('templates/footer');
    }

    public function simpanMahasiswa()
    {
        // Logika untuk menyimpan data mahasiswa
        // Ganti model dan method sesuai dengan kebutuhan
        // Contoh:
        if ($this->model('MahasiswaModel')->tambahMahasiswa($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        // Ganti model dan method sesuai dengan kebutuhan
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
        $data['program_studi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/edit', $data);
        $this->view('templates/footer');
    }

    public function updateMahasiswa()
    {
        // Logika untuk mengupdate data mahasiswa
        // Ganti model dan method sesuai dengan kebutuhan
        // Contoh:
        if ($this->model('MahasiswaModel')->updateDataMahasiswa($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        // Logika untuk menghapus data mahasiswa
        // Ganti model dan method sesuai dengan kebutuhan
        // Contoh:
        if ($this->model('MahasiswaModel')->deleteMahasiswa($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/mahasiswa');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Mahasiswa';
        // Logika untuk melakukan pencarian mahasiswa
        // Ganti model dan method sesuai dengan kebutuhan
        // Contoh:
        $data['mahasiswa'] = $this->model('MahasiswaModel')->cariMahasiswa();
        $data['program_studi'] = $this->model('ProgramStudiModel')->getAllProgramStudi();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Mahasiswa';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('mahasiswa/lihatlaporan', $data);

        // $pdf = new FPDF('p', 'mm', 'A4');

        // $pdf->AddPage();
        // // setting jenis font yang akan digunakan 
        // $pdf->SetMargins(35, 3);

        // $pdf->SetFont('Times', 'B', 14);
        // // mencetak string  
        // $pdf->Cell(190, 7, 'LAPORAN LIHAT MAHASISWA', 0, 1, 'C');
        // // Memberikan space kebawah agar tidak terlalu rapat 
        // $pdf->Cell(10, 7, '', 0, 1);
        // $pdf->SetFont('Times', 'B', 11);
        // $pdf->SetFillColor(240, 128, 128);
        // $pdf->Cell(40, 6, 'NAMA', 1, 0, 'C', true);
        // $pdf->Cell(50, 6, 'NAMA PROGRAM', 1, 0, 'C', true);
        // $pdf->Ln();
        // $pdf->SetFont('Times', '', 11);

        // foreach ($data['mahasiswa'] as $row) {
        //     $pdf->Cell(40, 6, $row['Nama'], 1);
        //     $pdf->Cell(50, 6, $row['NamaProgram'], 1);
        //     $pdf->Ln();
        // }
        // // ... (isi logika pembuatan laporan)
        // $pdf->Output('I', 'Lihat Laporan Mahasiswa.pdf', true);
    }

    public function laporan()
    {
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $pdf = new FPDF('p', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetMargins(24, 3);
        // setting jenis font yang akan digunakan 
        $pdf->SetFont('Times', 'B', 14);
        // mencetak string  
        $pdf->Cell(190, 7, 'LAPORAN MAHASISWA', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat 
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', 'B', 10);
        $pdf->SetFillColor(240, 128, 128);
        $pdf->Cell(30, 6, 'NAMA', 1, 0, 'C', true);
        $pdf->Cell(30, 6, 'ALAMAT', 1, 0, 'C', true);
        $pdf->Cell(35, 6, 'TANGGAL LAHIR', 1, 0, 'C', true);
        $pdf->Cell(35, 6, 'JENIS KELAMIN', 1, 0, 'C', true);
        $pdf->Cell(35, 6, 'NAMA PROGRAM', 1, 0, 'C', true);
        $pdf->Ln();
        $pdf->SetFont('Times', '', 11);

        foreach ($data['mahasiswa'] as $row) {
            $pdf->Cell(30, 6, $row['Nama'], 1);
            $pdf->Cell(30, 6, $row['Alamat'], 1);
            $pdf->Cell(35, 6, $row['TanggalLahir'], 1);
            $pdf->Cell(35, 6, $row['JenisKelamin'], 1);
            $pdf->Cell(35, 6, $row['NamaProgram'], 1);
            $pdf->Ln();
        }
        // ... (isi logika pembuatan laporan)
        $pdf->Output('I', 'Laporan Mahasiswa.pdf', true);
    }

    public function laporanjumlah()
    {
        $data['title'] = 'Data Laporan Mahasiswa';
        $data['jumlah_mahasiswa'] = $this->model('MahasiswaModel')->getJumlahMahasiswaByProgramStudi();
        $this->view('mahasiswa/laporanjumlah', $data);

        $pdf = new FPDF('p', 'mm', 'A4');

        $pdf->AddPage();
        $pdf->SetMargins(55, 3);
        // setting jenis font yang akan digunakan 
        $pdf->SetFont('Times', 'B', 14);
        $pdf->SetFillColor(240, 128, 128);
        // mencetak string  
        $pdf->Cell(190, 7, 'LAPORAN JUMLAH MAHASISWA PER PRODI', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat 
        $pdf->Ln(4);
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell(45, 10, 'NAMA PROGRAM', 1, 0, 'C', true);
        $pdf->Cell(45, 10, 'JUMLAH MAHASISWA', 1, 0, 'C', true);
        $pdf->Ln();
        $pdf->SetFont('Times', '', 11);

        foreach ($data['jumlah_mahasiswa'] as $row) {
            $pdf->Cell(45, 10, $row['NamaProgram'], 1, 0, 'J');
            $pdf->Cell(45, 10, $row['JumlahMahasiswa'], 1, 0, "C");
            $pdf->Ln();
        }

        $pdf->Output('I', 'Lihat Laporan Mahasiswa.pdf', true);
    }
}
