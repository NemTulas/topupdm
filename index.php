<?php
include 'konek.php';
if(isset($_GET['aksi'])){
    if($_GET['aksi']=="edit"){
        $query = "SELECT * FROM pembeli WHERE ID='$_GET[ID]'";
        $edit = mysqli_query($koneksi,$query);
        while($data=mysqli_fetch_array($edit)){
            $id = $data['id'];
            $username = $data['username'];
            $password = $data['password'];
            $foto = $data['foto'];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
   <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./vendor/slick/slick.css">
   <link rel="stylesheet" href="./vendor/slick/slick-theme.css">
   <link rel="stylesheet" href="css/style.css">
   <title>YassShop - Indonesia</title>
</head>

<body>
   <!-- Notification -->
   <div class="notification" id="notif">
      <div class="notification__container">
         <i class="fas fa-bell"></i>
      </div>
   </div>

   <!-- Header -->
   <header class="header">
     <i class="fi fi-ss-user" width="100" height="100"></i>
     <div class="header__container">
         <div class="header__nav">
         <a href="daftar.php" class="support__link">
             <img src="./img/login.png" class="support__img" width="55" height="40" alt="">
         </a>    
            <div class="search">
               <span class="search__icon" id="search-btn">
                  <i class="fas fw fa-search"></i>
               </span>
            </div>
         </div>
      </div>
   </header>

   <!-- Banner -->
   <section class="banner">
      <div class="banner__container">
         <div class="banner__slide">
            <img src="./img/banner/mlbb_50dpromo_id.jpg" class="banner__img" alt="">
         </div>
         <div class="banner__slide">
            <img src="./img/banner/pubg_promo_id.jpg" class="banner__img" alt="">
         </div>
      </div>
   </section>

   <!-- Category 1 Category Popular -->
   <section class="category category--1">
      <div class="category__container">
         <h1 class="category__title">Game</h1>
         <div class="category__product">
            <a href="ml.php" class="category__product-container">
               <img src="./img/game/mlbb_tile.jpg" class="category__product-img" alt="">
               <p class="category__product-title">Mobile Legends</p>
            </a>
            <a href="ff.php" class="category__product-container">
               <img src="./img/game/freefire_tile.jpg" class="category__product-img" alt="">
               <p class="category__product-title">Free Fire</p>
            </a>
            <a href="pubg.php" class="category__product-container">
               <img src="./img/game/PUBG_RPS11_tile.jpg" class="category__product-img" alt="">
               <p class="category__product-title">PUBG Mobile</p>
            </a>
            <a href="cod.php" class="category__product-container">
               <img src="./img/game/codm_id_tile.jpg" class="category__product-img" alt="">
               <p class="category__product-title">Call of Duty Mobile</p>
            </a>
            <a href="idle.php" class="category__product-container">
               <img src="./img/game/idle_legends_tile.jpg" class="category__product-img" alt="">
               <p class="category__product-title">Idle Legends</p>
            </a>
            <a href="mla.php" class="category__product-container">
               <img src="./img/game/ml_adventure_tile.png" class="category__product-img" alt="">
               <p class="category__product-title">Mobile Legends: Adventure</p>
            </a>
         </div>
      </div>
   </section>

   <!-- About -->
   <section class="about">
      <div class="about__container">
         <h1 class="about__title">YasShop: Website top-up terbesar & terpercaya di Indonesia</h1>
         <p class="about__description">
            Setiap bulannya, jutaan gamers menggunakan YasShop untuk melakukan pembelian kredit game dengan lancar:
            tanpa registrasi ataupun log-in, dan kredit permainan akan ditambahkan secara instan. Top-up Mobile Legends,
            Free Fire, Ragnarok M, dan berbagai game lainnya!
         </p>
         <ul class="card">
            <li class="card__item">
               <div class="card__img">
                  <img src="img/icons/pay_in_seconds.png" alt="" class="card__icon">
               </div>
               <div class="card__content">
                  <h3 class="card__title">Bayar dalam hitungan detik</h3>
                  <p class="card__description">
                     Hanya dibutuhkan beberapa detik saja untuk menyelesaikan pembayaran di YasShop karena situs kami
                     berfungsi dengan baik dan mudah untuk digunakan.
                  </p>
               </div>
            </li>
            <li class="card__item">
               <div class="card__img">
                  <img src="img/icons/fast_delivery.png" alt="" class="card__icon">
               </div>
               <div class="card__content">
                  <h3 class="card__title">Pengiriman Instan</h3>
                  <p class="card__description">
                     Ketika kamu melakukan top-up di YasShop, item atau barang yang kamu beli akan selalu dikirim ke
                     akun kamu secara instan dan cepat, tanpa tertunda.
                  </p>
               </div>
            </li>
            <li class="card__item">
               <div class="card__img">
                  <img src="img/icons/best_payment_method.png" alt="" class="card__icon">
               </div>
               <div class="card__content">
                  <h3 class="card__title">Metode pembayaran terbaik</h3>
                  <p class="card__description">
                     Kami menawarkan begitu banyak pilihan pembayaran melalui bank transfer.
                  </p>
               </div>
            </li>
            <li class="card__item">
               <div class="card__img">
                  <img src="img/icons/24h_support.png" alt="" class="card__icon">
               </div>
               <div class="card__content">
                  <h3 class="card__title">Bantuan 24 jam</h3>
                  <p class="card__description">
                     Tim kami tersedia selama 24 jam selama 7 hari penuh dalam seminggu untuk menjawab
                     pertanyaan-pertanyaan kamu. Kami akan terus bekerja keras meningkatkan pelayanan kami :)
                  </p>
               </div>
            </li>
            <li class="card__item">
               <div class="card__img">
                  <img src="img/icons/promo.png" alt="" class="card__icon">
               </div>
               <div class="card__content">
                  <h3 class="card__title">Promosi-promosi menarik</h3>
                  <p class="card__description">
                     Penggemar game dapat bergantung pada YasShop karena kami memberikan penawaran menarik, diskon dan
                     kode item dari promosi game yang disukai kamu.
                  </p>
               </div>
            </li>
         </ul>
      </div>
   </section>

   <!-- News -->
   <section class="news">
      <div class="news__container">
         <h1 class="news__header">NEWS & PROMOTIONS</h1>
         <div class="news__card">
            <img src="./img/waspada_penipuan.jpg" class="news__img" alt="">
            <div class="news__card-body">
               <h4 class="news__title">Waspada Penipuan APK!</h4>
               <p class="news__description">Pengumuman penting dari YassShop</p>
            </div>
         </div>
      </div>
   </section>

   <!-- Footer -->
   <footer class="footer">
      <div class="footer__container">
         <div class="footer__content">
            <section class="left-content">
               <div class="social">
                  <h5 class="social__title">Dapatkan berita  di:</h5>
                  <div class="social__content">
                     <a href="#" class="social__link">
                        <img src="./img/socmed/socmed-facebook-H36.png" class="social__icon" alt="">
                     </a>
                     <a href="#" class="social__link">
                        <img src="./img/socmed/socmed-youtube-H36.png" class="social__icon" alt="">
                     </a>
                     <a href="#" class="social__link">
                        <img src="./img/socmed/socmed-instagram-H36.png" class="social__icon" alt="">
                     </a>
                  </div>
               </div>
               <div class="support">
                  <h5 class="support__title">Butuh Bantuan?</h5>
                  <a href="#" class="support__link">
                     <img src="./img/support.png" class="support__img" alt="">
                     <span class="support__text">Hubungi Kami</span>
                  </a>
               </div>
               <div class="country">
                  <img src="./img/indonesia.png" class="country__img" alt="">
                  <h5 class="country__title">Indonesia</h5>
               </div>
            </section>
            <section class="right-content">
               <div class="legal-content">
                  <a href="#" class="legal-content__text">Syarat & Ketentuan</a>
                  <a href="#" class="legal-content__text">Kebijakan Privasi</a>
                  <p class="legal-content__copyright">&copy; Hak Cipta Yass Payments</p>
               </div>
            </section>
         </div>
      </div>
   </footer>

   <script src="./node_modules/jquery/dist/jquery.min.js"></script>
   <script src="./vendor/slick/slick.min.js"></script>
   <script src="./js/app.js"></script>
</body>
</html>
