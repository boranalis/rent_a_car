<?php
include("baglanti.php");
if(isset($_GET['rezId'])){
    $rezId=$_GET['rezId'];

    $sql="DELETE FROM `rezervasyon` WHERE rezId= $rezId";
    $result = mysqli_query($baglanti,$sql);
    if($result){
        header('Location:krezerve.php');
    }else{
        die(mysqli_error($baglanti));
    }
}
?>