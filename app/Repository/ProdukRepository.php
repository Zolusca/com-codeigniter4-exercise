<?php

namespace App\Repository;

use App\Models\ProdukModel;
use App\Models\TokoModel;

class ProdukRepository
{
    private             $db     ;
    private TokoModel   $toko   ;
    private ProdukModel $produk ;

    public function __construct()
    {
        $this-> toko     =   new TokoModel();
        $this-> produk   =   new ProdukModel();
        $this-> db       =   \Config\Database::connect();
    }

    public function insertProduk(ProdukModel $produk)
    {
        $query      = "insert into produk (id_toko,nama_produk,gambar,harga,stok) values (?,?,?,?,?)";
        $statment   =   $this->  db->query($query,[
                        $produk->getIdToko(),
                        $produk->getNamaProduk(),
                        $produk->getGambar(),
                        $produk->getHarga(),
                        $produk->getStok(),
                     ]);
        if($statment)
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function retriveData(int $id_toko)
    {
        $query      = "select * from produk where id_toko=?";
        $statment   = $this->  db->query($query,[$id_toko]);

        return $statment->getResultArray();
    }
}