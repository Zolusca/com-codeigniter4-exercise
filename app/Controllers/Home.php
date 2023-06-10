<?php

namespace App\Controllers;

use App\Repository\OrderRepository;
use App\Service\TokoService;

class Home extends BaseController
{    
    public function index()
    {          
        return view('LandingPage');
    }

    public function error()
    {   
        return view('errors/error');
    }

    public function about()
    {
        return view('about');
    }

    public function faq()
    {
        return view('faq');
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        
        header('Location:/');
        exit();
    }

    public function form()
    {
        return view('Form');
    }
    
    public function dashboardRegisterForm()
    {
        $session        = \Config\Services::session();

        if($session->get('login')==true)
        {
            return view('DashboardRegister');
        }else
        {
            header('Location:/');
            exit();
        }
    }

    public function testingOrder()
    {
        $session               = \Config\Services::session();
        $orderRepository       =   new OrderRepository();
        $tokoService           =   new TokoService();
        $emailUser             =   $session->get('email');
        
        if($session->get('login')==true)
        {
            $toko   =   $tokoService->findToko($emailUser);

            $data   =   $orderRepository->getOrder($toko->getId());

            return view('d_pesanan',['response'=>$data]);
        }else
        {
            return view('d_pesanan');
        }
    }
}
