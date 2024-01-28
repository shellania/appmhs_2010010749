<?php

class MahasiswaModel
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT mahasiswa.*, programstudi.NamaProgram FROM ' . $this->table . ' JOIN programstudi ON programstudi.ProgramStudiID = mahasiswa.ProgramStudiID');

        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE MahasiswaID=:mahasiswaID');
        $this->db->bind('mahasiswaID', $id);

        return $this->db->single();
    }

    public function getJumlahMahasiswaByProgramStudi()
    {
        $this->db->query('SELECT programstudi.NamaProgram, COUNT(mahasiswa.MahasiswaID) AS JumlahMahasiswa 
                      FROM programstudi 
                      LEFT JOIN mahasiswa ON programstudi.ProgramStudiID = mahasiswa.ProgramStudiID 
                      GROUP BY programstudi.NamaProgram');

        return $this->db->resultSet();
    }

    public function tambahMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa(Nama, Alamat, TanggalLahir, JenisKelamin, KontakDarurat, ProgramStudiID) VALUES (:nama, :alamat, :tanggal_lahir, :jenis_kelamin, :kontak_darurat, :programstudiID)";
        $this->db->query($query);

        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('kontak_darurat', $data['kontak_darurat']);
        $this->db->bind('programstudiID', $data['programstudiID']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET Nama=:nama, Alamat=:alamat, TanggalLahir=:tanggal_lahir, JenisKelamin=:jenis_kelamin, KontakDarurat=:kontak_darurat, ProgramStudiID=:programstudiID WHERE MahasiswaID=:mahasiswaID";
        $this->db->query($query);

        $this->db->bind('mahasiswaID', $data['mahasiswaID']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('kontak_darurat', $data['kontak_darurat']);
        $this->db->bind('programstudiID', $data['programstudiID']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteMahasiswa($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE MahasiswaID=:mahasiswaID');
        $this->db->bind('mahasiswaID', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMahasiswa()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' JOIN programstudi ON programstudi.ProgramStudiID = mahasiswa.ProgramStudiID WHERE Nama LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
