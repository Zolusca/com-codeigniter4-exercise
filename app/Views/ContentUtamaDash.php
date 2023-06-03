<?= $this->extend('template/DashboardTemplate');?>

<?= $this->section('content');?>
<div class="content">
          <div class="kotak1">
                <?php if(isset($response)){?>
                <span>Selamat datang <?= $response ?></span>
                <?php }
                else{
                    echo '<span>Selamat datang </span>';
                }
                ?>
                <div class="kotak-child">
                    <div class="kotak-child1">
                        <b>Pesanan Baru</b>
                        <i>Hari ini</i>
                        <span>0</span>
                    </div>
                    <div class="kotak-child2">
                        <b>Pesanan Selesai</b>
                        <i>Hari ini</i>
                        <span>0</span>
                    </div>
                    
                </div>
          </div>

          <div class="kotak2">
            <div class="kotak2-child">
                <b>Informasi Pesanan</b>
                <table>
                    <tr>
                        <td><i>pesanan terkirim 3 hari terakhir</i></td>
                        <td>&emsp;:&emsp;</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td><i>pesanan dikembalikan 3 hari terakhir</i></td>
                        <td>&emsp;:&emsp;</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td><i>pendapatan hari ini</i></td>
                        <td>&emsp;:&emsp;</td>
                        <td>0</td>
                    </tr>
                </table>
            </div>
          </div>

          <div class="kotak3">
            <div class="kotak3-child">
                <span><b>Pengumuman</b></span>
                <div class="kotak3-childern">childern</div>
            </div>
          </div>

        </div>

        <?= $this->endSection() ?>