<?php 
include("vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

<!DOCTYPE html>
<html>
<head>
<style>
#bekoli{
    overflow:scroll;
    }

</style>
<link rel="shortcut icon" type="image/png" href="fb.jpg"/>
<title>Kayıt Ekle-Sil-Güncelle</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
</br>
<h1 class="text-primary text-uppercase text-center"> PHP ÖDEVİ</h1>
<div align="center"  clas="d-flex justify-content-end"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
  Kayıt Penceresini Aç
  <th>
  
  </th>
</button></div>
</br>
<center><h2 style="color:#cd0000; ">Kayıtlar</h2></center>
<hr width="100%" color="#cd0000" >
<h5 align="center">
<?php 

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.

    // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    $ad = $_POST['ad']; 
    $soyad = $_POST['soyad'];
	$sinif = $_POST['sinif'];
	$numara = $_POST['numara'];

    if ($ad<>"" && $soyad<>"" && $sinif<>""  && $numara<>""  ) { 
    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. Başka kontrollerde yapabilirsiniz.
        
         // Veri ekleme sorgumuzu yazıyoruz.
        if ($baglanti->query("INSERT INTO veriler (ad,soyad,sinif,numara) VALUES ('$ad','$soyad','$sinif','$numara')")) 
        {
               echo '<div class="alert alert-success mt-5">
            Kayıt Başarıyla Eklendi.</div>'; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
        }
        else
        {
            echo '<div class="alert alert-danger mt-5">
            Hata Oluştu.</div>';;
        }

    }

}

?>
</h5>
<div id="records_contant"> </div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
       <h4  class="modal-title">Kayıt Penceresi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="container">

<form action="" method="post">
    
        <tr>
            <td>Ad</td>
            <td><input type="text" name="ad" class="form-control" required></td>
        </tr>

        <tr>
            <td>Soyad</td>
            <td><input type="text" name="soyad" class="form-control" required ></td>
        </tr>
		<tr>
           <tr>
            <td>Sınıf</td>
            <td><input type="text" name="sinif"  pattern="\d*" class="form-control" required></td>
        </tr>
		<tr>
		 <tr>
            <td>Numara</td>
            <td><input type="number" min="0"  name="numara" class="form-control" required></td>
        </tr>
		<tr>
		</br>
            <td></td>
           <center><input type="submit"  value="Ekle" class="btn btn-success">
		   </br>
        </tr>

  </br>

</form>
     
	
    </div>
  </div>
</div>

</div>


  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  
<script type="text/javascript">

</script>
<table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>#id</th>
        <th>Ad</th>
        <th>Soyad</th>
		<th>Sınıf</th>
		<th>Numara</th>
		<th>Yönet</th>
		<th>Sil</th>
      </tr>
	  <!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->
<?php 

$sorgu = $baglanti->query("SELECT * FROM veriler"); // kayit tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$ad = $sonuc['ad'];
$soyad = $sonuc['soyad'];
$sinif = $sonuc['sinif'];
$numara = $sonuc['numara'];


// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
?>
    
    <tr>
        <td><?php echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?>.</td>
        <td><?php echo $ad; ?></td>
        <td><?php echo $soyad; ?></td>
		<td><?php echo $sinif; ?></td>
		<td><?php echo $numara; ?></td>
        <td><a href="duzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Güncelle</a></td>
        <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger" onclick="sil()">Sil</a></td>
    </tr>

<?php 
} 
// Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. 
?>
    
  </table>
  <hr width="100%" color="#cd0000" >
  </br>
  <footer><center>
  Berkay KURU | 2018 - ÇOMÜ ®
  </footer></center>
</body>
</html>