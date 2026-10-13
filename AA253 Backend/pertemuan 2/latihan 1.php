<!DOCTYPE html>
<html>
<body>

<form method="POST">
    Masukkan nilai:
    <input type="number" name="nilai" required>
    <button type="submit">Cek Nilai</button>
</form>

<?php
if (isset($_POST['nilai'])) {
    $nilai = (int) $_POST['nilai'];

    if ($nilai >= 90) {
        echo "Nilai: A";
    } elseif ($nilai >= 80) {
        echo "Nilai: B";
    } elseif ($nilai >= 70) {
        echo "Nilai: C";
    } elseif ($nilai >= 60) {
        echo "Nilai: D";
    } else {
        echo "Nilai: E";
    }
}
echo "<br>";
?>

</body>
</html>

   // http://localhost/AA253 Backend/pertemuan 2/latihan 1.php