<?php

use App\Service\TokoService;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class TokoServiceTest extends TestCase
{
    //test nama toko telah ada di table/database
    public function testregisttoko1()
    {
        $tokoService    = new TokoService();
        $testObject     =   $tokoService->registToko("store","muammalah.jpg",
                                                    "hadissi@gmail.com");
        Assert::assertNotTrue($testObject);
    }
    //test resgitrasi berhasil
    public function testregisttoko2()
    {
        $tokoService    = new TokoService();
        $testObject     =   $tokoService->registToko("storeIds","muammalah.jpg",
                                                    "hadissi@gmail.com");
        
        Assert::assertTrue($testObject);
    }

    public function testfindToko()
    {
        $tokoService    = new TokoService();
        $testObject     =   $tokoService->findToko("jfuna@bsi.id");
        Assert::assertTrue($testObject);
    }
}