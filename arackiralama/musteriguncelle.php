<?php
include ("baglanti.php");
if(!isset($_GET['musteriId']))
{
  die('id bulunamadı');
}

  $musteriId = $_GET['musteriId'];
  $sql="SELECT * FROM musteri WHERE musteriId = $musteriId";
  $result = $baglanti->query($sql);
  if($result->num_rows!= 1){
    die ('kullanıcı yok');
  }
  $data = $result ->fetch_assoc();

  

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Admin</title>
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
  width: 200px;
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
     <li class="right"><a href="index.php">Çıkış yap</a></li>
</ul>

</head>
<body>
<br>

<div class="container">
  <BR><BR><BR><BR><BR><BR> <BR><BR>
<a href="personelekle.php" class="button">Personel Ekle</a>
<a href="personeller.php" class="button">Personeller</a>
<a href="rezerve.php" class="button">Rezervasyon</a>
<a href="aracekle.php" class="button">Araç Ekle</a>
<a href="aracliste.php" class="button">Araçlar</a>
<a href="musteri.php" class="button">Müşteri Listesi</a>
<a href="admin.php" class="button">Admin</a>
</div>

<br>
<br>
<div class="container2">
<br><br><br><br><br><br>
<form method="post" action="musteriguncelle.php?musteriId=<?=$musteriId?>">
  <div class="row">
    <div class="lcol">
      <label>T.C. No:</label>
    </div>
    <div class="bcol">
      <input type="text" id="musteriTC" name="musteriTC" value="<?= $data['musteriTC']; ?>" placeholder="Kimlik nuamarası...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label>İsim:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mAd" name="mAd" value="<?= $data['mAd']; ?>"  placeholder="İsim...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label >Soyisim:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mSoyad" name="mSoyad" value="<?= $data['mSoyad']; ?>"  placeholder="Soyisim...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label>Telefon:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mTel" name="mTel" value="<?= $data['mTel']; ?>"  placeholder="Telefon...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label >Şehir:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mSehir" name="mSehir" value="<?= $data['mSehir']; ?>"  placeholder="Şehir...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label>Adres:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mAdres" name="mAdres" value="<?= $data['mAdres']; ?>"  placeholder="Adres...">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label >E-Mail:</label>
    </div>
    <div class="bcol">
      <input type="text" id="mEmail" name="mEmail" value="<?= $data['mEmail']; ?>"  placeholder="Mail adresi...">
    </div>
  </div>
  <br>
  <div class="row">
    <input type="submit" name="guncelle" value="Güncelle">
  </div>

  </form>
</div>

</body>

<?php 
    if(isset($_POST['guncelle'])){
      $musteriId = $_GET['musteriId'];
  
     $musteriTC = $_POST['musteriTC'];
     $mAd = $_POST['mAd'];
     $mSoyad = $_POST['mSoyad'];
     $mTel = $_POST['mTel'];
     $mSehir = $_POST['mSehir'];
     $mAdres = $_POST['mAdres'];
     $mEmail = $_POST['mEmail'];
  
     $query = "UPDATE musteri 
     SET musteriTC = '$musteriTC', 
         mAd = '$mAd', 
         mSoyad = '$mSoyad', 
         mTel = '$mTel', 
         mSehir = '$mSehir', 
         mAdres = '$mAdres',
         mEmail = '$mEmail'
         WHERE musteriId = $musteriId ";
         $res = mysqli_query($baglanti,$query);
         if($res){
            ?>
            <script>
              alert("Güncelleme İşlemi Başarılı :)");
            </script>
            <?php 
         }else{?>
              <script>
              alert("Güncelleme İşlemi Başarısız :(");
            </script>
          <?php
         }
    }
?>
</html>