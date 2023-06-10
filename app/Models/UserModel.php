<?php
namespace App\Models;


class UserModel
{
    private int     $id                     ;
    private string  $nama                   ;
    private string  $password               ;
    private string  $email                  ;
    private string  $tipeUser   ="penjual"  ;


    public function getId(){
        return $this->  id;
    }
    public function getNama(){
        return $this->  nama;
    }
    public function getEmail(){
        return $this->  email;
    }
    public function getPassword(){
        return $this->  password;
    }
    public function getTipeUser(){
        return $this->  tipeUser;
    }

    
    /////////////// id tidak boleh di set saat pembuatan objek karena otomatis //////////////////
    public function setId(int $id){
        $this-> id   =   $id;
    }
    ////////////// set id disini hanya utk keperluan dari database ke sistem////////////
    
    public function setNama(string $nama){
        $this-> nama =   $nama;
    }
    public function setEmail(string $email){
        $this-> email    =   $email;
    }
    public function setPassword(string $password){
        $this-> password =   $password;
    }
}