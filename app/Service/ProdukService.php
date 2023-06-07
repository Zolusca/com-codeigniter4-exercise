<?php
namespace App\Service;

use App\Models\ProdukModel;
use App\Repository\ProdukRepository;
use App\Repository\TokoRepository;

class ProdukService
{
    private ProdukModel       $produk           ;
    private ProdukRepository  $produkRepository ;
    private TokoService       $tokoService      ;


    public function __construct()
    {
        $this->  produk               = new ProdukModel();
        $this->  produkRepository     = new ProdukRepository();
        $this->  tokoService          = new TokoService();
    }

    public function addProduk(string $nama_produk,string $gambar,
                                int $stok,int $harga,string $email)
    {
        // mendapatkan data toko melalui email session, return object toko
        $tokoModel  =   $this->   tokoService->findToko($email);
        // keperluan penambahan jumlah produk pada tabel toko
        $idUser     =   $tokoModel->getIdUser();
        
        // inisialisasi objek produk
        $this->  produk->setNama    ($nama_produk);
        $this->  produk->setGambar  ($gambar);
        $this->  produk->setStok    ($stok);
        $this->  produk->setHarga   ($harga);
        $this->  produk->setToko    ($tokoModel);

        if($this->  produkRepository->insertProduk($this->  produk) && 
           $this->tokoService->incrementProduk($idUser) )
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function getAllProduk(int $id_toko)
    {
          return $this-> produkRepository->retriveData($id_toko);
    }

    public function getAnyProduct(int $id_produk)
    {
        $dataModel  =   $this-> produkRepository->getAnyProduct($id_produk);
        if($dataModel   ==  null)
        {
            return [];
        }
        else{
            return[ $dataModel->getId_produk(),
                    $dataModel->getNamaProduk(),
                    $dataModel->getHarga(),
                    $dataModel->getStok()];
        }
    }

    public function updateData(int $id_produk,string $nama_produk,
                              int $harga,int $stok)
    {
        $this->  produk->setId_produk($id_produk);
        $this->  produk->setNama     ($nama_produk);
        $this->  produk->setHarga    ($harga);
        $this->  produk->setStok     ($stok);

        if($this->  produkRepository->updateData($this->produk))
        {
            return true;//berhasil di update
        }
        else{
            return false;// gagal diupdate
        }
    }
}