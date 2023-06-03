<?php

namespace App\Controllers;

use App\Models\TokoModel;
use App\Models\UserModel;
use App\Service\TokoService;

class Dashboard extends BaseController
{
    private $session;
    private TokoService $tokoService;
    private UserModel  $user;
    private TokoModel  $toko;


    public function __construct()
    {
        $this->   tokoService    = new TokoService();
        $this->   session        = \Config\Services::session();
    }
    public function dashboardView()
    {
        // tokoService->findtoko mengembalikan TokoModel
        $this->toko    = $this->   tokoService->findToko($this->session->get('email'));
        // toko mengembalikan UserModel
        $this->user    = $this->   toko->getUsers();
        
        return view('contentutamadash',['response'=>$this->user->getNama()]);
    }

    public function dashboardViewList()
    {
        return view('contentlistdash');
    }

    
}