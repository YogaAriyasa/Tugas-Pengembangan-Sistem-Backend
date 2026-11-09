<?php
require_once __DIR__ . '/../config/Database.php';

class User extends Database {

    private $table = "users";

    // CREATE
    public function create($nama, $email, $password) {
        $query = "INSERT INTO $this->table (nama, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nama, $email, $password);
        return $stmt->execute();
    }

    // READ ALL
    public function readAll() {
        $query = "SELECT * FROM $this->table ORDER BY id DESC";
        return $this->conn->query($query);
    }

    // READ BY ID
    public function readById($id) {
        $query = "SELECT * FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // UPDATE
    public function update($id, $nama, $email) {
        $query = "UPDATE $this->table SET nama = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssi", $nama, $email, $id);
        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>

<br><br>
/*
Error yang muncul saat sengaja salah menulis nama tabel di SELECT; adalah:
Error: Table 'perpustakaan_db.tabel_salah' doesn't exist
*/