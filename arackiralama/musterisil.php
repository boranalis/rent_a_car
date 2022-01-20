<?php
include("baglanti.php");
if(isset($_GET['musteriId'])){
    $musteriId=$_GET['musteriId'];

    $sql="DELETE FROM `musteri` WHERE musteriId= $musteriId";
    $result = mysqli_query($baglanti,$sql);
    if($result){
        header('Location:musteri.php');
    }else{
        die(mysqli_error($baglanti));
    }
}
?>