<?php
class Mahasiswa {
    public $nama;
    public $nim;
    private $nilai;
    public function setNilai($nilai) {
        if ($nilai >= 0 && $nilai <= 100) {
            $this->nilai = $nilai;
        } else {
            echo "Nilai $nilai tidak valid!<br>";
        }
    }
    public function getNilai() { return $this->nilai; }
    public function getPredikat() {
        if ($this->nilai >= 85) return "A";
        if ($this->nilai >= 70) return "B";
        if ($this->nilai >= 55) return "C";
    return "D";
    }
}
/*
$mhs = new Mahasiswa();

$mhs->nama = "Yoga";
$mhs->nim = "250030063";
$mhs->setNilai(90);

echo "Nama: " . $mhs->nama . "<br>";
echo "NIM: " . $mhs->nim . "<br>";
echo "Nilai: " . $mhs->getNilai() . "<br>";
echo "Predikat: " . $mhs->getPredikat();
*/
?>