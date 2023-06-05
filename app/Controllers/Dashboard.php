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
    private                 $time           ;
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

    public function dashboardView()
    {
        // tokoService->findtoko mengembalikan TokoModel
        $this->toko    = $this->   tokoService->findToko($this->session->get('email'));
        // toko mengembalikan UserModel
        $this->user    = $this->   toko->getUsers();
        
        return view('d_utama',['response'=>$this->user->getNama()]);
    }

    public function dashboardViewList()
    {
        return view('d_list_produk');
    }

    public function dashboardtambahproduk()
    {
        $request    = request();

        if($request->is('get'))
        {
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

            // delay input 
            date_default_timezone_set('Asia/Jakarta');
            $timeDelay  =  date("H:i:sa", strtotime("+2 minutes"));
            $this->time = date("H:i:sa");

            if($this->time===$timeDelay)
            {
                // tambah produk
                $service    =  $this->   produkService->addProduk($namaProduk,$newNameImg,
                                                            (int)$stok,(int)$harga,$email);

                if($service)
                {
                    // memindahkan file gambar ke public/image_upload/produkimage
                    $img->move(FCPATH . '\image_upload\produk_image',$newNameImg);

                    return view('d_input_produk',['response'=>'produk berhasil ditambah']);
                }

            }
            else{
                return view('d_input_produk',['response'=>'delay penambahan produk 2 menit']);
            }

            
        }
    }

    
}