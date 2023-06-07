<?php

namespace App\Controllers;

use App\Models\TokoModel;
use App\Models\UserModel;
use App\Service\ProdukService;
use App\Service\TokoService;
use App\Service\UserService;

class Dashboard extends BaseController
{
    private                 $session        ;
    private TokoService     $tokoService    ;
    private UserModel       $user           ;
    private TokoModel       $toko           ;
    private ProdukService   $produkService  ;


    public function __construct()
    {
        $this->   produkService  = new ProdukService();
        $this->   tokoService    = new TokoService();
        $this->   session        = \Config\Services::session();
    }

    // dashboard view sering menggunakan session 
    public function sessionCheck()
    {
        if($this-> session->get('login')==null){
            header('Location:/');
            exit();
        }
    }

    public function dashboardView()
    {
        Dashboard::sessionCheck();

        // tokoService->findtoko mengembalikan TokoModel
        $this->  toko    = $this->   tokoService->findToko($this->session->get('email'));
        // toko mengembalikan UserModel
        $this->  user    = $this->   toko->getUsers();
        
        return view('d_utama',['response'=>$this->user->getNama()]);
    }

    public function dashboardViewList()
    {
        Dashboard::sessionCheck();
        
       // tokoService->findtoko mengembalikan TokoModel
       $this->  toko    = $this->   tokoService->findToko($this->session->get('email'));

       $data_produk     = $this-> produkService->getAllProduk($this-> toko->getId());
       
        return view('d_list_produk',['response'=>$data_produk]);
    }

    public function dashboardtambahproduk()
    {
        $request    = request();

        if($request->is('get'))
        {
            Dashboard::sessionCheck();
            return view('d_input_produk');
        }

        if($request->is('post'))
        {
            $namaProduk =   $_POST['nama_produk'];
            $harga      =   $_POST['harga'];
            $stok       =   $_POST['stok'];
            $img        =   $this->  request->getFile('gambar');
            $email      =   $this->  session->get('email');
            $newNameImg =   $email.'.'.$img->getClientExtension();

            
            // tambah produk
            $service    =  $this->   produkService->addProduk($namaProduk,$newNameImg,
                                                                (int)$stok,(int)$harga,$email);
            if($service)
            {
                // memindahkan file gambar ke public/image_upload/produkimage
                $img->move(FCPATH . '\image_upload\produk_image',$newNameImg);

                return view('d_input_produk',['response'=>'produk berhasil ditambah']);
            }
               // data produk gagal input
            else{
                return view('d_input_produk',['response'=>'data gagal ditambah']);
            }          
        }
    }

    public function dashboardEditProduk($paramId_produk)
    {
        $request    = request();

        if($request->is('get'))
        {
            $arrayData  =   $this-> produkService->getAnyProduct($paramId_produk);
            
            if(empty($arrayData)){
                header('Location:/error');
                exit();
            }

            return view('d_edit_produk',['response'=>$arrayData]);
        }

        if($request->is('post'))
        {
            $namaProduk =   $_POST['nama_produk'];
            $harga      =   $_POST['harga'];
            $stok       =   $_POST['stok'];
            $id_produk  =   $paramId_produk;

            if($this->produkService->updateData($id_produk,$namaProduk,$harga,$stok))
            {
                header('Location:/user/dashboard');
                exit();
            }
            else{
                header('Location:/error');
                exit();
            }
        }
    }
    
}