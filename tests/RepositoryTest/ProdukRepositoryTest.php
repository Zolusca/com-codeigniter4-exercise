<?php

use App\Models\ProdukModel;
use App\Models\TokoModel;
use App\Models\UserModel;
use PHPUnit\Framework\TestCase      ;
use PHPUnit\Framework\Assert        ;
use App\Repository\ProdukRepository ;

class ProdukRepositoryTest extends TestCase
{
    public function testinsertProduk()
    {
        $userModel      = new UserModel();
        $userModel->setId(3);
        $userModel->setNama('juna');
        $userModel->setEmail('juna@bsi.id');
        $userModel->setPassword('junaa');

        $tokoModel      = new TokoModel();
        $tokoModel->setId(3);
        $tokoModel->setNamaToko('stores');
        $tokoModel->setUser($userModel);

        $produkModel    = new ProdukModel();
        $produkModel->setNama('baju');
        $produkModel->setGambar('baju.jpg');
        $produkModel->setHarga(100);
        $produkModel->setStok(10);
        $produkModel->setToko($tokoModel);

        $produkRepository   = new ProdukRepository();
        $testObject=$produkRepository->insertProduk($produkModel);
        Assert::assertTrue($testObject);
    }
}