<?php
// Menangkap NIM yang dikirim dari FORM
$nim = $_GET['nim'] ?? '';

if ($nim === '') {
    echo "NIM harus diisi";
} else {
    echo "NIM mahasiswa yang dicari adalah " . htmlspecialchars($nim);
}
?>