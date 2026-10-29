<?php
require_once 'Buku.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Metode request tidak valid');
}

$judul = trim($_POST['judul'] ?? '');
$penulis = trim($_POST['penulis'] ?? '');
$tahun = $_POST['tahun'] ?? '';
$kategori = $_POST['kategori'] ?? '';
$cover = trim($_POST['cover'] ?? '');

$error = [];

// Validasi judul dan penulis
if ($judul === '') {
    $error[] = 'Judul wajib diisi';
}

if ($penulis === '') {
    $error[] = 'Penulis wajib diisi';
}

// Validasi tahun
if (
    !is_string($tahun) ||
    !ctype_digit($tahun) ||
    (int)$tahun < 1000 ||
    (int)$tahun > (int)date('Y')
) {
    $error[] = 'Tahun tidak valid';
}

// Validasi kategori
$kategoriValid = ['Novel', 'Pendidikan', 'Komik', 'Sejarah'];

if (!in_array($kategori, $kategoriValid, true)) {
    $error[] = 'Kategori tidak valid';
}

// Validasi ekstensi nama cover
$ekstensi = strtolower(
    pathinfo($cover, PATHINFO_EXTENSION)
);

$ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];

if (
    $cover === '' ||
    basename($cover) !== $cover ||
    !in_array($ekstensi, $ekstensiValid, true)
) {
    $error[] = 'Nama cover harus menggunakan ekstensi JPG, JPEG, PNG, atau WEBP';
}

// Tampilkan kesalahan jika ada
if ($error) {
    foreach ($error as $pesan) {
        echo htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') . '<br>';
    }

    echo '<br><a href="input_buku.php">Kembali</a>';
    exit;
}

// Membuat objek Buku
$buku = new Buku(
    $judul,
    $penulis,
    (int)$tahun,
    $kategori,
    $cover
);

// Menyimpan data buku dalam session
$_SESSION['buku'] ??= [];
$_SESSION['buku'][] = $buku;

// Menampilkan hasil
echo '<h2>Buku Berhasil Disimpan</h2>';

echo 'Judul: ' .
    htmlspecialchars($buku->judul, ENT_QUOTES, 'UTF-8') . '<br>';

echo 'Penulis: ' .
    htmlspecialchars($buku->penulis, ENT_QUOTES, 'UTF-8') . '<br>';

echo 'Tahun: ' . $buku->tahun . '<br>';

echo 'Kategori: ' .
    htmlspecialchars($buku->kategori, ENT_QUOTES, 'UTF-8') . '<br>';

echo 'Cover: ' .
    htmlspecialchars($buku->cover, ENT_QUOTES, 'UTF-8') . '<br>';

echo '<br><a href="input_buku.php">Input Buku Lagi</a><br>';
echo '<a href="index.php">Kembali ke Menu</a>';
?>