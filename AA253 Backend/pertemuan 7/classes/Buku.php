<?php
require_once __DIR__ . '/../config/Database.php';

class Buku extends Database {

    private $table = "buku";

    // Ambil semua data
    public function all() {
        $query = "SELECT * FROM $this->table ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->get_result();
    }

    // Cari berdasarkan ID
    public function find($id) {
        $query = "SELECT * FROM $this->table WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    // Cari berdasarkan judul
    public function search($keyword) {
        $query = "SELECT * FROM $this->table WHERE judul LIKE ? ORDER BY id DESC";

        $stmt = $this->conn->prepare($query);

        $keyword = "%".$keyword."%";

        $stmt->bind_param("s", $keyword);
        $stmt->execute();

        return $stmt->get_result();
    }

    // Tambah data
    public function create($judul, $penulis, $tahun, $stok) {
        $query = "INSERT INTO $this->table (judul, penulis, tahun, stok)
                  VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssii", $judul, $penulis, $tahun, $stok);

        return $stmt->execute();
    }

    // Update data
    public function update($id, $judul, $penulis, $tahun, $stok) {
        $query = "UPDATE $this->table
                  SET judul = ?, penulis = ?, tahun = ?, stok = ?
                  WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssiii", $judul, $penulis, $tahun, $stok, $id);

        return $stmt->execute();
    }

    // Hapus data
    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
?>