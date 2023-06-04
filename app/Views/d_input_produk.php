<?= $this->extend('template/InputProduk');?>
<?= $this->section('content');?>

        <div class="content">
            <h1>Form Penambahan Produk</h1>
            <form>
                <table>
                    <tr>
                        <td><label for="nama_produk">input nama produk</label></td>
                        <td>&emsp;</td>
                        <td><input type="text" id="nama_produk" required></td>
                    </tr>
                    <tr>
                        <td><label for="nama_produk">input harga produk</label></td>
                        <td>&emsp;</td>
                        <td><input type="text" id="nama_produk" required></td>
                    </tr>
                    <tr>
                        <td><label for="nama_produk">input stok  produk</label></td>
                        <td>&emsp;</td>
                        <td><input type="text" id="nama_produk" required></td>
                    </tr>
                    <tr>
                        <td><label for="nama_produk">input gambar  produk</label></td>
                        <td>&emsp;</td>
                        <td><input type="file" id="nama_produk"  required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="kirim" ></td>
                        <td>&emsp;</td>
                        <td></td>
                    </tr>
                </table>
            </form>
        </div>
    
<?= $this->endSection() ?>