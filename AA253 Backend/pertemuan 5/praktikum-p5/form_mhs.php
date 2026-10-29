<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>
    <form action="proses_mhs.php" method="POST">
        <label for="nama">Nama : </labe;><br>
        <input type="text" name="nama"><br>
        <label for="nim">NIM : </label><br>
        <input type="number" name="nim"><br>
        <label for="nilai">Nilai : </label><br>
        <input type="number" name="nilai"><br>
        <label for="prodi">Prodi : </label><br>
        <input type="text" name="prodi"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>