
let count=50;
function tarihSaat() {
    let date = new Date().toLocaleString(); // tarih saati al
    document.querySelector(".title").innerHTML = date; // zaman id'li elemente yazdır
}setInterval(tarihSaat, 1000); 

function timer(){
    count>0?count--:
    document.querySelector(".btns").innerHTML =count ; /* süre dolunca buton basamama */


if (count==0) {
    $(':input[type="submit"]').prop('disabled', true);


}

}setInterval(timer, 1000); 








