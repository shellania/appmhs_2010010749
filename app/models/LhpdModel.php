<?php
class LhpdModel
{
    private $table = 'lhpd';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLhpd()
    {
        $this->db->query('SELECT lhpd.*, substansi.nama_substansi FROM ' . $this->table . ' LEFT JOIN substansi ON lhpd.substansi_id = substansi.id');

        return $this->db->resultSet();
    }

    public function getLhpdById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function getJumlahLhpdBySubstansi()
    {
        $this->db->query('SELECT substansi.nama_substansi, COUNT(lhpd.id) AS JumlahLhpd 
                      FROM substansi 
                      LEFT JOIN lhpd ON substansi.ID = lhpd.Substansi_ID 
                      GROUP BY substansi.nama_substansi');

        return $this->db->resultSet();
    }


    public function tambahLhpd($data)
    {

        $query = "INSERT INTO lhpd(nama_pelapor, no_telp, alamat, no_KTP, no_registrasi, no_agenda, substansi_id, instansi_terlapor, perihal, tgl_bedah, tgl_laporan) VALUES (:nama_pelapor, :no_telp, :alamat, :no_KTP, :no_registrasi, :no_agenda, :substansi_id, :instansi_terlapor, :perihal, :tgl_bedah, :tgl_laporan)";
        $this->db->query($query);
        $this->db->bind('nama_pelapor', $data['nama_pelapor']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_KTP', $data['no_KTP']);
        $this->db->bind('no_registrasi', $data['no_registrasi']);
        $this->db->bind('no_agenda', $data['no_agenda']);
        $this->db->bind('substansi_id', $data['substansi_id']);
        $this->db->bind('instansi_terlapor', $data['instansi_terlapor']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('tgl_bedah', $data['tgl_bedah']);
        $this->db->bind('tgl_laporan', $data['tgl_laporan']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataLhpd($data)
    {
        $query = "UPDATE $this->table SET nama_pelapor=:nama_pelapor, no_telp=:no_telp, alamat=:alamat, no_KTP=:no_KTP, no_registrasi=:no_registrasi, no_agenda=:no_agenda, substansi_id=:substansi_id, instansi_terlapor=:instansi_terlapor, perihal=:perihal, tgl_bedah=:tgl_bedah, tgl_laporan=:tgl_laporan";

        // Jika ada file yang diunggah, tambahkan kolom file_lhpd ke query
        if (!empty($data['file_lhpd'])) {
            $query .= ", file_lhpd=:file_lhpd";
        }

        $query .= " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_pelapor', $data['nama_pelapor']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_KTP', $data['no_KTP']);
        $this->db->bind('no_registrasi', $data['no_registrasi']);
        $this->db->bind('no_agenda', $data['no_agenda']);
        $this->db->bind('substansi_id', $data['substansi_id']);
        $this->db->bind('instansi_terlapor', $data['instansi_terlapor']);
        $this->db->bind('perihal', $data['perihal']);
        $this->db->bind('tgl_bedah', $data['tgl_bedah']);
        $this->db->bind('tgl_laporan', $data['tgl_laporan']);

        // Jika ada file yang diunggah, bind parameter file_lhpd
        if (!empty($data['file_lhpd'])) {
            $this->db->bind('file_lhpd', $data['file_lhpd']);
        }

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function deleteLhpd($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id=:id");
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariLhpd()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' JOIN substansi ON lhpd.substansi_id = substansi.id WHERE nama_pelapor LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
