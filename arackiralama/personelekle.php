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
   position: relative;
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

.container {
    position:absolute;
    width:500px;
    height:700px;
    background-color:white;
    padding:auto;
    border-radius:15px;
    margin-left:50px;
    margin-top:1%;
}
.container2 {
    position:relative;
    width:1200px;
    height:650px;
    background-color:white;
    padding:auto;
    margin-left:33%;
    border-radius:40px;
    margin-top:1%;
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
  padding: 12px 75px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  margin-right:40%;
}

input[type=submit]:hover {
  background-color: #FFFFFF;
  color:#000000;
}
.lcol {
  float: left;
  width: 6%;
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
.button {
  background-color: #AEAEAE;
  border: none;
  color: black;
  padding: 15px 100px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 6px 2px;
  cursor: pointer;
  border-radius:30px;
  width: 400px;
}
.button2 {
  background-color: #333;
  color: white;
  padding: 12px 62px;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  margin-right:-540px;
  text-decoration:none;
}
.button2:hover {
  background-color: #FFFFFF;
  color:#000000;
}
 </style>

<?php
include("baglanti.php");
session_start();
?>

<ul class="topnav">
  <li><a class="right" href="main.php">Anasayfa</a></li>
  <li class="right"><a href="admin.php">    <?php
    $kullanici = $_SESSION['personelTC'];
    $sql = "SELECT * FROM personel WHERE personelTC='$kullanici'";
    $verial = mysqli_query($baglanti,$sql);

    if($verial){
        if(mysqli_num_rows($verial)>0){
            while($row = mysqli_fetch_array($verial)){
                print_r($row['pAd']);
            }
        }

    }

    ?></a></li>
     <li class="right"><a href="index.php">????k???? yap</a></li>
</ul>

</head>
<body>
<br>

<div class="container">
  <BR><BR><BR><BR><BR><BR> <BR><BR>
<a href="personelekle.php" class="button">Personel Ekle</a>
<a href="personeller.php" class="button">Personeller</a>
<a href="rezerve.php" class="button">Rezervasyon</a>
<a href="aracekle.php" class="button">Ara?? Ekle</a>
<a href="aracliste.php" class="button">Ara??lar</a>
<a href="musteri.php" class="button">M????teri Listesi</a>
<a href="admin.php" class="button">Admin</a>
</div>

<br>
<br>
<div class="container2">
  <br><br><br><br><br><br>
<form method="post" action="personelekle.php">
  <div class="row">
    <div class="lcol">
      <label for="fname">T.C. No:</label>
    </div>
    <div class="bcol">
      <input type="text" id="personelTC" name="personelTC" placeholder="Kimlik nuamaras??...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label for="lname">??sim:</label>
    </div>
    <div class="bcol">
      <input type="text" id="pAd" name="pAd" placeholder="??sim...">
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
      <label for="fname">??ehir:</label>
    </div>
    <div class="bcol">
      <input type="text" id="pSehir" name="pSehir" placeholder="??ehir...">
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

    <input type="submit" name="btn" value="Personel Ekle!">
  </div>

  </form>
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

    }
    elseif($baglanti->query($ekle)== true){
      echo"<script>alert('Personel eklendi!')</script>";
}
    else{
      echo "hata".$ekle."<br>".$baglanti->error; 
    }

?>
</html>