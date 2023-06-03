<?php

use App\Service\UserService;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{
    //test registrasi data sukses
    public function testregistrasi1()
    {
        $userService    =   new UserService();
        $testObject     =   $userService->registrasi('hadas','hadii@gmail.com ','haslam');
        Assert::assertTrue($testObject);
    }
    //test registrasi nama mengandung bad word
    public function testregistrasi2()
    {
        $userService    =   new UserService();
        $testObject     =   $userService->registrasi('anjing','hadissi@gmail.com ','haslam');
        Assert::assertNotTrue($testObject);
    }
    //test registrasi password sama dengan nama username (password lemah)
    public function testregistrasi3()
    {
        $userService    =   new UserService();
        $testObject     =   $userService->registrasi('bayu','hadissi@gmail.com ','bayu');
        Assert::assertNotTrue($testObject);
    }
    
    
    //test login jika email salah
    public function testlogin1()
    {
        $userService    =   new UserService();
        $testObject     =   $userService->login('xhadissi@gmail.com ','haslam');
        Assert::assertEmpty($testObject);
    }
    //test login jika password salah
    public function testlogin2()
    {
        $userService    =   new UserService();
        $testObject     =   $userService->login('hadissi@gmail.com ','haslamss');
        Assert::assertNotTrue($testObject);
    }
    //test login jika semua benar
    public function testlogin3()
    {
        $userService    =   new UserService();
        $testObject     =   $userService->login('hadissi@gmail.com ','haslam');
        Assert::assertIsObject($testObject);
    }

}