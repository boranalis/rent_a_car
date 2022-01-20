<?php
include("baglanti.php");
if(!isset($_GET['arabaId']))
{
  die('id bulunamadı');
}

  $arabaId = $_GET['arabaId'];
  $sql="SELECT * FROM araba WHERE arabaId = $arabaId";
  $result = $baglanti->query($sql);
  if($result->num_rows!= 1){
    die ('araba yok');
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
    <title>Rezervasyon</title>
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
 

select {
  width: 50%;
  padding: 16px 20px;
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}


.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 25px;
}

.button {
  font-size: 28px;
  padding: 20px;
  width: 430px;
  transition: all 0.5s;
  cursor: pointer;
  margin-top: 15px;
  margin-right: 740px;
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

input[type=date], select, textarea {
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
  background-color: gray;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  font-size: 28px;
  padding: 20px;
  width: 430px;
  transition: all 0.5s;
  cursor: pointer;
  margin-top: 15px;
  margin-right: 740px;
}

input[type=submit]:hover {
  background-color: lightgray;
  color: black;
}

.lcol {
  float: left;
  width: 9%;
  margin-top: 6px;
  margin-left:36%;
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

<?php
include("baglanti.php");
session_start();
?>

<ul class="topnav">
  <li><a class="right" href="main.php">Anasayfa</a></li>
  <li class="right"><a href="memberpage.php">    <?php
    $kullanici = $_SESSION['musteriTC'];
    $sql = "SELECT * FROM musteri WHERE musteriTC='$kullanici'";
    $verial = mysqli_query($baglanti,$sql);

    if($verial){
        if(mysqli_num_rows($verial)>0){
            while($row = mysqli_fetch_array($verial)){
                print_r($row['mAd']);
            }
        }

    }

    ?></a></li>
     <li class="right"><a href="index.php">Çıkış yap</a></li>
</ul>
<div class="container" style="font-size:25px;">
<?php
    $kullanici = $_SESSION['musteriTC'];
    $sql = "SELECT * FROM musteri WHERE musteriTC='$kullanici'";
    $verial = mysqli_query($baglanti,$sql);

    if($verial){
        if(mysqli_num_rows($verial)>0){
            while($row = mysqli_fetch_array($verial)){
              echo "ID Numaranız : ";
                print_r($row['musteriId']);
            }
        }

    }

?>
</div>
</head>
<body>

<br><br><br><br>
<div style="margin:auto;"class="container">
<form action="rezervasyon.php?arabaId=<?=$arabaId?>" method="post" >
<div class="row">
    <div class="lcol">
 <label>ID Numarası:</label> 
 </div>
 <div class="bcol">
  <input type="text" name="musteriId">
</div>  
</div>

<br>

<div class="row">
<div class="lcol">
<label>Araç ID:</label>
</div>
 <div class="bcol">
  <input type="text" name="arabaId" value="<?= $data['arabaId']; ?>">
</div>
</div>

<br>

<div class="row">
<div class="lcol">
<label>Kiralanan Araç:</label>
</div>
 <div class="bcol">
  <input type="text" name="marka" value="<?= $data['marka']; ?>">
</div>
</div>

<br>

<div class="row">
<div class="lcol">
<label>Araç Modeli:</label> 
</div>
 <div class="bcol">
  <input type="text" name="model" value="<?= $data['model']; ?>">
</div>
</div>
  
<br>

<div class="row">
<div class="lcol">
<label>Personel Id:</label> 
</div>
 <div class="bcol">
  <input type="text" name="personeld" >
</div>

<br>

<div class="row">
<div class="lcol">
<label>Şube Konumu:</label> 
</div>
 <div class="bcol">
  <input type="text" name="subeId" >
</div>
</div>

<br>

<div class="row">
<div class="lcol">
<label>Teslim Tarihi:</label> 
</div>
 <div class="bcol">
  <input type="text" name="alisTarihi" >
</div>
</div>

<br>

<div class="row">
<div class="lcol">
<label>İade Tarihi:</label> 
</div>
 <div class="bcol">
  <input type="text" name="iadeTarihi" >
</div>
</div>

<div class="row">
<input type="submit" name="kirala" value="Kirala">
</div>
</div>

<?php 
@$kontrol = $_POST['kirala'];
if($kontrol){
    $musteriId = $_POST['musteriId'];
    $arabaId = $_POST['arabaId'];
    $personeld = $_POST['personeld'];
    $subeId = $_POST['subeId'];
    $alisTarihi = $_POST['alisTarihi'];
    $iadeTarihi = $_POST['iadeTarihi'];
  
    $ekle = (" INSERT INTO rezervasyon(musteriId, arabaId, personeld,subeId,alisTarihi,iadeTarihi) values ('$musteriId','$arabaId','$personeld','$subeId','$alisTarihi','$iadeTarihi')");}
    if(empty($musteriId) || empty($arabaId) || empty($personeld) || empty($subeId) || empty($alisTarihi) || empty($iadeTarihi)){
        
    }
    elseif($baglanti->query($ekle)== true){
      echo"<script>alert('Rezervasyonunuz gönderildi!')</script>";
}
    else{
      echo "HATA!".$ekle."<br>".$baglanti->error; 
    }
?>

</body>
</html>