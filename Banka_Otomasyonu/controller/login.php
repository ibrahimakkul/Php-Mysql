<?php 
require "db.php";


$name=$_POST["name"];
$pass=$_POST["password"];

$bollean=true;
$sorgu = $conn->query("SELECT * FROM user" );
$cikti = $sorgu-> fetchAll();
foreach( $cikti as $row ) {
    
    if ($name == $row['name']  && $pass ==  $row['password']) {
      
     
       
        $_SESSION["id"]=$row['id'];
        $bollean=true;
        $_SESSION["name"]=$row["name"];
        header("Location:http://127.0.0.1/Banka_Otomasyonu/view/test.php"); 
        $log = new Log();
        $log->add("GIRIS BASARILI"." ".$_POST["name"], $_SESSION["id"]);
        break;
    }
    
    
     else if($name=="" or $pass=="") { echo "<script LANGUAGE='JavaScript'>
window.alert('BOŞ BIRAKMAYINIZ');
window.location.href='http://127.0.0.1/Banka_Otomasyonu/login.php'; 
</script>";
 }

 else if($name != $row['name']  && $pass !=  $row['password']) {
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Kullanıcı Adı veya Şifre Yanlış');
    window.location.href='http://127.0.0.1/Banka_Otomasyonu/login.php'; 
    </script>";
    $_SESSION["s"]--;
    break;
    
    
}
    }
