<?php
namespace App\Models;

class ProdukModel
{
    private int         $id_produk  ;
    private string      $nama       ;
    private string      $gambar     ;
    private int         $harga      ;
    private int         $stok       ;
    private TokoModel   $toko       ;

    public function getId_produk()
    {
        return $this->id_produk;
    }
    public function getNamaProduk()
    {
        return $this->nama;
    }
    public function getGambar()
    {
        return $this->gambar;
    }
    public function getHarga()
    {
        return $this->harga;
    }
    public function getStok()
    {
        return $this->stok;
    }
    public function getIdToko()
    {
        return $this->toko->getId();
    }

    public function getToko()
    {
        return $this->toko;
    }

    /////////////// id tidak boleh di set saat pembuatan objek karena otomatis //////////////////
    public function setId_produk(int $id)
    {
        $this->id_produk=$id;
    }
    ////////////// set id disini hanya utk keperluan dari database ke sistem////////////
    public function setNama(string $namaProduk)
    {
        $this->nama=$namaProduk;
    }
    public function setGambar(string $gambar)
    {
        $this->gambar=$gambar;
    }
    public function setHarga(int $harga)
    {
        $this->harga=$harga;
    }
    public function setStok(int $stok)
    {
        $this->stok=$stok;
    }
    public function setToko(TokoModel $toko)
    {
        $this->toko=$toko;
    }


}