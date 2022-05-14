function togglePassword() {
    var element = document.getElementById('gozz');
    element.type = (element.type == 'password' ? 'text' : 'password');
}
document.getElementById("eyess").addEventListener("click", togglePassword);
/* burası göz sıfre goster gızle kısmı */


var ibo = document.getElementById('exxx'); /* burası kapat btuonu*/

ibo.onclick = function(){
    window.open(window.location, '_self').close();
}









