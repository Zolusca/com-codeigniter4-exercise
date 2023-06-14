<?php

namespace App\Controllers;

use App\Libraries\ValidationPassword;
use App\Service\TokoService;
use App\Service\UserService;

class Form extends BaseController
{
    private UserService $userService;
    private TokoService $tokoService;
    private             $session    ;


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

        //return UserModel
        $resultData     =   $this->  userService->  login($email,$password);

        if($resultData  !=  null){
            
            //inisialisasi Session User Login
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
            return view('Form',['response'=>'email dan password salah']);
        }
    }

    public function register()
    {
        $nama               =   $_POST['nama'];
        $email              =   $_POST['email'];
        $password           =   $_POST['password'];
        $password_verify    =   $_POST['password1'];

        // pengecekan validasi password
        $dataCheck  =   ValidationPassword::isStrongPassword($nama,$password,
                                                            $password_verify);
        if($dataCheck   == false)
        {
            return view('Form',['response'=>'password terlalu lemah atau tidak sesuai']);
        }

        $registService   =   $this-> userService-> registrasi($nama,$email,$password);
        
        if($registService    ==  true)
        {
            return view('Form',['response'=>'akun berhasil dibuat']);
        }else{
            return view('Form',['response'=>'akun telah ada atau nama sensitif']);
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
            return view('DashboardRegister',['response'=>'ukuran file maks 500kb']);
        }

        $registToko     =  $this->  tokoService->registToko($namaToko,$newNameImg,$email);
        
        if($registToko)
        {
            //move file ke public/image_upload
            if($this-> request->getFile('filegambar')->
             move(FCPATH . '\image_upload\dashboard_image',$newNameImg))
             {
                header('Location:/user/dashboard');
                exit();
             }
             else{
                return view('DashboardRegister',['response'=>'move file gagal']);
             }
             
        }
        else{
            return view('DashboardRegister',['response'=>'registrasi gagal, nama toko sudah ada']);
            }
    }
} 