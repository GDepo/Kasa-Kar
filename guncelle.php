<?php include 'baglan.php'; 

             $urunid= $_GET["id"];
             $sorgu=$db ->prepare("SELECT * FROM urunler Where id=:urunid");
             $sorgu->execute(array(":urunid" => $urunid));
             $row = $sorgu -> fetch(PDO::FETCH_ASSOC);
              

            

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
  <div class="">
    <center><h3><i>ÜRÜN GÜNCELLE</i></h3></center> <br>
  
<form action="update.php" method="post" style="text-align: right;">
  ID : <input type="text" class="ml-5" value="<?php  echo $row['id']; ?>" name="id"></font><br><br>
  ÜRÜN NO : <input type="text" class="ml-1" value="<?php  echo $row['urun_no']; ?>" name="u_no"><br><br>
  ÜRÜN ADI : <input type="text" class="ml-3" value="<?php  echo $row['urun_adi']; ?>" name="uadi" ><br><br>
  ALIŞ FİYATI : <input type="number" class="ml-3" value="<?php  echo $row['alinan_fiyat']; ?>" name="alisfiyat"><br><br>
  SATIŞ FİYATI : <input type="number" class="ml-3" value="<?php  echo $row['satilan_fiyat']; ?>" name="satisfiyat"><br><br>
  ADET : <input type="text" class="ml-3" value="<?php  echo $row['adet']; ?>" name="adet"><br><br>
 <center> <input type="submit" class="btn btn-danger btn-sm" value="Güncelle" name="guncel"></center>
</form>


</div>

<div class="mr-auto pr-5"></div>

</div><!---Genel Div İlk divin kapatması--->



<!------------------------------------------------------------------------------------------------------------------------------------------------------------->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
