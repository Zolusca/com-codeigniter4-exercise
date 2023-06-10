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

        if($statment){  return true;    }
        else         {  return false;   }
    }

    public function retriveData(int $id_toko)
    {
        $query      = "select * from produk where id_toko=?";
        $statment   = $this->  db->query($query,[$id_toko]);

        return $statment->getResultArray();
    }

    public function getAnyProduct(int $id_produk)
    {
        $query      =   "select * from produk where id_produk=?";
        $statment   =   $this->  db->query($query,[$id_produk]);
     
        try{
            if($statment->getResult() !=null)
            {
                foreach ($statment->getResult() as $row) 
                {
                    $this->   produk->setId_produk($row->id_produk);
                    $this->   produk->setNama     ($row->nama_produk);
                    $this->   produk->setGambar   ($row->gambar);
                    $this->   produk->setHarga    ($row->harga);
                    $this->   produk->setStok     ($row->stok);
                }
                return $this->  produk;    //data ditemukan

            }else{  return null;    }   //data tidak ditemukan
            
        }finally{   $this->   db->close();  }
    }

    public function updateData(ProdukModel $produkModel)
    {
        $query  =   "update produk set nama_produk=?,harga=?,stok=? where id_produk=?";
        $this->  db->query($query,[$produkModel->getNamaProduk(),
                                    $produkModel->getHarga(),
                                    $produkModel->getStok(),
                                    $produkModel->getId_produk()]);

            if($this->  db->affectedRows()===1)
            {
                return true;//berhasil
            }
            else{
                return false;//gagal
            }
    }
}