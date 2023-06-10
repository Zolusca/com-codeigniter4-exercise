<?php
namespace App\Service;

use App\Libraries\BadWordFilter;
use App\Libraries\EncryptDecrypt;
use App\Models\UserModel;
use App\Repository\UserRepository;

class UserService
{
    private UserRepository $userRepository  ;
    private UserModel      $user            ;

    public function __construct()
    {
        $this->     userRepository   =  new UserRepository();
        $this->     user             =  new UserModel()     ;
    }

    public function registrasi(string $nama,string $email,string $password)
    {
        $userCheck  =   $this->     userRepository->findByEmail($email);

        if(BadWordFilter::filterNama($nama)==true && $userCheck==null)
        {
            $passwordEncryption     =    EncryptDecrypt::encryption($password);

            $this->   user->setNama    ($nama);
            $this->   user->setEmail   ($email);
            $this->   user->setPassword($passwordEncryption);

            $this->   userRepository->insertUser($this->    user);
            
            return true;//data berhasil ditambah

        }else{
            return false;//"nama ditolak, sensitif atau sudah digunakan, password lemah " 
        }  
    }

    public function login(string $email, string $password)
    {
        $userCheck  =   $this->   userRepository->findByEmail($email);

        if($userCheck==null)
        {
            return null;//false data tidak ditemukan
        }

        $passwordDecryption     = EncryptDecrypt::decryption($userCheck->getPassword());
        
        if($password==$passwordDecryption)
        {
            return $userCheck;//true data ditemukan dan pass sesuai
        }
        else{
            return false;// data ditemukan pass tidak sesuai
        }
    }

    
}