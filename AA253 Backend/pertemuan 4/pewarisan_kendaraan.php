<?php
    class Kendaraan {
        public $merk;
        public $warna;

        public function __construct($merk, $warna) {
        $this->merk = $merk;
        $this->warna = $warna;
        }

        public function nyalakan() {
        echo "{$this->merk} berwarna {$this->warna} dinyalakan.<br>";
        }
    }
    class Motor extends Kendaraan {
        public function bunyiKlakson() {
            echo "{$this->merk} membunyikan klakson motor: Beep Beep!<br>";
        }
    }
    class Mobil extends Kendaraan {
        public function bunyiKlakson() {
            echo "{$this->merk} membunyikan klakson mobil: Honk Honk!<br>";
        }
    }


$motor1 = new Motor("Yamaha", "Hitam");
$motor1->nyalakan();
$motor1->bunyiKlakson();

$mobil1 = new Mobil("Toyota", "Putih");
$mobil1->nyalakan();
$mobil1->bunyiKlakson();
?>

