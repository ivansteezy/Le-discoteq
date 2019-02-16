<?php
    session_start();

    $_SESSION['ID_U'] ;
    $_SESSION['Nombre_U'] = $_SESSION['Nombre_U'] ;
    $_SESSION['Direccion_U'] = $_SESSION['Direccion_U'] ;
    $_SESSION['Usuario_U'] = $_SESSION['Usuario_U'] ;
    $_SESSION['Correo_U'] = $_SESSION['Correo_U'] ;
    $_SESSION['Contrasena_U'] = $_SESSION['Contrasena_U'] ;

    if(!$_SESSION['ID_U'])
      $_SESSION['ID_U'] = 0;
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Le Disctec</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/EstiloScroller.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto%7CJosefin+Sans:100,300,400,500" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
  </head>

<body>
    <div class="page-header" style="text-align: center">
      <a href="Index.php" style="text-decoration: none"><h1>Le Discotec</h1></a>
    </div>

    <h4 style="color: black; padding-right: 10px;" align="right";>
                  <?php

                  if( !$_SESSION['Nombre_U'] )
                  {
                    echo "HOLA";
                  }
                  else
                  {
                  echo $_SESSION['Nombre_U'];
                  }
                ?>

                </h4>


      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
            <span class="navbar-toggler-icon"></span>
        </button>

          <div class="collapse navbar-collapse" id="collapse_target">
              <ul class="nav navbar-nav">

                <li class="nav-item dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle = "dropdown">Productos</a>
                    <ul class="dropdown-menu">

                      <li><a href="HipHop.php" style="color: grey">Hip Hop</a></li>
                      <li><a href="Pop.php" style="color: grey">Pop</a></li>
                      <li><a href="Rock.php" style="color: grey">Rock</a></li>
                      <li><a href="Electro.php" style="color: grey">Electro</a></li>
                      <li><a href="Oldies.php" style="color: grey">Oldies</a></li>

                    </ul>
               </li>

                <li class="nav-item">
                  <a href="Mapa.html" class="nav-link">Nosotros</a>
                </li>
                <li class="nav-item">
                  <a href="Login.php" class="nav-link">Login</a>
                </li>
                <li ><a href="Vista_Carro.php" class="nav-link">Carrito</a></li>
              </ul>
          </div>
        </nav>

  <!--Aqui comenzara el bloque de markups para el carousel-->
  <div class="container">
        <div id="Carousel" class="carousel slide" data-ride="carousel">
         <!-- Indicadores -->
         <ol class="carousel-indicators">
           <li data-target="#Carousel" data-slide-to="0" class="active"></li>
           <li data-target="#Carousel" data-slide-to="1"></li>
           <li data-target="#Carousel" data-slide-to="2"></li>
         </ol>

         <!-- Slides -->
         <div class="carousel-inner">
           <div class="item active">
             <img src="Imagenes/rainbows.jpg" style="width:100%;">
             <div class="carousel-caption">
                <h3>In Rainbows</h3>
                <p>Radiohead</p>
             </div>
           </div>

           <div class="item">
             <img src="Imagenes/djshadow.jpg" style="width:100%;">
             <div class="carousel-caption">
                <h3>Endtroducing.....</h3>
                <p>Dj Shadow</p>
             </div>
           </div>

           <div class="item">
             <img src="Imagenes/tame.jpg" style="width:100%;">
             <div class="carousel-caption">
                <h3>Innerspeaker</h3>
                <p>Tame Imapala</p>
             </div>
           </div>
         </div>

          <!-- Left and right controls -->
         <a class="left carousel-control" href="#Carousel" data-slide="prev">
           <span class="glyphicon glyphicon-chevron-left"></span>
           <span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#Carousel" data-slide="next">
           <span class="glyphicon glyphicon-chevron-right"></span>
           <span class="sr-only">Next</span>
         </a>
      </div>
    </div>
  <br><br>
    <!--Secciones del scroller-->
    <section id="showcase">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="showcase-left">
              <img src="img/img4.png">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="showcase-right">
              <h1>Los vinyles más exclusivos, aquí los tenemos.</h1>
              <p>Contamos con un amplio catalogo de vinyles de distintos generos, en caso de no contar con el ¡podemos consegurlo!</p>
            </div>
            <br>
            <a class="btn btn-default btn-lg showcase-btn">Echar un vistazo</a>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonial">
      <div class="container">
        <p>En compras mayores a $2000 ¡el envío es gratis!</p>
      </div>
    </section>

    <section id="info1">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="info-left">
              <img src="img/img2.png" id="Imagen">
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="info-right" id="texto">
              <br><br>
              <h2>También contamos con ediciones especiales.</h2>
              <p>Contamos con una gran cantidad de ediciones especiales, ediciones de coleccionista y ediciones deluxe.</p>
              <br>
            </div>
          </div>
        </div>
      </div>
    </section>
    <hr>

    <section id="info2">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <div class="info-left">
              <h2>Seccion uno</h2>
              <p>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="info-right">
              <h2>Seccion 2</h2>
              <p>Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <p class="text-center">LeDiscotec &copy; 2018</p>
    </footer>

    <script
      src="https://code.jquery.com/jquery-3.2.1.js"
      integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
      crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        window.sr = ScrollReveal();
        sr.reveal('.navbar', {
          duration: 2000,
          origin:'bottom'
        });
        sr.reveal('.showcase-left', {
          duration: 2000,
          origin:'top',
          distance:'300px'
        });
        sr.reveal('.showcase-right', {
          duration: 2000,
          origin:'right',
          distance:'300px'
        });
        sr.reveal('.showcase-btn', {
          duration: 2000,
          delay: 2000,
          origin:'bottom'
        });
        sr.reveal('#testimonial div', {
          duration: 2000,
          origin:'bottom'
        });
        sr.reveal('.info-left', {
          duration: 2000,
          origin:'left',
          distance:'300px',
          viewFactor: 0.2
        });
        sr.reveal('.info-right', {
          duration: 2000,
          origin:'right',
          distance:'300px',
          viewFactor: 0.2
        });
        sr.reveal('#Carousel', {
          duration: 2000,
          delay: 1500,
          origin:'bottom'
        });
    </script>
    <footer>
      <p class="text-center">LeDiscotec &copy; 2018</p>
    </footer>
  </body>
</html>
