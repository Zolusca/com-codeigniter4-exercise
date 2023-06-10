<?php
namespace App\Libraries;

class ValidationPassword
{
    public static function isStrongPassword(string $nama,string $password,
                                            string $passwordVerif)
    {
        if($password != $passwordVerif)
        {
            return false;
        }else
        {
            if($nama === $password)
            {
                return false;
            }
            else{
                return true;
            }
        }
        
    }
}