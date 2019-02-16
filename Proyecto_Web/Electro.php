<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Electro</title>


	<link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/Productos.css">


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


    <!--MENU -->
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


        <?php

  $dbcon = mysqli_connect("localhost", "root", "", "Lediscotec") or die("No se pudo connectar");

//________________________________Imprime la Tabla____________________________________________________
    $sql = "SELECT * FROM Albums WHERE FK_Genero = 4";

      $mydata = mysqli_query($dbcon,$sql);

      $Con = 0;
      $OtroCon = 0;
      $Hola = 5;

      echo " <div class='container'>

      <h1 align='Center'>Electro</h1>

      <div class='row'>
       <form action='Individuales.php' method='POST'>
       ";

      while($record = mysqli_fetch_array($mydata))
      {

        $Con++;

          $ID = $record['ID'];
          $Nombre =  $record['Nombre'];
          $Artista=  $record['Artista'];
          $Descripcion = $record['Descripcion'];
          $Precio =  $record['Precio'];
          $Imagen =  $record['Imagen'];
          $Genero = $record['FK_Genero'];


          echo "
              <div class='col-lg-4 col-md-4 col-sm-6 col-xs-6'>

                <button type='submit' name='$ID' value='$ID' class='Boton' style='background-color: white; border: none'>

              <a href='' class='Producto' style='text-decoration: none'>
                <div class='thumnail Producto'>

                  <img src='$Imagen' style='width: 150px; height: 150px;'>

                  <div class='caption' style='width: 150px; height: 150px;' >
                    <h2>$Nombre</h2>
                    <h3>$Artista</h3>

                  </div>

                </div>
              </a>

            </button>

            </div>



      ";

      }

      echo "
      </form>
        </div>
      </div>";

?>
<footer>
  <p class="text-center">LeDiscotec &copy; 2018</p>
</footer>
</body>
</html>
