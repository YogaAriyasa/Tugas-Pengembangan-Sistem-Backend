<?php
require_once 'classes/Buku.php';

$buku = new Buku();

if (!isset($_GET['id'])) {
    header("Location: buku.php");
    exit;
}

$id = (int) $_GET['id'];

$dataBuku = $buku->find($id);

if (!$dataBuku) {
    die("Data tidak ditemukan");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $judul = trim($_POST['judul']);
    $penulis = trim($_POST['penulis']);
    $tahun = (int) $_POST['tahun'];
    $stok = (int) $_POST['stok'];

    if ($buku->update($id, $judul, $penulis, $tahun, $stok)) {
        header("Location: buku.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>
<body>

<h2>Edit Buku</h2>

<form method="POST">

    <label>Judul Buku</label><br>
    <input
        type="text"
        name="judul"
        value="<?php echo htmlspecialchars($dataBuku['judul']); ?>"
        required>
    <br><br>

    <label>Penulis</label><br>
    <input
        type="text"
        name="penulis"
        value="<?php echo htmlspecialchars($dataBuku['penulis']); ?>"
        required>
    <br><br>

    <label>Tahun</label><br>
    <input
        type="number"
        name="tahun"
        value="<?php echo htmlspecialchars($dataBuku['tahun']); ?>"
        required>
    <br><br>

    <label>Stok</label><br>
    <input
        type="number"
        name="stok"
        value="<?php echo htmlspecialchars($dataBuku['stok']); ?>"
        required>
    <br><br>

    <button type="submit">Update</button>

    <a href="buku.php">Kembali</a>

</form>

</body>
</html>