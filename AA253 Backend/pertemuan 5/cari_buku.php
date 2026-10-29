<?php
require_once 'Buku.php';
session_start();

$kategoriValid = ['Novel', 'Pendidikan', 'Komik', 'Sejarah'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cari Buku</title>
</head>
<body>

    <h2>Form Pencarian Buku</h2>

    <form action="cari_buku.php" method="get">

        Kategori:
        <select name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Novel">Novel</option>
            <option value="Pendidikan">Pendidikan</option>
            <option value="Komik">Komik</option>
            <option value="Sejarah">Sejarah</option>
        </select>

        <button type="submit">Cari</button>

    </form>

    <?php
    if (isset($_GET['kategori'])) {
        $kategori = $_GET['kategori'];

        if (!in_array($kategori, $kategoriValid, true)) {
            exit('Kategori tidak valid');
        }

        echo '<h2>Hasil Pencarian</h2>';

        $ditemukan = false;

        foreach ($_SESSION['buku'] ?? [] as $buku) {
            if ($buku->kategori === $kategori) {
                $ditemukan = true;

                echo '<hr>';

                echo 'Judul: ' .
                    htmlspecialchars($buku->judul, ENT_QUOTES, 'UTF-8') . '<br>';

                echo 'Penulis: ' .
                    htmlspecialchars($buku->penulis, ENT_QUOTES, 'UTF-8') . '<br>';

                echo 'Tahun: ' . $buku->tahun . '<br>';

                echo 'Kategori: ' .
                    htmlspecialchars($buku->kategori, ENT_QUOTES, 'UTF-8') . '<br>';

                echo 'Cover: ' .
                    htmlspecialchars($buku->cover, ENT_QUOTES, 'UTF-8') . '<br>';
            }
        }

        if (!$ditemukan) {
            echo 'Buku dengan kategori tersebut tidak ditemukan.';
        }
    }
    ?>

    <br><br>
    <a href="index.php">Kembali ke Menu</a>

</body>
</html>