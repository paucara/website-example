async function buscarItems(){

    let src = document.getElementById("productos").firstChild.firstChild.firstChild.src;
    let genero = 'M';
    let img = 'hombre';

    console.log(src);
    if(src.includes("hombre")){
        genero = 'M';
        img = 'hombre';
    }else if(src.includes("mujer")){
        genero = 'F';
        img = 'mujer';
    }else if(src.includes("kid")){
        genero = 'S'
        img = 'kid';
    }else if(src.includes("girl")){
        genero = 'D'
        img = 'girl';
    }

    let busqueda = document.getElementById("buscar").previousSibling.value;

    const response = await fetch(`/gardenshop/assets/php/consulta-buscar.php?buscar=${busqueda}&genero=${genero}`);
    const productos = await response.json();
    let productosHtml = '';
    for (let producto of productos) {
        let aux = '<div id='+producto.id+' class="col mb-5 efectoItem"><div class="card h-100"><img class="enlace-item card-img-top cursor-poiter-active" src="assets/img/'+img+'/'+producto.imagen+'" alt="..." /><div class="card-body"><div class="text-center"><h5 class="fw-bolder">'+producto.nombre+'</h5>'+producto.precio+'</div></div><div class="card-footer p-4 pt-0 border-top-0 bg-transparent"><div class="text-center"><button class="boton-carrito btn btn-outline-dark mt-auto">Añadir al carrito</button></div></div></div></div>'
        productosHtml += aux
    }

    var padre = document.getElementById("productos");
    while (padre.firstChild) {
        padre.removeChild(padre.firstChild);
    }

    document.getElementById("productos").innerHTML = productosHtml;

    // Obtiene una lista de todos los elementos con la clase "enlace"
    var enlace = document.querySelectorAll('.enlace-item');

    // Itera a través de la lista de enlaces y agrega un manejador de eventos a cada uno
    enlace.forEach(function(e){
        e.addEventListener('click',cargarItem);
    }); 

    var enlaceCarrito = document.querySelectorAll('.boton-carrito');

    // Itera a través de la lista de enlaces y agrega un manejador de eventos a cada uno
    enlaceCarrito.forEach(function(e){
        e.addEventListener('click',agregarCarrito);
    }); 
}