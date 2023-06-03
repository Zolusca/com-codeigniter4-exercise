<?php
namespace App\Libraries;

class BadWordfilter
{
    private static $badWord=array(
        "anjing","babi","pelacur"
    );
    
    public static function filterNama(string $nama){
        
        foreach (BadWordfilter::$badWord as $kataKasar) {
            if (stripos($nama, $kataKasar) !== false) { /// baca stripos pada php untuk ket !==false
                return false;
            }
        }
        return true;
    }
}