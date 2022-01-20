<?php
include("baglanti.php");
if(isset($_GET['personeld'])){
    $personeld=$_GET['personeld'];

    $sql="DELETE FROM `personel` WHERE personeld= $personeld";
    $result = mysqli_query($baglanti,$sql);
    if($result){
        header('Location:personeller.php');
    }else{
        die(mysqli_error($baglanti));
    }
}
?>