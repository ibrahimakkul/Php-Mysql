 <?php
require "db.php";

$nakit =$_POST['price'];
$id=$_SESSION['id'];

$sorgu = $conn->query("SELECT price FROM  userdetail  WHERE user_id = $id");
$cikti = $sorgu->fetchObject();


try{
if ($nakit%5==0) {
    $price=$cikti->price;
    $toplam=$price+$nakit;
    if($toplam <=6000){
     echo "<script LANGUAGE='JavaScript'>
     window.alert('PARA YATIRMA İSLEMİ BASARILI');
    window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/priceaddview.php'; 
     </script>";
     $nakit+=$price;
     $sorgu = $conn->query("UPDATE userdetail SET price =$nakit  WHERE user_id = $id");
     $log = new Log();
     $log->add("PARA YATIRMA ISLEMI BASARILI"."= +".$_POST['price']." ="."YENI PARA"." ".$nakit,$id);
        
    } else{
        echo "<script LANGUAGE='JavaScript'>
        window.alert('PARA MİKTARI 6000 DEN BÜYÜK OLAMAZ');
        window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/priceaddview.php'; 
        </script>";
    }

}
elseif($nakit%5 !=0){
    echo "<script LANGUAGE='JavaScript'>
    window.alert('GİRDİĞİNİZ PARA 5 İN KATI OLMALI');
    window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/priceaddview.php'; 
    </script>";

}
}catch(Error){
    echo "<script LANGUAGE='JavaScript'>
    window.alert('Hatalı işlem veya boş girmeyiniz');
    window.location.href='http://127.0.0.1/Banka_Otomasyonu/view/priceaddview.php'; 
    </script>";
}
?>
