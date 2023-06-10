<?php
namespace App\Repository;

class OrderRepository
{
    private $db;

    public function __construct()
    {
        $this-> db       =   \Config\Database::connect();
    }

    public function getOrder(int $id_toko)
    {
        $query      =   "select no_resi,jumlah_pesanan,status,nama_produk,harga from pesanan 
                        inner join produk on (pesanan.id_produk=produk.id_produk) 
                        where pesanan.id_toko=? ";
        $statment   =   $this->db->query($query,[$id_toko]);
        
        try{
            if($statment->getResultArray()!=null){
                $data=[];
                foreach ($statment->getResultArray() as $row) {
                    $data['no_resi'] = $row['no_resi'];
                    $data['total_harga'] = $row['harga'];
                    $data['jumlah_pesanan'] = $row['jumlah_pesanan'];
                    $data['status'] = $row['status'];
                    $data['nama_barang'] = $row['nama_produk'];
                }
                return $data;
                // return true;    //data ditemukan
            }else
            {
                return null;   //data tidak ditemukan
            }
            
        }finally{
            $this->   db->close();
        }
    }
}
