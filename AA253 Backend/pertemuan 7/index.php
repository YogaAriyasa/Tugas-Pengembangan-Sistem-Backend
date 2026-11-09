<?php
require_once 'classes/User.php';

$user = new User();

// Tambah data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if ($user->create($nama, $email, $password)) {
            echo "<p style='color:green;'>Data berhasil ditambahkan!</p>";
        } else {
            echo "<p style='color:red;'>Gagal menambahkan data.</p>";
        }
    } catch (Exception $e) {
    error_log(
        date('Y-m-d H:i:s') .
        " - Error: " .
        $e->getMessage() .
        PHP_EOL,
        3,
        "error.log"
    );

    echo "<p>Terjadi kesalahan pada sistem.</p>";
    }
}

// Hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    try {
        $user->delete($id);
        header("Location: index.php");
        exit;
    } catch (Exception $e) {
    error_log(
        date('Y-m-d H:i:s') .
        " - Error: " .
        $e->getMessage() .
        PHP_EOL,
        3,
        "error.log"
    );

    echo "<p>Terjadi kesalahan pada sistem.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Users</title>
</head>
<body>

<h2>Tambah Pengguna</h2>

<form method="POST" action="">
    <input type="text" name="nama" placeholder="Nama" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="password" placeholder="Password" required>
    <br><br>

    <button type="submit">Simpan</button>
</form>

<hr>

<h2>Daftar Pengguna</h2>

<table border="1" cellpadding="6">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>

    <?php
    try {
        $data = $user->readAll();

        if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
                echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='?hapus={$row['id']}'
                           onclick='return confirm(\"Yakin ingin menghapus?\")'>
                           Hapus
                        </a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Belum ada data</td></tr>";
        }
    } catch (Exception $e) {
    error_log(
        date('Y-m-d H:i:s') .
        " - Error: " .
        $e->getMessage() .
        PHP_EOL,
        3,
        "error.log"
    );

    echo "<p>Terjadi kesalahan pada sistem.</p>";
    }
    ?>
</table>

</body>
</html>

/*
Error yang muncul saat email yang sama dimasukkan dua kali adalah:
Error: Duplicate entry 'yoga@gmail.com' for key 'unique_email'
*/