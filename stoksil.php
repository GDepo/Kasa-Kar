<?php 
$sil=$_GET['id'];
if (isset($sil)) {
    include "baglan.php";
    $sorgu =$db->prepare('DELETE FROM urunler WHERE id=?');
    $sonuc =$sorgu->execute([$sil]);
    if ($sonuc) {
        header("Location:index.php");
    }
    else {
        echo   "Başarısız.";
    }
}




 ?>