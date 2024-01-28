<?php
class SubstansiModel
{
    private $table = 'substansi'; // Ubah tabel menjadi 'substansi'
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSubstansi()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getSubstansiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id'); // Ubah kolom menjadi 'id'
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahSubstansi($data)
    {
        $query = "INSERT INTO substansi(nama_substansi) VALUES (:nama_substansi)"; // Sesuaikan kolom
        $this->db->query($query);
        $this->db->bind('nama_substansi', $data['nama_substansi']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataSubstansi($data)
    {
        $query = 'UPDATE substansi SET nama_substansi=:nama_substansi WHERE id=:id'; // Sesuaikan kolom
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_substansi', $data['nama_substansi']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSubstansi($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id'); // Sesuaikan kolom
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariSubstansi()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_substansi LIKE :key'); // Sesuaikan kolom
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
