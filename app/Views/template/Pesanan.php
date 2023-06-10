<html>
    <head>
    <link rel="stylesheet" href="<?= base_url('/assets/css/d_list.css')?>">
    <link rel="stylesheet" href="<?= base_url('/assets/css/DataPesanan.css')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    </head>
    <div class="container">
        <div class="head">
            <img src="<?= base_url('assets/image_property/Muammalah.svg')?>">
            <span><a href="<?= base_url('/logout')?>">Keluar</a></span>
        </div>
        <div class="gap"></div>
        <div class="gap1"></div>

        
            <?= $this->renderSection('content');?>

        <div class="tombol">
    <div class="produk">
        <img src="<?= base_url('/assets/image_property/products.png')?>"> <b><a href="<?= base_url('/user/dashboard')?>">Produk</a></b>
        <div class="produk-konten">
            <a href="<?= base_url('/user/dashboard/tambahproduk')?>"><b>Tambah Produk</b></a>
            <p></p>
            <a href="<?= base_url('/user/dashboard/list')?>"><b>List Produk</b></a>
        </div>
    </div>
    <div class="penjualan">
        <img src="<?= base_url('assets/image_property/give-money.png')?>"> <b><a href="<?= base_url('/user/dashboard/order')?>">Penjualan</a></b>
    </div>
    <div class="pengiriman">
        <img src="<?= base_url('assets/image_property/delivery-man.png')?>"> <b><a href="<?= base_url('/user/dashboard')?>">Pengiriman</a></b>
    </div>
    <div class="keuangan">
        <img src="<?= base_url('assets/image_property/money.png')?>"> <b><a href="<?= base_url('/user/dashboard')?>">Keuangan</a></b>
    </div>
    <div class="pengaturan">
        <img src="<?= base_url('assets/image_property/setting.png')?>"> <b><a href="<?= base_url('/user/dashboard')?>">Pengaturan</a></b>
    </div>
    <div class="statistik">
        <img src="<?= base_url('assets/image_property/bar-chart.png')?>"> <b><a href="<?= base_url('/user/dashboard')?>">Statistik</a></b>
    </div>
    <div class="bantuan">
        <img src="<?= base_url('assets/image_property/support.png')?>"> <b><a href="<?= base_url('/user/dashboard')?>">Bantuan</a></b>
    </div>
</div>
</div>
</html>