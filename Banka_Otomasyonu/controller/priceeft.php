<?php
require "db.php";
$nakit = $_POST['price'];
$para = $_SESSION['para'];
$id = $_SESSION['id'];
$receiver = $_POST['ID'];

$sorgu = $conn->query("SELECT * FROM user WHERE id=$id");
$cikti = $sorgu->fetchObject();
$bankadi3 = $cikti->BankaAdi;
$sorgu = $conn->query("SELECT * FROM  user  Where id =$receiver  ");
$cikti = $sorgu->fetchObject();
$bankadi2 = $cikti->BankaAdi;
/*Alıcın  kıspğaının hesabı */
$sorgu = $conn->query("SELECT price FROM  userdetail   WHERE  user_id = $receiver ");
$cikti = $sorgu->fetchObject();
$para -= $nakit;

try {
	if ($cikti->price + $nakit < 6000 && $para > 0 && $nakit % 5 == 0 && $id != $receiver) {
		if (($bankadi3 == $bankadi2)) {
			$cikti->price += $nakit;
			$yenks = $cikti->price;

			$sorgu = $conn->query("UPDATE userdetail SET price = $yenks WHERE user_id = $receiver");



			$sorgu = $conn->query("SELECT price FROM  userdetail  WHERE user_id = $id");
			$cikti = $sorgu->fetchObject();
			$cikti->price -= $nakit;
			$sorgu = $conn->query("UPDATE userdetail SET price = $cikti->price WHERE user_id = $id");


			$log = new Log();
			echo "<script LANGUAGE='JavaScript'>
window.alert('PARA YATIRMA BAŞARILI');  
window.location.href='http://bankaotomasyonu.lovestoblog.com/view/priceeftview.php?q='; 
</script>";
			$log->add("PARA HAVALE" . " -" . $nakit . " " . "GONDERILDI" . " " . "HESAP NOSU " . $_POST['ID'] . " " . "HESABIN YENI PARA" . " " . $para . " " . "GONDERILEN KISININ PARASI =" . $yenks, $id);
		} else {
			echo "<script LANGUAGE='JavaScript'>
            window.alert('Böyle bir kullanıcı yok');  
            window.location.href='http://bankaotomasyonu.lovestoblog.com/view/priceeftview.php?q='; 
            </script>";
		}
	}
	if ($para < 0) {
		echo "<script LANGUAGE='JavaScript'>
window.alert('PARA MİKTARI YETERSİZ');  
window.location.href='http://bankaotomasyonu.lovestoblog.com/view/priceeftview.php'; 
</script>";
	}
	if ($nakit % 5 != 0) {
		echo "<script LANGUAGE='JavaScript'>
window.alert('PARA 5 İN KATI OLMALI');  
window.location.href='http://bankaotomasyonu.lovestoblog.com/view/priceeftview.php'; 
</script>";
	}
	if ($cikti->price + $nakit > 6000) {
		echo "<script LANGUAGE='JavaScript'>
window.alert('ALICININ PARASI 6000 BİNDEN YÜKSEK OLAMAZ');  
window.location.href='http://bankaotomasyonu.lovestoblog.com/view/priceeftview.php'; 
</script>";
	}
	if ($id == $receiver) {
		echo "<script LANGUAGE='JavaScript'>
window.alert('KENDİ KENDİNE PARA YOLLAMA');  
window.location.href='http://bankaotomasyonu.lovestoblog.com/view/priceeftview.php'; 
</script>";
	}
} catch (Error $e) {
	echo "bağlantıda hata oluştu" . $e;
}
