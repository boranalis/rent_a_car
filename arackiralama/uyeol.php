<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Uye OL!</title>
<style> 
body {
  background-color: lightgray;
  margin: 0;
}

@font-face {
    font-family: monospace;
 }
 

 * {
    font-family: monospace;
    text-align: center;
    color: black;
 }
 
 
 ul.topnav {  
   position: sticky;
   top: 0;
   list-style-type: none;
   margin: 0;
   padding: 0;
   overflow: hidden;
   background-color: #333;
 }
 
 ul.topnav li {float: left;}
 
 ul.topnav li a {
   display: block;
   color: white;
   font-size: 15px;
   text-align: center;
   padding: 31px 50px;
   text-decoration: none;
 }
 
 ul.topnav li a:hover {background-color: #111;}
 
 ul.topnav li.right {float: right;}
 
 @media screen and (max-width: 600px) {
   ul.topnav li.right, 
   ul.topnav li {float: none;}
 }

* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #333;
  color: white;
  padding: 12px 155px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  margin-right:41%;
}

input[type=submit]:hover {
  background-color: #FFFFFF;
  color:#000000;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 25px;
}

.lcol {
  float: left;
  width: 5%;
  margin-top: 6px;
  margin-left:39%;
}

.bcol {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.row:after {
    
  content: "";
  display: table;
  clear: both;
}


@media screen and (max-width: 600px) {
  .lcol, .bcol, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
 </style>



<ul class="topnav">
  <li><a class="right" href="main.php">Anasayfa</a></li>

  <li class="right"><a href="login.php">Giriş Yap</a></li>
</ul>

</head>
<body>

<h2>Yeni kullanıcı kaydı</h2>
<p>Lütfen bilgilerinizi doğru ve eksiksiz giriniz.</p>

<div class="container">
  <form method="post" action="uyeol.php">
  <div class="row">
    <div class="lcol">
      <label for="fname">T.C. No:</label>
    </div>
    <div class="bcol">
      <input type="text" id="musteriTC" name="musteriTC" placeholder="Kimlik nuamaranız...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="lname">İsim:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mAd" name="mAd" placeholder="İsminiz...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="fname">Soyisim:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mSoyad" name="mSoyad" placeholder="Soyisminiz...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="lname">Telefon:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mTel" name="mTel" placeholder="Telefonunuz...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="fname">Şehir:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mSehir" name="mSehir" placeholder="Şehriniz...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="lname">Adres:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mAdres" name="mAdres" placeholder="Adresiniz...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="fname">E-Mail:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mEmail" name="mEmail" placeholder="Mail adresiniz...">
    </div>
  </div>

  <br>
  <div class="row">
    <input href="index.php" type="submit" name="btn" value="Üye OL!">
  </div>
  </form>
</div>


</body>

<?php 
@$kontrol = $_POST['btn'];
if($kontrol){
    $musteriTC = $_POST['musteriTC'];
    $mAd = $_POST['mAd'];
    $mSoyad = $_POST['mSoyad'];
    $mTel = $_POST['mTel'];
    $mSehir = $_POST['mSehir'];
    $mAdres = $_POST['mAdres'];
    $mEmail = $_POST['mEmail'];
    include("baglanti.php");
    $ekle = ("insert into musteri(musteriTC,mAd,mSoyad,mTel,mSehir,mAdres,mEmail) values ('$musteriTC','$mAd','$mSoyad','$mTel','$mSehir','$mAdres','$mEmail')");
    if(empty($musteriTC) || empty($mAd) || empty($mSoyad) || empty($mTel) || empty($mSehir) || empty($mAdres) || empty($mEmail)){

    }
    elseif($baglanti->query($ekle)== true){
      echo"<script>alert('Üye Olma İşlemi Başarılı!')</script>";
}
    else{
      echo "hata".$ekle."<br>".$baglanti->error; 
    }
  }

?>

</html>