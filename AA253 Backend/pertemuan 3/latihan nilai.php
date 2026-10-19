<?php

class nilai{
    public $nama;

    public function getNilaiRataRata($nTugas, $nKuis, $nUTS, $nUASS){
        return ($nTugas+$nKuis+$nUTS+$nUASS)/4;
    }
}
$mahasiswa1=new nilai();
$mahasiswa1->nama="Ngakan Putu Yoga Ariyasa";

echo "Nilai rata-rata dari " . $mahasiswa1->nama . " adalah " . $mahasiswa1->getNilaiRataRata(80, 80, 85, 90);
echo "<br>";
?>
//http://localhost/AA253 Backend/pertemuan 3/latihan nilai.php
