<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Araç Filosu</title>
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

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
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

</head>
<body>
    <style></style>

    <h2>Karşınızda Araç Filomuz.</h2>

<h4>Zevkinize has araçlar için aşağı kaydırınız.</h4>

<?php

include ("baglanti.php");
$sql = "SELECT arabaId, marka, model, kAd, konum, koltuk FROM araba,arabakategori WHERE arabakategori.kId=araba.kId";
$result = $baglanti->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Marka</th><th>Model</th><th>Kategori</th><th>Konum</th><th>Koltuk</th><th>Rezervasyon Yap!</th></tr>";
    
    while($row = $result->fetch_assoc()) { ?>
        <tr>
         <td><?php echo $row["arabaId"] ?></td>
         <td><?php echo $row["marka"]?></td>
         <td><?php echo $row["model"] ?></td>
         <td><?php echo $row["kAd"]?></td>
         <td><?php echo $row["konum"] ?></td>
         <td><?php echo $row["koltuk"] ?></td>
         <td><a href='rezervasyon.php?arabaId=<?php echo $row["arabaId"] ?>'>Rezervasyon Yap!</a></td>
        </tr>
         
    <?php }
    echo "</table>";
} else {
    echo "0 results";
}

$baglanti->close();

?>

</body>
</html>