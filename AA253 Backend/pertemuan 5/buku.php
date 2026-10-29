<?php
class Buku {
    public $judul;
    public $penulis;
    public $tahun;
    public $kategori;
    public $cover;

    public function __construct($judul, $penulis, $tahun, $kategori, $cover) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->tahun = $tahun;
        $this->kategori = $kategori;
        $this->cover = $cover;
    }

    public function getBuku() {
        return [
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'tahun' => $this->tahun,
            'kategori' => $this->kategori,
            'cover' => $this->cover
        ];
    }
}
?>