<?php
require_once 'Mahasiswa.php';
$nama  = trim($_POST['nama']  ?? '');
$nim   = trim($_POST['nim']   ?? '');
$nilai = trim($_POST['nilai'] ?? '');
$prodi = $_POST['prodi'] ?? '';

$mhs = new Mahasiswa($nama, $nim);
$e = [];

if ($nama === '')       
$e[] = 'Nama wajib diisi';
if (!ctype_digit($nim)) $e[] = 'NIM harus angka';
if (!is_numeric($nilai) || !$mhs->setNilai((float)$nilai)) {
$e[] = 'Nilai ' . htmlspecialchars($nilai) . ' tidak valid!';
}
if (!in_array($prodi, ['SI', 'TI'], true)) $e[] = 'Prodi tidak valid';


if ($e) {
    foreach ($e as $pesan) {
        echo $pesan . '<br>';
  }
} else {
    echo 'Nama: ' . htmlspecialchars($mhs->nama) . '<br>';
    echo 'NIM: ' . htmlspecialchars($mhs->nim)  . '<br>';
    echo 'Nilai: ' . $mhs->getNilai() . '<br>';
    echo 'Predikat: ' . $mhs->getPredikat();
}
?>