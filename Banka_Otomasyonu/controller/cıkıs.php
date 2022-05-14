<?php
require "../controller/db.php";
$id=$_SESSION["id"];
$NAME=$_SESSION["name"];
echo "<script LANGUAGE='JavaScript'>
window.alert('CIKIS YAPILDI');
window.location.href='http://127.0.0.1/Banka_Otomasyonu/login.php'; 
</script>";
$log = new Log();
$log->add("CIKIS YAPILIYOR"." ".$NAME,$id);
?>