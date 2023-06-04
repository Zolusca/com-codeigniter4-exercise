<?php

namespace App\Controllers;

class Home extends BaseController
{    
    public function index()
    {
        return view('d_utama');
    }

    public function about()
    {
        return view('about');
    }

    public function faq()
    {
        return view('faq');
    }

    public function form()
    {
        return view('form');
    }
    
    public function dashboardRegisterForm()
    {
        $session        = \Config\Services::session();

        if($session->get('login')==true){
            return view('DashboardRegister');
        }else{
            header('Location:/');
            exit();
        }
    }
    
}
