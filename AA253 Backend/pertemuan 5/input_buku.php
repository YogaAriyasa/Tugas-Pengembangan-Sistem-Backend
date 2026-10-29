<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Buku</title>
</head>
<body>

    <h2>Form Input Buku</h2>

    <form action="proses_buku.php" method="post">

        Judul:
        <input type="text" name="judul" required>
        <br><br>

        Penulis:
        <input type="text" name="penulis" required>
        <br><br>

        Tahun:
        <input type="number" name="tahun" required>
        <br><br>

        Kategori:
        <select name="kategori" required>
            <option value="">Pilih Kategori</option>
            <option value="Novel">Novel</option>
            <option value="Pendidikan">Pendidikan</option>
            <option value="Komik">Komik</option>
            <option value="Sejarah">Sejarah</option>
        </select>
        <br><br>

        Nama Cover:
        <input type="text" name="cover"
               placeholder="contoh: buku.jpg" required>
        <br><br>

        <button type="submit">Simpan</button>

    </form>

    <br>
    <a href="index.php">Kembali ke Menu</a>

</body>
</html>