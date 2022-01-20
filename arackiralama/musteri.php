<?php
  include ("baglanti.php");


?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Müşteriler</title>
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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 20px;
}

tr:nth-child(even) {
  background-color: #dddddd;
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

<?php

include ("baglanti.php");
$sql = "SELECT * FROM musteri";
$result = $baglanti->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>T.C. No</th><th>Ad</th><th>Soyad</th><th>Telefon</th><th>Şehir</th><th>Adres</th><th>E-Mail</th><th>Güncelle</th><th>Kaldır</th></tr>";
    
    while($row = $result->fetch_assoc()) {   ?>
  <tr>
    <td><?php echo $row["musteriId"]; ?></td>
    <td><?php echo $row["musteriTC"]; ?></td>
    <td><?php echo $row["mAd"]; ?></td>
    <td><?php echo  $row["mSoyad"]; ?></td>
    <td><?php echo $row["mTel"]; ?></td>
    <td><?php echo $row["mSehir"]; ?></td>
    <td><?php echo  $row["mAdres"]; ?></td>
    <td><?php echo $row["mEmail"]; ?></td>
    <td><a href='musteriguncelle.php?musteriId=<?php echo $row["musteriId"]; ?>'>Güncelle</a></td>
    <td><a href = "musterisil.php?musteriId=<?php echo $row["musteriId"]; ?>">Kaldır </td>
  </tr>
      <?php   
    }
    
    echo "</table>";
} else {
    echo "0 results";
}

$baglanti->close();
?>
</div>

</body>
</html>