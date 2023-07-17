<?php 
include("vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href="fb.jpg"/>
<title>Güncelle</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
<?php 

$sorgu = $baglanti->query("SELECT * FROM veriler WHERE id =".(int)$_GET['id']); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu

$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

?>
<div class="container">
</br>
<h1 class="text-primary text-uppercase text-center"> PHP ÖDEVİ</h1>
<div align="center"  clas="d-flex justify-content-end"><a href="index.php"<button type="button" class="btn btn-info" >
Geri Dön
  <th></a>
  </th>
</button></div>
</br>
<form action="" method="post">
       <tr>
            <td>Ad</td>
            <td><input type="text" name="ad" class="form-control" value="<?php echo $sonuc['ad']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"required></td>
        </tr>

        <tr>
            <td>Soyad</td>
            <td><input type="text" name="soyad" class="form-control" value="<?php echo $sonuc['soyad']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"required></td>
        </tr>
		<tr>
           <tr>
            <td>Sınıf</td>
            <td><input type="text"  pattern="\d*" name="sinif" class="form-control" value="<?php echo $sonuc['sinif']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>" required></td>
        </tr>
		<tr>
		 <tr>
            <td>Numara</td>
            <td><input type="number" name="numara"   class="form-control" value="<?php echo $sonuc['numara']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>"required ></td>
        </tr>
		</br>
		<tr>
            <td></td>
            <center><td><input type="submit" class="btn btn-success" value="Güncelle"></td></center>
        </tr>
      </br>
           </form >  
    </div>
  </div>
</div>

</div>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  
<script type="text/javascript">

</script>
<table class="table table-bordered table-striped ">
    <thead>
      <tr>
        <th>#id</th>
        <th>Ad</th>
        <th>Soyad</th>
		<th>Sınıf</th>
		<th>Numara</th>
    	<th>Sil</th>
      </tr>
	  <?php 

$sorgu = $baglanti->query("SELECT * FROM veriler"); // Makale tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$id = $sonuc['id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$ad = $sonuc['ad'];
$soyad = $sonuc['soyad'];
$sinif = $sonuc['sinif'];
$numara = $sonuc['numara'];


// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
?>
    
    <tr>
        <td><?php echo $id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
        <td><?php echo $ad; ?></td>
        <td><?php echo $soyad; ?></td>
		<td><?php echo $sinif; ?></td>
		<td><?php echo $numara; ?></td>
    <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger" onclick="sil()">Sil</a></td>
    </tr>

<?php 
} 
// Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. 
?>
	  <!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

    </thead>
    <tbody>
    
    </tbody>
  </table>
  <?php 

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
    
    $ad = $_POST['ad']; // Post edilen değerleri değişkenlere aktarıyoruz
    $soyad = $_POST['soyad'];
    $sinif = $_POST['sinif'];
    $numara = $_POST['numara'];

    if ($ad<>"" && $soyad<>"" && $sinif<>"" && $numara<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($baglanti->query("UPDATE veriler SET ad = '$ad', soyad = '$soyad', sinif = '$sinif', numara = '$numara' WHERE id =".$_GET['id'])) 
        {
            header("location:index.php"); 
            // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
        }
        else
        {
            echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }
}
?>

</body>
</html>