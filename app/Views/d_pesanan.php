<?= $this->extend('template/Pesanan');?>
<?= $this->section('content');?>



    <div class="content">
        <h1>Pesanan</h1>

        <?php if(isset($response)) : ?>
              
    <div class="id-kotak">
        <div class="child-kotak">
            <span>No Resi : <?= $response['no_resi']?></span>
            <a href="https://google.com"><img src="<?= base_url('assets/image_property/chat.png')?>"></a>
        </div>
        <div class="childern-kotak">
            <table>
                <tr>
                    <th>Jumlah Pesanan</th>
                    <th>Status</th>
                    <th>Nama Barang</th>
                    <th>Total Harga</th>
                </tr>
                <tr>
                    <td><?= $response['jumlah_pesanan']?></td>
                    <td><?= $response['status']?></td>
                    <td><?= $response['nama_barang']?></td>
                    <td><?= $response['total_harga']?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php else :?>
        <h1>Tidak Ada pesanan hari Ini</h1>
                <?php endif?>
    </div><!-- content -->
    
    <?= $this->endSection() ?>