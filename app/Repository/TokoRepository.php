<?php
namespace App\Repository;

use App\Models\TokoModel;
use App\Models\UserModel;

class TokoRepository
{
    private $db;
    private TokoModel $toko;
    private UserModel $user;

    public function __construct()
    {
        $this-> toko     =   new TokoModel();
        $this-> user     =   new UserModel();
        $this-> db       =   \Config\Database::connect();
    }
    
    public function insertToko(TokoModel $toko)
    {
        $query      =   "insert into toko (id_user,nama_toko,gambar,jmlh_produk) values (?,?,?,?)";
        $statment   =   $this->  db->query($query,[
                                 $toko->getIdUser(),
                                 $toko->getNamaToko(),
                                 $toko->getGambar(),
                                 $toko->getJumlahProduk()
                            ]);

        $error      = $this->   db->error();

        //pengecekan duplikat user_id pada table toko
        if($statment    &&  $error!=null){
            return true;
        }else{
            return false;
        }
    }

    public function findByNamaToko(string $namaToko)
    {
        $query      =   "select id_toko from toko where nama_toko=?";
        $statment   =   $this->   db->query($query,[$namaToko]);

        try{
            if($statment->getResult()!=null){
                return true;    //data ditemukan
            }else
            {
                return false;   //data tidak ditemukan
            }
        }finally{
            $this->   db->close();
        }
    }

    public function findByEmail(string $email)
    {
        $query      =   "select * from toko inner join user on (toko.id_user = user.id_user) where email=?";
        $statment   =   $this->   db->query($query,[$email]);

        try{
            if($statment->getResult()!=null){
                foreach ($statment->getResult() as $row) {
                    $this->   user->setId($row->id_user);
                    $this->   user->setEmail($row->email);
                    $this->   user->setNama($row->nama);
                    $this->   toko->setId($row->id_toko);
                    $this->   toko->setNamaToko($row->nama_toko);
                    $this->   toko->setGambar($row->gambar);
                    $this->   toko->setJmlhProduk($row->jmlh_produk);
                    $this->   toko->setUser($this->user);
                }
                return $this->toko;
                // return true;    //data ditemukan
            }else
            {
                return null;   //data tidak ditemukan
            }
            
        }finally{
            $this->   db->close();
        }
    }

    public function updateJmlhProduk(int $id_user)
    {
        $query  =   "update toko set jmlh_produk=jmlh_produk+1 where id_user=?";
        $this->  db->query($query,[$id_user]);

        
            if($this->  db->affectedRows()===1)
            {
                return true;//berhasil
            }
            else{
                return false;//gagal
            }
    }
}