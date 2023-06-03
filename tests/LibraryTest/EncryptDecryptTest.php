<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;
use App\Libraries\EncryptDecrypt;

class EncryptDecryptTest extends TestCase
{
    public function testEncrypt()
    {
        $testObject = EncryptDecrypt::encryption("admin");
        var_dump($testObject);
    }
}