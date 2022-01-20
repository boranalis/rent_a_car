<?php
include("baglanti.php");
if(isset($_GET['arabaId'])){
    $arabaId=$_GET['arabaId'];

    $sql="DELETE FROM `araba` WHERE arabaId= $arabaId";
    $result = mysqli_query($baglanti,$sql);
    if($result){
        header('Location:aracliste.php');
    }else{
        die(mysqli_error($baglanti));
    }
}
?>