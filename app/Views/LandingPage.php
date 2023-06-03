<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page With Light/Dark Mode</title>
    <link rel="stylesheet" href="<?= base_url('/assets/css/landingpage.css')?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="big-wrapper light">

        <header>
          <div class="container">
            <div class="logo">
              <img src="<?= base_url('/assets/image_property/Muammalah.svg')?>" alt="Logo" />
            </div>

            <div class="links">
              <ul>
                <li><a href="/form" class="btn-masuk" style="color:#4895D7 ;" >Masuk</a></li>
                <li><a href="<?= base_url('/about')?>">Tentang</a></li>
                <li><a href="<?= base_url('/pertanyaan')?>">Pertanyaan</a></li>
              </ul>
            </div>

            <div class="overlay"></div>

            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>
          </div>
        </header>

        <div class="showcase-area">
          <div class="container">
            <div class="left">
              <div class="big-title">
                <h1>Dashboard Seller</h1>
                <h1>Secara Online</h1>
              </div>
              <p class="text">
                Kelola dan kembangkan toko onlinemu secara mudah dengan Muammalah
              </p>
              <div class="cta">
                <a href="#" class="btn">Buat Akun</a>
              </div>
            </div>

            <div class="right">
              <img src="<?= base_url('/assets/image_property/gambar.svg')?>" alt="Person Image"  />
            </div>
          </div>
        </div>

        
          
      </div>
    </main>


    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="./app.js"></script>
  </body>
</html>
