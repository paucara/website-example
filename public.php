<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Gardenshop</title>
      <!-- Bootstrap icons-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <!-- Core theme CSS (includes Bootstrap)-->
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/bootstrap.css">
   </head>
   <body>
      <!-- Item-->
      <div id="item" class="modal">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button id="button-close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <section class="py-2">
                     <div class="container px-4 px-lg-5 my-2">
                        <div class="row gx-4 gx-lg-5 align-items-center">
                           <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="" alt="..." /></div>
                           <div id="" class="col-md-6">
                              <p class="display-5 fw-bolder">Remera roja</p>
                              <div class="fs-5 mb-2">
                                 <span>$40.00</span>
                              </div>
                              <p class="lead">Lorem minima ea iste laborum vero?</p>
                              <div class="d-flex">
                                 <button id="boton-carrito-1" class="btn btn-outline-dark mt-auto">Añadir al carrito</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </div>
      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#!">Gardenshop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                  <li class="nav-item"><a class="nav-link" href="register.php">Registrarse</a></li>
                  <li class="nav-item"><a class="nav-link" href="login.php">Iniciar Sesion</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- Carousel-->
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img src="assets/img/cat1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="assets/img/cat2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
               <img src="assets/img/cat3.png" class="d-block w-100" alt="...">
            </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
         </button>
      </div>
      <!-- Categories-->  
      <div class="card-group my-4">
         <div class="card bg-light">
            <div class="card-body ">
               <h5 id="boton-hombre" class="card-title text-center cursor-poiter-active">Hombres</h5>
            </div>
         </div>
         <div class="card bg-light">
            <div class="card-body">
               <h5 id="boton-mujer" class="card-title text-center cursor-poiter-active">Mujeres</h5>
            </div>
         </div>
         <div class="card bg-light">
            <div class="card-body ">
               <h5 id="boton-niño" class="card-title text-center cursor-poiter-active">Niños</h5>
            </div>
         </div>
         <div class="card bg-light">
            <div class="card-body ">
               <h5 id="boton-niña" class="card-title text-center cursor-poiter-active">Niñas</h5>
            </div>
         </div>
      </div>
      <!-- Search-->
      
      <!-- Section-->
      <section>
         <div id="cuerpo" class="container">
            <div id="productos" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"></div>
         </div>
      </section>
      <!-- Footer-->
      <footer class="py-5 bg-dark">
         <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Gardenshop 2023</p>
         </div>
      </footer>
      <!-- Bootstrap core JS-->
      <script src="assets/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
