<?php
require "db.php";
$nakit = $_POST['price'];
$id = $_SESSION['id'];
$sorgu = $conn->query("SELECT price FROM  userdetail  WHERE user_id = $id");
$cikti = $sorgu->fetchObject();
$para = $_SESSION['para'];
$toplam = $cikti->price;



try {
    if ($toplam >= $nakit && $nakit % 5 == 0) {
        $toplam -= $nakit;
        $para -= $nakit;
        $sorgu = $conn->query("UPDATE userdetail SET price = $toplam WHERE user_id = $id");

        echo "<script LANGUAGE='JavaScript'>
        window.alert('PARA CEKME İSLEMİ BASARILI');
        window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/pricepullview.php'; 
        </script>";
        $log = new Log();
        $log->add("PARA CEKME ISLEMI" . "= -" . $nakit . " " . "YENI PARA" . " =" . $para, $id);
    } elseif ($nakit % 5 != 0) {
        echo "<script LANGUAGE='JavaScript'>
    window.alert('PARA 5 İN KATI OLMALI');
    window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/pricepullview.php'; 
    </script>";
    } else {
        echo "<script LANGUAGE='JavaScript'>
    window.alert('PARA CEKME İSLEMİ BASARISIZ');
    window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/pricepullview.php'; 
    </script>";
    }
} catch (error) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('HATALI İŞLEM VEYA BOŞ GİRDİNİZ');
    window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/pricepullview.php'; 
    </script>";
}
