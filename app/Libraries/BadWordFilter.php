<?php
namespace App\Libraries;

class BadWordFilter
{
    private static $badWord = array( "anjing","babi","pelacur");
    
    public static function filterNama(string $nama)
    {
        
        foreach (BadWordFilter::$badWord as $kataKasar) 
        {
            // baca stripos pada php untuk ket !==false
            if (stripos($nama, $kataKasar) !== false) 
            { 
                return false;
            }
        }
        return true;
    }
}