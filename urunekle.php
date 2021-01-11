<?php include 'baglan.php'; ?>
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
  <div class="ml-auto mr-auto ">
    <center><h1><i>ÜRÜN EKLE</i></h1></center> <br>
     <form method="post" style="margin-top: 15px; position:absolute; text-align:right;">
    ÜRÜN NUMARASI :&nbsp;&nbsp; <input type="text" class="form-control-sm ml-4" name="urun_no"><br><br>
    ÜRÜN ADI :&nbsp;&nbsp; <input type="text" class="form-control-sm ml-4" name="urun_adi"><br><br>
    ALIŞ FİYATI :&nbsp;&nbsp; <input type="number" class="form-control-sm ml-4" name="alinan_fiyat"><br><br>
    SATIŞ FİYATI :&nbsp;&nbsp; <input type="number" class="form-control-sm ml-4" name="satilan_fiyat"><br><br>
     ADET :&nbsp;&nbsp; <input type="number" class="form-control-sm ml-4" name="adet"><br><br>
    <center><input type="submit" class="btn btn-outline-success" value="Ürün Ekle" name="ekle"></center>


    <?php 
    if (isset($_POST['ekle'])) {
      
    
    $query = $db->prepare("INSERT INTO urunler SET
urun_no = ?,
urun_adi = ?,
alinan_fiyat = ?,
satilan_fiyat=?,
adet=?");
$insert = $query->execute(array(
     $_POST['urun_no'],
     $_POST['urun_adi'],
     $_POST['alinan_fiyat'],
     $_POST['satilan_fiyat'],
     $_POST['adet']
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    header("Location:index.php");
}
}// if isset süslüsü

     ?>
  </form>
   
</div>
<div class="mr-auto pr-5">
</div>

</div><!---Genel Div İlk divin kapatması--->

















<!------------------------------------------------------------------------------------------------------------------------------------------------------------->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
