

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Daftar</title>
  <link rel="icon" type="image/gif" href="<?= base_url('/assets/image_property/letter-m.png')?>">
  <link rel="stylesheet" href="<?= base_url('/assets/css/form.css')?>">
  <link rel="stylesheet" href="./style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
        <!-- $data merupakan nilai variable dari Muammalah\Config\Render -->
        <?php if(isset($response)){?>
          <dialog open class="alert">
            <p><?= $response ?></p>
            <form method="dialog">
              <button class="alertbutton">OK</button>
            </form>
          </dialog>
        <?php }?>

<div class="wrapper">
      <div class="title-text">
        <div class="title login">LOGIN</div>
        <div class="title signup">DAFTAR</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Daftar</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <!-- Login -->
          <form action="/form/login" method="post" class="login">
            <pre>
            </pre>
            <div class="field">
              <input type="text" placeholder="Masukan Email " name="email" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Masukan Password" name="password" required>
            </div>
            
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>

            <!-- registrasi -->
          </form>

          <form action="/form/daftar" method="post" class="signup">
            <div class="field">
              <input type="text" placeholder="Masukan Nama" name="nama" pattern="[a-zA-Z0-9]+" 
              title="Harap masukkan hanya huruf besar, huruf kecil, dan angka" required>
            </div>
            <div class="field">
              <input type="email" placeholder="Masukan Email" name="email" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Masukan Password" minlength="5" name="password" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Ulangi password" minlength="5" name="password1" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Daftar">
            </div>
          </form>
        </div>
      </div>
    </div>
  <script  src="<?= base_url('/assets/Javascript/form.js')?>"> </script>

</body>
</html>
