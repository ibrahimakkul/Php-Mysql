var eft = document.getElementById("eftt");

eft.onclick = function () {
  var dt = new Date(); // DATE() ile yeni bir tarih nesnesi oluşturuldu.
  var saat = dt.getHours();
  var gunler = [
    "Pazar",
    "Pazartesi",
    "Salı",
    "Çarşamba",
    "Perşembe",
    "Cuma",
    "Cumartesi",
  ];

  if (saat > 8 && saat < 18) {
    if (
      gunler[dt.getDay()] == "Pazartesi" ||
      gunler[dt.getDay()] == "Salı" ||
      gunler[dt.getDay()] == "Çarşamba" ||
      gunler[dt.getDay()] == "Perşembe" ||
      gunler[dt.getDay()] == "Cuma"
    ) {
      return true;
    } else {
      alert("HAFTA İÇİ DEGİL");
      return false;
    }
  }
  alert("SAAT 9 VE 17 ARALİKLARİNDA İŞLEM YAPILABİLİR");
  return false;
};
