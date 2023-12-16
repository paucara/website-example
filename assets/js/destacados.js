async function cargarDestacados() {
    const response = await fetch('/gardenshop/assets/php/consulta-destacados.php');
    const productos = await response.json();
    let productosHtml = '';

    let aux = '<div id="'+productos[0].id+'" class="carousel-item active bg-logo"><img src="assets/img/random/'+productos[0].imagen+'" class="d-block mx-auto ajuste"><div class="carousel-caption d-none d-md-block"><h5 class="texto-blanco-con-borde">'+productos[0].nombre+'</h5><h5 class="texto-blanco-con-borde">'+productos[0].precio+'</h5></div></div>'
    productosHtml += aux;

    aux = '<div id="'+productos[1].id+'" class="carousel-item bg-logo"><img src="assets/img/random/'+productos[1].imagen+'" class="d-block mx-auto ajuste" ><div class="carousel-caption d-none d-md-block"><h5 class="texto-blanco-con-borde">'+productos[1].nombre+'</h5><h5 class="texto-blanco-con-borde">'+productos[1].precio+'</h5></div></div>'
    productosHtml += aux;

    aux = '<div id="'+productos[2].id+'" class="carousel-item bg-logo"><img src="assets/img/random/'+productos[2].imagen+'" class="d-block mx-auto ajuste" ><div class="carousel-caption d-none d-md-block"><h5 class="texto-blanco-con-borde">'+productos[2].nombre+'</h5><h5 class="texto-blanco-con-borde">'+productos[2].precio+'</h5></div></div>'
    productosHtml += aux;
    
    document.querySelector("#destacadosContainer").innerHTML = productosHtml;

    let destacados = document.querySelectorAll('.ajuste');
    destacados.forEach(function(e){
        e.addEventListener('click',cargarItemDestacado);
    }); 
}

cargarDestacados();   



