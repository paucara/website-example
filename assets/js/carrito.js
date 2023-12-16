async function agregarCarrito(e) {
    var id = e.target.parentNode.parentNode.parentNode.parentNode.id;
    if(!id){
        id = e.target.parentNode.parentNode.id;
    }
    var consulta = `/gardenshop/assets/php/consulta-item.php?id=${id}`;
    const response = await fetch(consulta);
    const datos = await response.json();

    var carrito_items = document.querySelector('#carrito-items');
    var itemHtml = '<li id="'+datos.id+'" class="dropdown-item">'+datos.nombre+'<button type="button" class="carrito-item-close btn-close" data-bs-dismiss="modal" aria-label="Close"></button></li>'
    carrito_items.innerHTML= carrito_items.innerHTML + itemHtml;
    var carrito_contador = document.querySelector('#carrito-contador');
    carrito_contador.textContent++;

    document.querySelector('#total').textContent = parseInt(document.querySelector('#total').textContent) + parseInt(datos.precio);

    var items = document.querySelectorAll('.carrito-item-close');

    // Itera a través de la lista de enlaces y agrega un manejador de eventos a cada uno
    items.forEach(function(e){
        e.addEventListener('click',eliminarItem);
    }); 

    //Envio el total del pago a otra pagina
    document.querySelector('#enlace-pago').href =`pago.php?total=${ document.querySelector('#total').textContent}`;
}

async function eliminarItem(e){
    e.target.parentElement.remove()
    var carrito_contador = document.querySelector('#carrito-contador');
    carrito_contador.textContent--;

    var consulta = `/gardenshop/assets/php/consulta-item.php?id=${e.target.parentElement.id}`;
    const response = await fetch(consulta);
    const datos = await response.json();
   document.querySelector('#total').textContent = parseInt(document.querySelector('#total').textContent) - parseInt(datos.precio);

   if(!(document.querySelector('#total').textContent == "0")){
        document.querySelector('#enlace-pago').href = `pago.php?total=${ document.querySelector('#total').textContent}`;
   }else{
    document.querySelector('#enlace-pago').href = ``;
   }
   
}