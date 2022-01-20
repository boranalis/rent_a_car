<?php
include ("baglanti.php");
if(!isset($_GET['rezId']))
{
  die('id bulunamadı');
}

  $rezId = $_GET['rezId'];
  $sql="SELECT * FROM rezervasyon WHERE rezId = $rezId";
  $result = $baglanti->query($sql);
  if($result->num_rows!= 1){
    die ('Rezervasyon yok');
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
<br><br><br><br><br><br>
<form method="post" action="krezerveguncelle.php?rezId=<?=$rezId?>">
  <div class="row">
    <div class="lcol">
      <label>Araba ID:</label>
    </div>
    <div class="bcol">
      <input type="text" id="arabaId" name="arabaId" value="<?= $data['arabaId']; ?>" >
    </div>
  </div>

  <div class="row">
    <div class="lcol">
      <label>Personel ID:</label>
    </div>
    <div class="bcol">
      <input type="text" id="personeld" name="personeld" value="<?= $data['personeld']; ?>" >
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label >Sube ID:</label>
    </div>
    <div class="bcol">
      <input type="text" id="subeId" name="subeId" value="<?= $data['subeId']; ?>" >
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label>Alış Tarihi:</label>
    </div>
    <div class="bcol">
      <input type="text" id="alisTarihi" name="alisTarihi" value="<?= $data['alisTarihi']; ?>">
    </div>
  </div>
  <div class="row">
    <div class="lcol">
      <label >İade Tarihi:</label>
    </div>
    <div class="bcol">
      <input type="text" id="iadeTarihi" name="iadeTarihi" value="<?= $data['iadeTarihi']; ?>" >
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
      $rezId = $_GET['rezId'];
  
     $arabaId = $_POST['arabaId'];
     $personeld = $_POST['personeld'];
     $subeId = $_POST['subeId'];
     $alisTarihi = $_POST['alisTarihi'];
     $iadeTarihi = $_POST['iadeTarihi'];
  
     $query = "UPDATE rezervasyon 
     SET arabaId = '$arabaId', 

     personeld = '$personeld', 
     subeId = '$subeId', 
     alisTarihi = '$alisTarihi',
     iadeTarihi = '$iadeTarihi'
         WHERE rezId = $rezId ";
         $res = mysqli_query($baglanti,$query);
         if($res){
            ?>
            <script>
              alert("Güncelleme İşlemi Başarılı");
            </script>
            <?php 
         }else{?>
              <script>
              alert("Güncelleme İşlemi Başarısız");
            </script>
          <?php
         }
    }
?>
</html>