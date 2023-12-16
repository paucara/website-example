async function cargar() {
    const response = await fetch('/gardenshop/assets/php/consulta-niña.php');
    const productos = await response.json();
    let productosHtml = '';
    for (let producto of productos) {
        let aux = '<div id='+producto.id+' class="col mb-5 efectoItem"><div class="card h-100"><img class="enlace-item card-img-top cursor-poiter-active" src="assets/img/girl/'+producto.imagen+'" alt="..." /><div class="card-body"><div class="text-center"><h5 class="fw-bolder">'+producto.nombre+'</h5>'+producto.precio+'</div></div><div class="card-footer p-4 pt-0 border-top-0 bg-transparent"><div class="text-center"><button class="boton-carrito btn btn-outline-dark mt-auto">Añadir al carrito</button></div></div></div></div>'
        productosHtml += aux
    }

    var padre = document.getElementById("productos");
    while (padre.firstChild) {
        padre.removeChild(padre.firstChild);
    }

    var padre = document.getElementById("buscar-container");
    while (padre.firstChild) {
        padre.removeChild(padre.firstChild);
    }

    //AGREGA EL BOTON BUSCAR
    let buscar = '<div id="buscar-con" class="container my-3"><div class="row d-flex justify-content-start"><div class="col-md-6"><div class="card"><div class="input-box"><input type="text" id="buscar-form" class="form-control"><i id="buscar" class="fa fa-search"></i></div></div></div></div></div>'
        
    document.getElementById("buscar-container").innerHTML = buscar;

    document.getElementById("productos").innerHTML = productosHtml;


    // Obtiene una lista de todos los elementos con la clase "enlace"
    var enlaces = document.querySelectorAll('.enlace-item');

    // Itera a través de la lista de enlaces y agrega un manejador de eventos a cada uno
    enlaces.forEach(function(e){
        e.addEventListener('click',cargarItem);
    }); 

    var enlaces2 = document.querySelectorAll('.boton-carrito');

    // Itera a través de la lista de enlaces y agrega un manejador de eventos a cada uno
    enlaces2.forEach(function(e){
        e.addEventListener('click',agregarCarrito);
    }); 

    document.getElementById("buscar").addEventListener("click",buscarItems);
    document.getElementById("buscar-form").addEventListener("keyup", function(event) {
        // Verifica si la tecla presionada es "Enter" (código 13)
        if (event.keyCode === 13) {
          // Llama a tu función buscarItems()
          buscarItems();
        }
      });

}

document.getElementById("boton-niña").addEventListener("click",cargar);

