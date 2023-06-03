<html>
    <head>
    <link rel="stylesheet" href="<?= base_url('/assets/css/dashboardlist.css')?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    </head>
    <div class="container">
        <div class="head">
            <img src="<?= base_url('assets/image_property/Muammalah.svg')?>">
            <span><a href="<?= base_url('/')?>">Keluar</a></span>
        </div>
        <div class="gap"></div>
        <div class="gap1"></div>

        
            <?= $this->renderSection('content');?>

        <div class="tombol">
    <div class="produk">
        <img src="<?= base_url('/assets/image_property/products.png')?>"> <b>Produk</b>
        <div class="produk-konten">
            <a href=""><b>Tambah Produk</b></a>
            <p></p>
            <a href=""><b>List Produk</b></a>
        </div>
    </div>
    <div class="penjualan">
        <img src="<?= base_url('assets/image_property/give-money.png')?>"> <b>penjualan</b>
    </div>
    <div class="pengiriman">
        <img src="<?= base_url('assets/image_property/delivery-man.png')?>"> <b>pengiriman</b>
    </div>
    <div class="keuangan">
        <img src="../../../asset/img/money.png"> <b>keuangan</b>
    </div>
    <div class="pengaturan">
        <img src="../../../asset/img/setting.png"> <b>pengaturan</b>
    </div>
    <div class="statistik">
        <img src="../../../asset/img/bar-chart.png"> <b>statistik</b>
    </div>
    <div class="bantuan">
        <img src="../../../asset/img/support.png"> <b>bantuan</b>
    </div>
</div>
</div>
</html>