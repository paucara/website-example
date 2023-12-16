function ocultar() {
    var item = document.getElementById('item');
    item.style.display = 'none';
}

document.querySelector('#button-close').addEventListener("click",ocultar);