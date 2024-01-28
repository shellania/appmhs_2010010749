<?php

class Lhpd extends Controller
{
    public function __construct()
    {
        // Sesuaikan konstruktor sesuai kebutuhan, misalnya untuk pengecekan login
    }

    public function index()
    {
        $data['title'] = 'Data LHPD';
        $data['lhpd'] = $this->model('LhpdModel')->getAllLhpd();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('lhpd/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah LHPD';
        $data['substansi'] = $this->model('SubstansiModel')->getAllSubstansi();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('lhpd/create', $data);
        $this->view('templates/footer');
    }

    public function simpanLhpd()
    {
        $data = [
            'nama_pelapor'      => $_POST['nama_pelapor'],
            'no_telp'           => $_POST['no_telp'],
            'alamat'            => $_POST['alamat'],
            'no_KTP'            => $_POST['no_KTP'],
            'no_registrasi'     => $_POST['no_registrasi'],
            'no_agenda'         => $_POST['no_agenda'],
            'substansi_id'      => $_POST['substansi_id'],
            'instansi_terlapor' => $_POST['instansi_terlapor'],
            'perihal'           => $_POST['perihal'],
            'tgl_bedah'         => $_POST['tgl_bedah'],
            'tgl_laporan'       => $_POST['tgl_laporan'],
        ];
        // Move the uploaded file to the destination folde
        if ($this->model('LhpdModel')->tambahLhpd($data) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/lhpd');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/lhpd');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit LHPD';
        $data['lhpd'] = $this->model('LhpdModel')->getLhpdById($id);
        $data['substansi'] = $this->model('SubstansiModel')->getAllSubstansi();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('lhpd/edit', $data);
        $this->view('templates/footer');
    }

    public function updateLhpd()
    {
        if ($this->model('LhpdModel')->updateDataLhpd($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/lhpd');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/lhpd');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('LhpdModel')->deleteLhpd($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/lhpd');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/lhpd');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Lhpd';
        // Logika untuk melakukan pencarian mahasiswa
        // Ganti model dan method sesuai dengan kebutuhan
        // Contoh:
        $data['lhpd'] = $this->model('LhpdModel')->cariLhpd();
        $data['substansi'] = $this->model('SubstansiModel')->getAllSubstansi();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('lhpd/index', $data);
        $this->view('templates/footer');
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Lhpd';
        $data['lhpd'] = $this->model('LhpdModel')->getAllLhpd();
        $this->view('lhpd/lihatlaporan', $data);

        // $pdf = new FPDF('p', 'mm', 'A4');

        // $pdf->AddPage();
        // $pdf->SetMargins(20, 3);

        // $pdf->SetFont('Arial', 'B', 14);
        // // mencetak string
        // $pdf->Cell(190, 7, 'LAPORAN BUKU', 0, 1, 'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        // $pdf->Cell(10, 7, '', 0, 1);
        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->SetFillColor(240, 128, 128);
        // $pdf->Cell(40, 6, 'NAMA PELAPOR', 1);
        // $pdf->Cell(35, 6, 'NAMA SUBSTANSI', 1);
        // $pdf->Cell(35, 6, 'NOMOR KTP', 1);
        // $pdf->Cell(35, 6, 'NO REGISTRASI', 1);
        // $pdf->Cell(40, 6, 'ISTANSI TERLAPOR', 1);
        // $pdf->Ln();
        // $pdf->SetFont('Arial', '', 10);

        // foreach ($data['lhpd'] as $row) {
        //     $pdf->Cell(40, 6, $row['nama_pelapor'], 1);
        //     $pdf->Cell(35, 6, $row['nama_substansi'], 1);
        //     $pdf->Cell(35, 6, $row['no_KTP'], 1);
        //     $pdf->Cell(35, 6, $row['no_registrasi'], 1);
        //     $pdf->Cell(40, 6, $row['instansi_terlapor'], 1);
        //     $pdf->Ln();
        // }
        // // ... (isi logika pembuatan laporan)
        // $pdf->Output('I', 'Lihat Laporan Lhpd.pdf', true);
    }

    public function laporan()
    {
        $data['lhpd'] = $this->model('LhpdModel')->getAllLhpd();
        $pdf = new FPDF('L', 'mm', 'A4');

        $pdf->AddPage();
        $pdf->SetMargins(12, 3);
        // setting jenis font yang akan digunakan 
        $pdf->SetFont('Times', 'B', 14);
        // mencetak string  
        $pdf->Cell(275, 7, 'LAPORAN LHPD', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat 

        $pdf->SetFont('Times', 'B', 11);
        $pdf->SetFillColor(240, 128, 128);
        $pdf->Cell(10, 6, '', 0, 1);
        $pdf->SetFont('Times', 'B', 11);
        $pdf->Cell(10, 6, "No", 1, 0, "C", true);
        $pdf->Cell(40, 6, 'NAMA PELAPOR', 1, 0, 'C', true);
        $pdf->Cell(35, 6, 'SUBSTANSI', 1, 0, 'C', true);
        $pdf->Cell(32, 6, 'NO TELEPON', 1, 0, 'C', true);
        $pdf->Cell(35, 6, 'NO KTP', 1, 0, 'C', true);
        $pdf->Cell(40, 6, 'NO REGISTRASI', 1, 0, 'C', true);
        $pdf->Cell(35, 6, 'NO AGENDA', 1, 0, 'C', true);
        $pdf->Cell(45, 6, 'INSTANSI LAPORAN', 1, 0, 'C', true);
        $pdf->Ln();
        $pdf->SetFont('Times', '', 11);
        $no = 1;
        foreach ($data['lhpd'] as $row) {
            $pdf->Cell(10, 6, $no++, 1, 0, "C");
            $pdf->Cell(40, 6, $row['nama_pelapor'], 1);
            $pdf->Cell(35, 6, $row['nama_substansi'], 1);
            $pdf->Cell(32, 6, $row['no_telp'], 1);
            $pdf->Cell(35, 6, $row['no_KTP'], 1);
            $pdf->Cell(40, 6, $row['no_registrasi'], 1);
            $pdf->Cell(35, 6, $row['no_agenda'], 1);
            $pdf->Cell(45, 6, $row['instansi_terlapor'], 1);
            $pdf->Ln();
        }
        // ... (isi logika pembuatan laporan)
        $pdf->Output('I', 'Laporan LHPD.pdf', true);
    }

    public function laporanjumlah()
    {
        $data['title'] = 'Data Laporan Jumlah LHPD';
        $data['jumlah_lhpd'] = $this->model('LhpdModel')->getJumlahLhpdBySubstansi();
        $this->view('lhpd/laporanjumlah', $data);
    }
}
