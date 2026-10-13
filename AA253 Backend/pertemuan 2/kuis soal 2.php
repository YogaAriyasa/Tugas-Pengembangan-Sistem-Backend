<?php
function hitungNilaiAkhir($tugas, $uts, $uas){
    $nilaiAkhir=($tugas*0.3)+($uts*0.3)+($uas*0.4);

    if ($nilaiAkhir >= 70){
        $status="Lulus";
    }else{
        $status="Tidak Lulus";
    }

    echo "Nilai akhir : " . round($nilaiAkhir) . "<br>";
    echo "Status : " . $status;
}
hitungNilaiAkhir(83, 77, 89);
echo "<br>";
?>

   // http://localhost/AA253 Backend/pertemuan 2/kuis soal 2.php