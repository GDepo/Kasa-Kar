<?php 
include 'baglan.php';
if(isset($_POST['guncel'])) {

$id = $_POST['id'];
$u_no=$_POST['u_no'];
$uadi = $_POST['uadi'];
$alisfiyat = $_POST['alisfiyat'];
$satisfiyat = $_POST['satisfiyat'];
$adet = $_POST['adet'];

$guncelle = $db->exec("UPDATE urunler SET urun_no = '$u_no' ,urun_adi = '$uadi' , alinan_fiyat = '$alisfiyat' , satilan_fiyat = '$satisfiyat' ,
 adet= '$adet'  WHERE  id = '$id' ");
if ($guncelle) {
	header("Location:index.php");
}
else {
	echo "Güncelleme Başarısız";
}
}


 ?>