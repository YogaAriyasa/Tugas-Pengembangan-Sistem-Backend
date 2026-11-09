<?php
require_once 'classes/Buku.php';

$buku = new Buku();
$error = "";

// Tambah Buku
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $judul = trim($_POST['judul']);
    $penulis = trim($_POST['penulis']);
    $tahun = (int) $_POST['tahun'];
    $stok = (int) $_POST['stok'];

    if (empty($judul)) {
        $error = "Judul buku tidak boleh kosong.";
    } elseif (empty($penulis)) {
        $error = "Nama penulis tidak boleh kosong.";
    } elseif ($tahun <= 0) {
        $error = "Tahun harus lebih dari 0.";
    } elseif ($stok < 0) {
        $error = "Stok tidak boleh bernilai negatif.";
    } else {

        if ($buku->create($judul, $penulis, $tahun, $stok)) {
            header("Location: buku.php");
            exit;
        } else {
            $error = "Gagal menambahkan data.";
        }
    }
}

// Hapus Buku
if (isset($_GET['hapus'])) {

    $id = (int) $_GET['hapus'];

    if ($id > 0) {
        $buku->delete($id);
    }

    header("Location: buku.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
</head>
<body>

<h2>Tambah Buku</h2>

<?php if (!empty($error)) : ?>
    <p style="color:red;">
        <?php echo htmlspecialchars($error); ?>
    </p>
<?php endif; ?>

<form method="POST">

    <label>Judul Buku</label><br>
    <input type="text" name="judul" required>
    <br><br>

    <label>Penulis</label><br>
    <input type="text" name="penulis" required>
    <br><br>

    <label>Tahun</label><br>
    <input type="number" name="tahun" required>
    <br><br>

    <label>Stok</label><br>
    <input type="number" name="stok" required>
    <br><br>

    <button type="submit">Simpan</button>

</form>

<hr>

<h2>Daftar Buku</h2>

<form method="GET">
    <input
        type="text"
        name="cari"
        placeholder="Cari judul buku"
        value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">

    <button type="submit">Cari</button>

    <a href="buku.php">Reset</a>
</form>

<br>

<table border="1" cellpadding="8">

    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php

    if (isset($_GET['cari']) && !empty(trim($_GET['cari']))) {

        $keyword = trim($_GET['cari']);
        $data = $buku->search($keyword);

    } else {

        $data = $buku->all();
    }

    if ($data && $data->num_rows > 0) {

        while ($row = $data->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['judul']); ?></td>
                <td><?php echo htmlspecialchars($row['penulis']); ?></td>
                <td><?php echo htmlspecialchars($row['tahun']); ?></td>
                <td><?php echo htmlspecialchars($row['stok']); ?></td>
                <td>
                    <a href="edit_buku.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                        Edit
                    </a>
                    |
                    <a href="buku.php?hapus=<?php echo htmlspecialchars($row['id']); ?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>
                </td>
            </tr>
            <?php
        }

    } else {

        echo "<tr>
                <td colspan='6'>Data buku tidak ditemukan</td>
              </tr>";
    }

    ?>

</table>

</body>
</html>
