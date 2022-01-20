<?php 

if (isset($_POST["girisyap"])) 
{
   $kadi=$_POST["kadi"];
   $sifre=$_POST["sifre"];

  if ($kadi=="soner" && $sifre=="12345") {
    header("Location:admin.php");
   }
   else
   {
    header("Location:admingiris.php");
    echo "<script>alert('Bilgileriniz Yanlış! Lütfen Tekrar Deneyiniz.')</script>";
   }
}
 ?>