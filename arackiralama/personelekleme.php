<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Personel Ekle</title>
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
 
 .footer {
  position: relative;
  background-color: #333;
  padding: 100px;
  top:100px;
  text-align: left;

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
  <li><a class="right" href="index.php">Anasayfa</a></li>
  <li><a href="filo.php">Araç Filosu</a></li>
  <li><a href="iletisim.php">İletişim</a></li>
  <li><a href="hakkinda.php">Hakkında</a></li>
  <li class="right"><a href="login.php">Giriş Yap</a></li>
</ul>

</head>
<body>

<h2>Yeni personel kaydı</h2>
<p>Lütfen bilgileri doğru ve eksiksiz giriniz.</p>

<div class="container">
  <form method="post" action="personelekle.php">
  <div class="row">
    <div class="lcol">
      <label for="fname">T.C. No:</label>
    </div>
    <div class="bcol">
      <input type="text" id="personelTC" name="personelTC" placeholder="Kimlik nuamarası...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="lname">İsim:</label>
    </div>
    <div class="bcol">
      <input type="text" id="pAd" name="pAd" placeholder="İsim...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="fname">Soyisim:</label>
    </div>
    <div class="bcol">
      <input type="text" id="pSoyad" name="pSoyad" placeholder="Soyisim...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="lname">Telefon:</label>
    </div>
    <div class="bcol">
      <input type="text" id="pTel" name="pTel" placeholder="Telefon...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="fname">Şehir:</label>
    </div>
    <div class="bcol">
      <input type="text" id="pSehir" name="pSehir" placeholder="Şehir...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="lname">Adres:</label>
    </div>
    <div class="bcol">
      <input type="text" id="pAdres" name="pAdres" placeholder="Adres...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="fname">E-Mail:</label>
    </div>
    <div class="bcol">
      <input type="text" id="pEmail" name="pEmail" placeholder="Mail adresi...">
    </div>
  </div>

  <br>
  <div class="row">
    <input href="index.php" type="submit" name="btn" value="Personel Ekle!">
  </div>
  </form>
</div>


<div class="footer">
<a href="index.php" style="text-decoration:none; color:white">Anasayfa</a><br><br>

<a href="filo.php" style="text-decoration:none; color:white">Araç Filosu</a><br><br>
<a href="rezervasyon.php" style="text-decoration:none; color:white">Rezervasyon</a><br><br>
<a href="iletisim.php" style="text-decoration:none; color:white">İletişim</a><br><br>
<a href="hakkinda.php" style="text-decoration:none; color:white">Hakkında</a>
</div>



</body>
<?php 
@$kontrol = $_POST['btn'];
if($kontrol){
    $personelTC = $_POST['personelTC'];
    $pAd = $_POST['pAd'];
    $pSoyad = $_POST['pSoyad'];
    $pTel = $_POST['pTel'];
    $pSehir = $_POST['pSehir'];
    $pAdres = $_POST['pAdres'];
    $pEmail = $_POST['pEmail'];
    include("baglanti.php");
    $ekle = ("insert into personel(personelTC,pAd,pSoyad,pTel,pSehir,pAdres,pEmail) values ('$personelTC','$pAd','$pSoyad','$pTel','$pSehir','$pAdres','$pEmail')");}
    if(empty($personelTC) || empty($pAd) || empty($pSoyad) || empty($pTel) || empty($pSehir) || empty($pAdres) || empty($pEmail)){
      echo "Boşlukları doldurunuz!" ;
  }
    elseif($baglanti->query($ekle)== true){
      die ("Personel eklendi!");
}
    else{
      echo "hata".$ekle."<br>".$baglanti->error;
    }
/*if($baglanti->query($ekle)== true){
        die ("Personel Eklendi!");
    }
    else{
        echo "hata".$ekle."<br>".$baglanti->error;
    }*/
?>
</html>
