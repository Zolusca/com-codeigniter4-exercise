
<html>
    
<?php if($response) : ?>
              <?php foreach($response as $data) : ?>
                <div class="item">
                    <img src="<?= base_url('assets/image_property/give-money.png')?>">
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
                            <td><input type="submit" value="EDIT"></td>
                            <td>&emsp;</td>
                            <td>&emsp;</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <?php endforeach?>
                <?php endif?>
                </html>