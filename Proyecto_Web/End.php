<!DOCTYPE html>
<html>
  <head>
    <title>Le Disctec</title>
    <link rel="stylesheet" href="Estilos.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>

<body>
    <div class="page-header" style="text-align: center">
      <a href="Index.php" style="text-decoration: none"><h1>Le Discotec</h1></a>
    </div>

    <h4 style="color: black; padding-right: 10px;" align="right";>
                  <?php

                  session_start();

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

        <?php

          $dbcon = mysqli_connect("localhost", "root", "", "Lediscotec") or die("No se pudo connectar");

          $Usuario = $_SESSION['ID_U'];
          $Contador = 0;
          $sql = "DELETE FROM Carro WHERE FK_Usuario = '$Usuario'";



          $mydata = mysqli_query($dbcon,$sql);




         ?>


        <div align="center">
        <h1>Gracias Su Compra a sido Procesada</h1><br>
        <h1>Le Hemos Enviado un Correo</h1> <br>
        <h1>Puede Seguir Comprando</h1>
        </div>

          </body>
          <footer>
            <p class="text-center">LeDiscotec &copy; 2018</p>
          </footer>
</html>
