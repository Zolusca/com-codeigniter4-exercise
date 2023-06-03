<?php

namespace App\Controllers;

use App\Libraries\ValidationPassword;
use App\Service\TokoService;
use App\Service\UserService;

class Form extends BaseController
{
    private UserService $userService;
    private TokoService $tokoService;
    private $session                ;

    public function __construct()
    {
        $this->   session        = \Config\Services::session();
        $this->   userService    =   new UserService();
        $this->   tokoService    =   new TokoService();
    }

    public function loginVerify()
    {
        $email      =   $_POST['email'];
        $password   =   $_POST['password'];

        $resultData     =   $this->  userService->  login($email,$password);//return UserModel

        if($resultData  !=  null){
            
            $data=[
                "email"=>$email,
                "login"=>true
            ];
            $this->   session->set($data);

            //pengecekan user telah memiliki dashboard toko, maka diarahkan ke dashboard
            if($this->  tokoService->findToko($email)!=false){
                header('Location:/user/dashboard');
                exit();
            }
            else{
                header('Location:/form/login/dashboardregister');
                exit();
            }
        }
        else{
            return view('form',['response'=>'email dan password salah']);
        }
    }

    public function register()
    {
        $nama               =   $_POST['nama'];
        $email              =   $_POST['email'];
        $password           =   $_POST['password'];
        $password_verify    =   $_POST['password1'];

        $dataCheck  =   ValidationPassword::isStrongPassword($nama,$password,
                                                            $password_verify);
        if($dataCheck   == false)
        {
            return view('form',['response'=>'password terlalu lemah']);
        }

        $registSevice   =   $this-> userService-> registrasi($nama,$email,$password);
        
        if($registSevice    ==  true)
        {
            return view('form',['response'=>'akun berhasil dibuat']);
        }else{
            return view('form',['response'=>'akun telah ada atau nama sensitif']);
        }    
    }

    public function dashboardRegisterProcess()
    {
        $namaToko   =   $_POST['namatoko'];
        $img        =   $this->  request->getFile('filegambar');
        $email      =   $this->  session->get('email');
        $newNameImg =   $email.'.'.$img->getClientExtension();

        if($img->getSize()>5000000)
        {
            return view('dashboardregister',['response'=>'ukuran file maks 500kb']);
        }

        $registToko     =$this-> tokoService->registToko($namaToko,$newNameImg,$email);

        if($this-> request->getFile('filegambar')->
        move(FCPATH . '\image_upload\dashboard_image',$newNameImg) && $registToko)
        {
            return view('contentutamadashboard');
        }
        else{
            echo"something wrong there";
        }
        

    }
} 