<?php
namespace App\Libraries;

class EncryptDecrypt
{
    private static string $password;
    private static string $encrypt="";
    private static string $decrypt="";

    public static function encryption(string $password)
    {
        EncryptDecrypt::$password   =   $password;
        // merubah string ke char bentuk array
        $arrayStr                   =   str_split(EncryptDecrypt::$password);
        //merubah satu persatu char pad array
        foreach($arrayStr as $char)
        {
            //ord untuk mengubah char ke int
            $tmp     =   ord($char); 
            //ganti nilai dari ASCII per huruf, Ex: a=97 maka 97+5=102. 102=f
            $tmp    +=5; 
            //menyimpan hasil perubahan 
            $newWord =  chr($tmp);
            EncryptDecrypt::$encrypt .= $newWord;
        }
        return EncryptDecrypt::$encrypt;
    }

    public static function decryption(string $passwordEncrypt)
    {
        //merubah string ke char bentuk array
        $arrayStr   =   str_split($passwordEncrypt);
        //merubah satu persatu char pad array
        foreach($arrayStr as $char)
        {
            //ord untuk mengubah char ke int
            $tmp     =   ord($char);
            // mengurangi nilai char, ex: f=102, 102-5=97. char 97=a
            $tmp    -=5;
            //menyimpan hasil
            $newWord =  chr($tmp);
            EncryptDecrypt::$decrypt .= $newWord  ;
        }
        return EncryptDecrypt::$decrypt;
    }
}