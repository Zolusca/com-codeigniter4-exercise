<?= $this->extend('template/DashboardTemplateList');?>
<?= $this->section('content');?>

        <div class="content">
            <h1>List Produk</h1>
            <div class="container-produk">
                <div class="item">
                    <img src="<?= base_url('assets/image_property/give-money.png')?>">
                    <span>&emsp;</span>
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td>hijab keren banget ouy</td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td>input</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td>input</td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="EDIT"></td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <!--item  -->
                
            </div>
            <!-- container-produk -->
        </div>
        <?= $this->endSection() ?>