<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Membuat Text Field</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/DashboardRegister.css')?>">
</head>
<body>
<?php if(isset($response)){?>
  <dialog open class="alert">
            <b><?= $response ?></b>
            <form method="dialog">
              <button class="alertbutton">OK</button>
            </form>
          </dialog>
          <?php }?>
    <div class="field">
        <form action="/form/login/dashboardregister" method="post" enctype="multipart/form-data">
            <input type="text" pattern="[a-zA-Z0-9]+" name="namatoko" class="teks" placeholder="Masukkan Nama"
            maxlength="15" minlength="5" required>
            <input type="file" accept="image/*" name="filegambar" class="file" required>
            <input type="submit" value="kirim" class="submit">
        </form>
        
    </div>
    

   <div class="right">
   <img src="<?= base_url('/assets/image_property/dashboardregister.png')?>" alt="">
   </div>

</body>
</html>