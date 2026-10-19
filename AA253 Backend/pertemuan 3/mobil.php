<?php

//class
class mobil{
    private $odometer;

    //method
    function __construct()
    {
    $this->odometer=1000;
    }
    public function nyalakan($model, $tipe){
        return "Nyalakan mobil $model - $tipe";
    }
    public function berjalan ($km){
        return $this->odometer + $km;
    }
}

$mobil1=new mobil();

echo $mobil1->nyalakan("Tesla", "Roadster");
echo "<br>";
echo "Berjalan sejauh : " . $mobil1->berjalan(500);
echo "<br>";
?>
//http://localhost/AA253 Backend/pertemuan 3/mobil.php