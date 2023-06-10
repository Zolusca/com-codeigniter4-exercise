<?php

namespace App\Models;

use App\Models\UserModel;

class TokoModel 
{
    private int         $id                     ;
    private string      $namaToko               ;
    private string      $gambar         =""     ;
    private int         $jumlahProduk   =0      ;
    private UserModel   $user                   ; //id_user foreign key

    public function getId()
    {
        return $this->  id;
    }
    public function getNamaToko()
    {
        return $this->  namaToko;
    }
    public function getGambar()
    {
        return $this->  gambar;
    }
    public function getJumlahProduk()
    {
        return $this->  jumlahProduk;
    }
    public function getIdUser()
    {
        return $this->  user->getId();
    }

    public function getUsers()
    {
        return $this->  user;
    }

    /////////////// id tidak boleh di set saat pembuatan objek karena otomatis //////////////////
    public function setId(int $id)
    {
        $this->  id = $id;
    }
    ////////////// set id disini hanya utk keperluan dari database ke sistem////////////

    public function setNamaToko(string $namaToko)
    {
        $this->  namaToko   =   $namaToko;
    }
    public function setGambar(string $gambar)
    {
        $this->  gambar  =   $gambar;
    }
    public function setJmlhProduk(int $jumlahProduk)
    {
        $this->  jumlahProduk   =   $jumlahProduk;
    }
    public function setUser(UserModel $user)
    {
        $this->  user   =   $user;
    }
}