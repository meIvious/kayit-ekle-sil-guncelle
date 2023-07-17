 <?php 

if ($_GET) 
{

include("vt.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($baglanti->query("DELETE FROM veriler WHERE id =".(int)$_GET['id'])) 
{

    header("location:index.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.

}
}

?>