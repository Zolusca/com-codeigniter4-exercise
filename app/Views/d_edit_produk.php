<?= $this->extend('template/InputProduk');?>
<?= $this->section('content');?>

<?php if(isset($response)):?>
        <div class="content">
            <h1>Form Edit Produk</h1>
            <form method="post" action="/user/dashboard/editproduk/<?= $response[0]?>" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="nama_produk">input nama produk</label></td>
                        <td>&emsp;</td>
                        <td><input type="text" value="<?= $response[1]?>" id="nama_produk" name="nama_produk" pattern="[A-Za-z0-9\s]*" minlength="6" maxlength="20" required></td>
                    </tr>
                    <tr>
                        <td><label for="harga_produk">input harga produk</label></td>
                        <td>&emsp;</td>
                        <td><input type="number" value="<?= $response[2]?>" id="harga_produk" name="harga" minlength="3" maxlength="20" required></td>
                    </tr>
                    <tr>
                        <td><label for="stok_produk">input stok  produk</label></td>
                        <td>&emsp;</td>
                        <td><input type="number" value="<?= $response[2]?>" id="stok_produk" name="stok" minlength="3" maxlength="15" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="kirim" ></td>
                        <td>&emsp;</td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php endif?>

<?= $this->endSection() ?>