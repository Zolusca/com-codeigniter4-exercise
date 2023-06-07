
<?= $this->extend('template/ListProduk');?>
<?= $this->section('content');?>

        <div class="content">
            <h1>List Produk</h1>
            <div class="container-produk">
 
            <?php if($response) : ?>
              <?php foreach($response as $data) : ?>
                <div class="item">
                    <img src="<?= base_url('image_upload/produk_image/'.$data['gambar'])?>">
                    <span>&emsp;</span>
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td><?= $data['nama_produk']?></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td><?= $data['stok']?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td><?= $data['harga']?></td>
                        </tr>
                        <tr>
                            <td><a class="edit" href="<?= base_url('/user/dashboard/editproduk/'.$data['id_produk'])?>">Edit</a></td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <?php endforeach?>
                <?php endif?>
                
            </div>
            <!-- container-produk -->
        </div>
        <?= $this->endSection() ?>