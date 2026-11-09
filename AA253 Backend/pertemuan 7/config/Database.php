<?php
class Database {
    protected $conn;

    public function __construct() {
        $this->connect();
    }

    protected function connect() {
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "perpustakaan_db";

        $this->conn = new mysqli($host, $user, $pass, $db);

        if ($this->conn->connect_error) {
            error_log(
                date('Y-m-d H:i:s') .
                " - Koneksi gagal: " .
                $this->conn->connect_error .
                PHP_EOL,
                3,
                "error.log"
            );

            die("Terjadi kesalahan pada sistem.");
        }
    }
}
?>

/*
Error yang muncul saat nama database salah adalah:
Fatal error: Uncaught mysqli_sql_exception: Unknown database 'web_db' in C:\xampp\htdocs\AA253 Backend\pertemuan 7\config\Database.php:15 Stack trace: #0 C:\xampp\htdocs\AA253 Backend\pertemuan 7\config\Database.php(15): mysqli->__construct('localhost', 'root', Object(SensitiveParameterValue), 'web_db') #1 C:\xampp\htdocs\AA253 Backend\pertemuan 7\config\Database.php(6): Database->connect() #2 C:\xampp\htdocs\AA253 Backend\pertemuan 7\index.php(4): Database->__construct() #3 {main} thrown in C:\xampp\htdocs\AA253 Backend\pertemuan 7\config\Database.php on line 15
<br><br>
Lalu error yang muncul saat password salah adalah:
Fatal error: Uncaught mysqli_sql_exception: Access denied for user 'root'@'localhost' (using password: YES) in C:\xampp\htdocs\AA253 Backend\pertemuan 7\config\Database.php:15 Stack trace: #0 C:\xampp\htdocs\AA253 Backend\pertemuan 7\config\Database.php(15): mysqli->__construct('localhost', 'root', Object(SensitiveParameterValue), 'perpustakaan_db') #1 C:\xampp\htdocs\AA253 Backend\pertemuan 7\config\Database.php(6): Database->connect() #2 C:\xampp\htdocs\AA253 Backend\pertemuan 7\index.php(4): Database->__construct() #3 {main} thrown in C:\xampp\htdocs\AA253 Backend\pertemuan 7\config\Database.php on line 15
<br><br>
die() dengan pesan detail tidak cocok digunakan di server produksi karena dapat membocorkan informasi sensitif mengenai sistem kepada pengguna. Informasi seperti nama database, struktur folder, konfigurasi server, nama file, dan detail kesalahan dapat dimanfaatkan oleh pihak yang tidak bertanggung jawab untuk mencari celah keamanan. Oleh karena itu, pada lingkungan produksi sebaiknya ditampilkan pesan error yang umum kepada pengguna, sementara detail kesalahan dicatat ke dalam log untuk keperluan administrator dan proses debugging.
*/