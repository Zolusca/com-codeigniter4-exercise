<?php
namespace App\Service;

use App\Models\TokoModel;
use App\Repository\TokoRepository;
use App\Repository\UserRepository;

class TokoService
{
    private TokoModel       $toko           ;
    private TokoRepository  $tokoRepository ;
    private UserRepository  $userRepository ;

    public function __construct()
    {
        $this->   toko              =   new TokoModel();
        $this->   tokoRepository    =   new TokoRepository();
        $this->   userRepository    =   new UserRepository();
    }

    //email dari session, cek pada alur aplikasi
    public function registToko(string $namaToko, string $gambar, string $email)
    {
        $isExist    =   $this->   tokoRepository->findByNamaToko($namaToko);
        
        if($isExist == true){
            return false;   // nama toko sudah ada
        }
        else{
            $user   = $this->   userRepository->findByEmail($email);// return UserModel

            $this->   toko->setNamaToko($namaToko);/// pembuatan objek toko
            $this->   toko->setGambar  ($gambar);
            $this->   toko->setUser    ($user); /// pembuatan objek toko
            
            $tryInsert  =  $this->   tokoRepository->insertToko($this->toko);

            if($tryInsert)
            {
                return true; // data berhasil ditambah
            }
            else{
                return false; // data gagal di insert duplikat 
            }
        }
    }

    public function findToko(string $email)
    {
        $getData    =   $this-> tokoRepository->findByEmail($email);
        
        if($getData!=null)
        {
            return $getData;
        }
        else
        {
            return false;
        }
    }

    public function incrementProduk(int $id_user)
    {
        return $this-> tokoRepository->updateJmlhProduk($id_user);
    }
}