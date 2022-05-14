<?php
session_start();
if (isset($_SESSION["s"])) {

}
else{
    $_SESSION["s"]=3;
}

$mysqlsunucu = "127.0.0.1";
$mysqlkullanici = "root";
$mysqlsifre = "";
try {
    $conn = new PDO("mysql:host=$mysqlsunucu;dbname=banka_otomasyonu;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)
    {
        echo "Hataaaaaaaaaaa ".$e;
    }
?>
<?php
date_default_timezone_set('Europe/Istanbul');
 
 class Log
 {
     public function add($text,$id)
     {
         
         $data = date("d.m.Y") . " " . date("H:i:s") . " " . $text . PHP_EOL;
         
         
  
         
  
         $ofile = fopen("log$id.log", "a");
  
         fwrite($ofile, $data);
 
         fclose($ofile);
     }
 }
?>

 
