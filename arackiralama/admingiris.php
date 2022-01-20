<?php
session_start();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Giriş Yap</title>
 <style> 
body {
  background-color: lightgray;
  margin: -10px;
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
input[type=password], select, textarea {
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
  background-color: #000000;
  color: white;
  padding: 12px 187px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #FFFFFF;
  color: black;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 25px;
}

.lcol {
  float: left;
  width: 9%;
  margin-top: 6px;
  margin-left:38%;
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

  <li class="right"><a href="login.php">Kullanıcı Girişi</a></li>
</ul>
</head>
<body>

    <div class =  "lheader";>
        <h1> ARAÇ KİRALAMA </h1>

</div>

<form action="admingiris.php" method="post" class="container">
<div class="row">
      <div class="lcol">
              <label for="kadi">E-Mail :</label> <br>
      </div>
              <div class="bcol">
                    <input type="text" name="pEmail">
      
              </div>
</div>
            <div class="row">
             <div class="lcol">
                  <label for="pass">TC No :</label> <br>
              </div>
                <div class="bcol">
                    <input type="password" name="personelTC">
                </div>
              
            </div>
                <br>
                <div class="row">
                    <input style="margin-right:719px;" type="submit" size="20" value="Giriş Yap" name="girisyap">
                    </div>
            </form>
    


</form>
</body>

</html>

<?php
include ("baglanti.php");
if(isset($_POST['pEmail']) and isset($_POST['personelTC']))
{
  $pEmail=$_POST['pEmail'];
  $personelTC=$_POST['personelTC'];
  
  $check_user="select * from personel WHERE pEmail='$pEmail' AND personelTC ='$personelTC'";
  $run=mysqli_query($baglanti,$check_user);
  if(mysqli_num_rows($run)){
    echo "<script>window.open('admin.php', '_self')</script>";
    $_SESSION['personelTC']=$personelTC;
  }
  else{
    echo"<script>alert('Bilgilerinizi kontrol edin')</script>";
  }
}
 

?>