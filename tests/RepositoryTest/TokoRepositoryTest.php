<?php

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use App\Repository\TokoRepository;
use App\Models\TokoModel;
use App\Models\UserModel;

class TokoRepositoryTest extends TestCase
{
    //test insert toko berhasil
    public function testinsertToko()
    {
        $toko       = new TokoModel();
        $user       = new UserModel();
        $repository = new TokoRepository();

        $user-> setId(5);
        $user-> setNama('juna');
        $user-> setEmail('juna@bsi.id');
        $user-> setPassword('junaa');
        $toko-> setNamaToko('test14');
        $toko-> setGambar('test.jpg');
        $toko-> setUser($user);
        
        $testObject = $repository->insertToko($toko);
        Assert::assertTrue($testObject);
    }    

    
    //test cari toko, nama toko ada di table
    public function testfindByNamaToko()
    {
        $repository = new TokoRepository();
        $testObject = $repository->findByNamaToko('test12');
        Assert::assertTrue($testObject);
    }
    

    //test jika email ada
    public function testfindByEmail1()
    {
        $repository = new TokoRepository();
        $testObject = $repository->findByEmail("admin@co.id");
        Assert::assertIsObject($testObject);
    }
    //test jika email tidak ada
    public function testfindByEmail2()
    {
        $repository = new TokoRepository();
        $testObject = $repository->findByEmail("xjuna@bsi.id");
        Assert::assertNull($testObject);
    }

    public function testupdateJmlhProduk()
    {
        $repository = new TokoRepository();
        $testObject = $repository->updateJmlhProduk(2);
        Assert::assertTrue($testObject);
    }
}