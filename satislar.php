<?php include 'baglan.php'; ?>
<!DOCTYPE html>
<html lang="en">

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
<br><br><br>
<div class="d-flex bd-highlight mb-3 mt-4">

  <div class="ml-auto mr-auto ">
    <hr>
    <h4>SATIŞ EKRANI </h4>
<form method="post" class="mt-5" >
  <select class="form-control form-control-sm" name="urun_no">

    <option value="" disabled selected hidden>Lütfen Ürün Seçiniz !!!</option>
<optgroup label="Ürünler"></optgroup>

    <?php 
    $query = $db->query("SELECT * FROM urunler", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
     foreach( $query as $row ){
          print "<option value='".$row['urun_no']."'>".$row['urun_adi']."</option> ";
     }
} ?>
  </select><br><br>

  <input type="number" placeholder="Adet Giriniz" name="adet" required><br><br>
  <center><input type="submit" class="btn btn-outline-success" name="sat" value="Satış Yap"></center>

<?php 
if (isset($_POST['sat'])) {
  $urun_no = $_POST['urun_no'];
  $adet = $_POST['adet'];
//adet post edilen sayımız : ade veri tabanında ki adete verdiğim değişken
$query2 = $db->query("SELECT alinan_fiyat,satilan_fiyat,adet FROM urunler WHERE urun_no = '{$urun_no}'")->fetch(PDO::FETCH_ASSOC);
if ( $query2 ){

    $alisfiyati=$query2['alinan_fiyat'];
    $satisfiyati = $query2['satilan_fiyat'];
    $adetvt=$query2['adet'];
    $kalan = $adetvt-$adet;
    if ($kalan<0) {
      echo "<br>Elinizde ki Stok Yetersiz";
    }
    else{
      $kar=($satisfiyati-$alisfiyati)*$adet;// kar hesaplatıldı.
      /* Bu kodda satış butonuna basıldıktan sonra seçilen ürünün satılması işlemi sağlandı. */
      $satiskomutu = $db->prepare("INSERT INTO satislar SET
urunno = ?,
adet = ?,
kar = ?");
$insert = $satiskomutu->execute(array(
     $urun_no,
     $adet,
     $kar
));
if ( $insert ){
    $last_id = $db->lastInsertId();
    print "Satış İşlemi Başarılı";

    $guncelle = $db->prepare("UPDATE urunler SET
adet = :yeni_adet
WHERE urun_no = :urun_no");
$update = $guncelle->execute(array(
     "yeni_adet" => $kalan,
     "urun_no"=> $urun_no

));
}


      
    }//else nin kapatılış süslüsü

}//if(query2 nin süslüsü)

}//ilk if issetin süslüsü
 ?><hr>
</form>
<br><br>

</div>

<div class="mr-auto pr-5"><!---Sağ divin Başlangıcı--->
  <form  method="post">  
 <table class="table">
  <thead  class="thead-dark">

    <tr>
      <th scope="col">Ürün Numarası</th>
      <th scope="col">Adet</th>
      <th scope="col">Kar</th>
    </tr>

    <tr>
       <?php 
              $toplamkar=0;
                  /* Tablonun içerisine veri tabanında ki verileri listelettik */ 
                $query4 = $db->query("SELECT * FROM satislar", PDO::FETCH_ASSOC);
               if ( $query4->rowCount() ){
               foreach( $query4 as $row ){
               print "<tr><td>".$row['urunno']."</td><td>".$row['adet']."</td><td>".$row['kar']." "."₺"."</td></tr>";
                $toplamkar+=$row['kar'];
     }
}

                   ?>
    </tr>
<tr>
  <td>Toplam Kar</td>
  <td></td>
  <td><?php echo $toplamkar." ₺" ?></td>
</tr>
  </thead>
  <tbody>
    
  </tbody>
</table>
<center>  <input type="submit" class="btn btn-outline-danger" name="verisil" value="Kar listesini Temizle" ></center>
<?php   

if (isset($_POST['verisil'])) {
  $sil = $db->exec("DELETE FROM satislar");
    header("Location:satislar.php");
}

 ?>

</form>
</div>

</div><!---Genel Div İlk divin kapatması--->

















<!------------------------------------------------------------------------------------------------------------------------------------------------------------->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
