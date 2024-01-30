<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet"><link rel="stylesheet" href="./style2.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="product-container">
  <div class="image">
    <img src="./img/Diamond1.png" alt="" border="0" />
  </div>
  <div class="details">
    <h1 class="cost">Rp 5.000</h1>
    <h3 class="title">Diamond ML </h3>
  </div>
</div>
<div class="card-container">
  <div class="mastercard">
    <div class="logo"></div>
    <div class="name">mastercard</div>
  </div>
  <div class="card-details">
    <div class="card-number field">
      <label for="cn">CARD NUMBER</label>
      <input id="cn" type="text" />
    </div>
    <div class="card-name field">
      <label for="cna">NAME ON CARD</label>
      <input id="cna" type="text" />
    </div>
    <div class="expires field">
      <label for="exp">EXPIRES</label>
      <input id="exp" type="text" />
    </div>
    <div class="cvc field">
      <label for="cvc">CVC</label>
      <input id="cvc" type="text" />
    </div>
  </div>
  <a href="cetak.php"><button class="purchase-button" data-content="PURCHASE">PURCHASE</button></a>
</div>
<!-- partial -->
  
</body>
</html>
