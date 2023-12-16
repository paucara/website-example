async function cargarItem(e) {
    var id = e.target.parentNode.parentNode.id;
    var consulta = `/gardenshop/assets/php/consulta-item.php?id=${id}`;
    const response = await fetch(consulta);
    const datos = await response.json();
    var item = document.getElementById('item');
    item.style.display = 'block';
    var itemDiv = item.firstElementChild.firstElementChild.children[1].firstElementChild.firstElementChild.firstElementChild;
    if(datos.tipo=='M'){
        itemDiv.firstElementChild.firstElementChild.src = `assets/img/hombre/${datos.imagen}`;
    }else if(datos.tipo=='F'){
        itemDiv.firstElementChild.firstElementChild.src = `assets/img/mujer/${datos.imagen}`;
    }else if(datos.tipo=='S'){
        itemDiv.firstElementChild.firstElementChild.src = `assets/img/kid/${datos.imagen}`;
    }else if(datos.tipo=='D'){
        itemDiv.firstElementChild.firstElementChild.src = `assets/img/girl/${datos.imagen}`;
    }
    itemDiv.children[1].id = datos.id;
    itemDiv.children[1].firstElementChild.textContent = datos.nombre;
    itemDiv.children[1].children[1].firstElementChild.textContent = `$${datos.precio}`;
    itemDiv.children[1].children[2].textContent = "Talles disponibles: "+ datos.talle;
    document.querySelector('#boton-carrito-1').addEventListener("click",agregarCarrito);
} 

async function cargarItemDestacado(e) {
    var id = e.target.parentNode.id;
    var consulta = `/gardenshop/assets/php/consulta-item.php?id=${id}`;
    const response = await fetch(consulta);
    const datos = await response.json();
    var item = document.getElementById('item');
    item.style.display = 'block';
    var itemDiv = item.firstElementChild.firstElementChild.children[1].firstElementChild.firstElementChild.firstElementChild;
    if(datos.tipo=='M'){
        itemDiv.firstElementChild.firstElementChild.src = `assets/img/hombre/${datos.imagen}`;
    }else if(datos.tipo=='F'){
        itemDiv.firstElementChild.firstElementChild.src = `assets/img/mujer/${datos.imagen}`;
    }else if(datos.tipo=='S'){
        itemDiv.firstElementChild.firstElementChild.src = `assets/img/kid/${datos.imagen}`;
    }else if(datos.tipo=='D'){
        itemDiv.firstElementChild.firstElementChild.src = `assets/img/girl/${datos.imagen}`;
    }
    itemDiv.children[1].id = datos.id;
    itemDiv.children[1].firstElementChild.textContent = datos.nombre;
    itemDiv.children[1].children[1].firstElementChild.textContent = `$${datos.precio}`;
    itemDiv.children[1].children[2].textContent = "Talles disponibles: "+ datos.talle;
    document.querySelector('#boton-carrito-1').addEventListener("click",agregarCarrito);
} 