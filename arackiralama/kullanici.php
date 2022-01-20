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
    <title>Araç Kiralama</title>
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
    
 .header {
   position: absolute;
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
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 40px;
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

<div class="container">
<BR><BR><BR><BR><BR><BR>
<?php
    $kullanici = $_SESSION['musteriTC'];
    $sql = "SELECT * FROM musteri WHERE musteriTC='$kullanici'";
    $verial = mysqli_query($baglanti,$sql);

    if($verial){
        if(mysqli_num_rows($verial)>0){
            while($row = mysqli_fetch_array($verial)){
                echo "Hoşgeldin ";
                print_r ($row['mAd']);
            }
        }

    }

    ?>

  <BR><BR><BR><BR><BR><BR> 
  <BR><BR><BR><BR><BR><BR><BR>
<a href="kullanici.php" class="button">Kullanıcı bilgilerim</a>
<a href="krezerve.php" class="button">Rezervasyonlarım</a>
</div>

<br>
<br>
<div class="container2">
<?php

include ("baglanti.php");
$sql = "SELECT * FROM musteri WHERE musteriTC=$kullanici";
$result = $baglanti->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>T.C. No</th><th>Ad</th><th>Soyad</th><th>Telefon</th><th>Şehir</th><th>Adres</th><th>E-Mail</th></tr>";
    
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
  </tr>

  <a href="kullaniciguncelle.php?musteriId=<?php echo $row["musteriId"]; ?>" style="position:absolute; margin-top:37%; margin-left:-35%;" class="button">Bilgilerimi Güncelle</a>
  <a href="hesapsil.php?musteriId=<?php echo $row["musteriId"]; ?>" style="position:absolute; margin-top:37%; margin-left:0%;" class="button">Hesabımı sil</a>

      <?php   
    }
    
    echo "</table>";
} else {
    echo "0 results";
}

$baglanti->close();
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


</div>


</body>
</html>