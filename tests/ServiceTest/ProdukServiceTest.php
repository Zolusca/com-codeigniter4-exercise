<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Assert;
use App\Service\ProdukService;

class ProdukServiceTest extends TestCase
{
    public function testaddProduk()
    {
        $produkService  = new ProdukService();
        $testObject     = $produkService-> addProduk('pensil','pensil.jpg',10,2000,'rini@bsi.id');
        Assert::assertTrue($testObject);
    }

    public function testupdateData()
    {
        $produkService  = new ProdukService();
        $testObject     = $produkService->updateData(1,"percobaan",200,1);
        Assert::assertTrue($testObject);
    }
}