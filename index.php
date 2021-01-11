<?php include 'baglan.php'; 

$sorgu=$db->prepare('SELECT * FROM urunler');
$sorgu->execute();
$kasakar=$sorgu-> fetchAll(PDO::FETCH_OBJ);


?>
<!DOCTYPE html>
<html lang="tr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kasa Kar Uygulaması </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">Kasa Kar Uygulaması</a>
       <div class="ml-1 mr-5"><img src="img/logo.png" height="70px" width="120px"></div>
      <a class="navbar-brand" href="urunekle.php">Ürün Ekle</a>
      <a class="navbar-brand" href="satislar.php">Satış Yap</a>
      
    </div>

  </nav>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------->

<div class="d-flex bd-highlight mb-3 mt-4">
  <div class="mr-auto pl-5"></div>
  <div >
    <center><h1><i>ÜRÜN LİSTESİ</i></h1></center> <br>

  <table class="table table-dark">

            <tr>
             
              <td><b>Ürün Numarası</b></td>
             <td><b>Ürün Adı</b></td>
             <td><b>Alış Fiyatı</b></td>
             <td><b>Satış Fiyatı</b></td>
             <td><b>Adet</b></td>
             <td></td>
             <td></td>

             </tr>
             
             <?php
             foreach($kasakar  as $kasa){?>
             
                <tr>
                
                <td><?= $kasa->urun_no ?></td>
                <td><?= $kasa->urun_adi ?></td>
                <td><?= $kasa->alinan_fiyat."₺" ?></td>
                <td><?= $kasa->satilan_fiyat."₺" ?></td>
                <td><?= $kasa->adet ?></td>
                <td><a href="stoksil.php?id=<?= $kasa->id ?> " class="btn btn-danger">Sil</a></td>
                <td><a href="guncelle.php?id=<?= $kasa->id ?> " class="btn btn-secondary">Güncelle</a></td>
                </tr>
                 
             <?php } ?><!--- foreach döngüsünün kapama süslüsü ------>
 
            </table>  
           

</div>

<div class="mr-auto pr-5"></div>

</div><!---Genel Div İlk divin kapatması--->
















<!------------------------------------------------------------------------------------------------------------------------------------------------------------->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
