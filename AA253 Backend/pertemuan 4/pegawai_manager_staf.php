<?php
class Pegawai {
    public $nama, $gaji;
    public function __construct($nama, $gaji) {
        $this->nama = $nama;
        $this->gaji = $gaji;
    }
    public function tampilkanInfo() {
        echo "Nama: $this->nama<br>";
        echo "Gaji: $this->gaji<br>";
    }
}
class Manager extends Pegawai {
    public $tunj;
    public function __construct($n, $g, $tunj) {
        parent::__construct($n, $g);
        $this->tunj = $tunj;
    }
    public function tampilkanInfo() {
        parent::tampilkanInfo();
        echo "Tunjangan: $this->tunj<br>";
    }
}
class Staf extends Pegawai {
    public $lembur;
    public function __construct($n, $g, $lembur) {
        parent::__construct($n, $g);
        $this->lembur = $lembur;
    }
    public function tampilkanInfo() {
        parent::tampilkanInfo();
        echo "Lembur: $this->lembur<br>";
    }
}
(new Manager("Budi", 7000000, 3000000))->tampilkanInfo();
(new Staf("Ani", 4000000, 500000))->tampilkanInfo();
?>