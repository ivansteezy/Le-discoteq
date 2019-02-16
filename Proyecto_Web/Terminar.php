<!DOCTYPE html>
<html>

	<head>
			<meta charset="utf-8">
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

        <h1 align="Center">Terminar</h1>


<div style="float: left; display: inline-block;">
  

	<?php 

        $dbcon = mysqli_connect("localhost", "root", "", "Lediscotec") or die("No se pudo connectar");



      //________________________________Imprime la Tabla____________________________________________________

        $Usuario = $_SESSION['ID_U'];
        $Contador = 0;
        $sql = "SELECT carro.ID, carro.Fk_Album, Albums.Nombre, Albums.Artista, Albums.Precio, Albums.FK_Genero, Albums.Imagen, Genero.Genero FROM carro, Albums, Genero WHERE carro.Fk_usuario = '$Usuario' AND carro.Fk_Album = Albums.ID AND Albums.FK_Genero = Genero.PK";
        


          $mydata = mysqli_query($dbcon,$sql);

          if (!$mydata) 
          {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }

        $Precio = 0;


          echo "<br>";

          echo "<table border = 0 style='margin: 0 auto;'>,
          <tr>
          <th>Album</th>
          <th>Artista</th>
          <th>Genero</th>
          <th>Precio</th>
          <th>Imagen</th>
          </tr>";
          while($record = mysqli_fetch_array($mydata))
          {  
            echo "<tr>";
            echo  "<td>" . $record['Nombre'] . "</td>";
            echo  "<td>" . $record['Artista'] . "</td>";
            echo  "<td>" . $record['Genero'] . "</td>";
            echo  "<td>" . $record['Precio'] . "</td>";
            echo  "<td>" . "<img src=".$record['Imagen']."  height='100'/>" . "</td>";
            echo "</tr>";

            $Precio =  $record['Precio'] + $Precio; 
          }

            $Iva = ($Precio * 16)/100;
            $Total = $Precio + $Iva;

            $_SESSION['Precio'] = $Precio;
            $_SESSION['IVA'] = $Iva;
            $_SESSION['Total'] = $Total;

            echo "</table>";


	 ?>

   </div>

   

    <?php 

        $sql = "SELECT * FROM cuentas WHERE ID = '$Usuario' ";
        
          $mydata = mysqli_query($dbcon,$sql);

          if (!$mydata) 
          {
          printf("Error: %s\n", mysqli_error($dbcon));
          exit();
        }


         while($record = mysqli_fetch_array($mydata))
      {  

          $ID = $record['ID'];
          $Nombre =  $record['Nombre'];
          $Direccion =  $record['Direccion'];
          $Correo = $record['Correo'];

      }



     ?>


     <div style="float: left; display: block; padding-left: 70px;">
      <br>
      <h2>Nombre:</h2>
      <h3><?php echo $_SESSION['Nombre_U']; ?></h3>
      <h2>Direccion:</h2>
      <h3><?php echo $_SESSION['Direccion_U']; ?></h3>
      <h2>Correo:</h2>
      <h3><?php echo $_SESSION['Correo_U']; ?></h3>
      <br>
        </div>




    <?php 

    echo "<table>";
      echo "<tr>";
            echo  "<td></td>";
            echo  "<td></td>";
            echo  "<td></td>";
            echo  "<td> <h2>Total:</h2> </td>";
            echo  "<td> <h2>" . $Precio . "$</h2> </td>";
            echo  "<td></td>";
            echo  "<td></td>";
            echo "</tr>";

            echo "<tr>";
            echo  "<td></td>";
            echo  "<td></td>";
            echo  "<td></td>";
            echo  "<td> <h2>IVA:</h2> </td>";
            echo  "<td> <h2>" . $Iva . "$</h2> </td>";
            echo  "<td></td>";
            echo "</tr>";

            echo "<tr>";
            echo  "<td></td>";
            echo  "<td></td>";
            echo  "<td></td>";
            echo  "<td> <h2>NETO:</h2> </td>";
            echo  "<td> <h2>" . $Total . "$</h2> </td>";
            echo  "<td></td>";
            echo  "<td></td>";
            echo "</tr>";

            echo "</table>";


    $fecha = getdate();
    $fecha2;

    $Hoy = $fecha['wday'];


    if($Hoy == 1 || $Hoy == 2 || $Hoy == 6 || $Hoy == 0)
    {
      $fecha2 = getdate(time() + 259200);
    }
    else
    {
      $fecha2 = getdate(time() + 432000);
    }

     ?>


     <div style="float: left; display: block; padding-left: 70px;">
      <br>
      <h2>Fecha de Entrega:</h2>
      <h2>3 Dias Habiles</h2>

      <h3><?php echo $fecha2['mday'] . "/" . $fecha2['mon'] . "/" . $fecha2['year']; ?></h3>
      <br>
        </div>


<div>
  <br>
<a href="Pdf.php"><button class="btn btn-success btn-lg" style="margin-left: 50px">Generar PDF</button></a>
<a href="GuardarPdf.php"><button class="btn btn-success btn-lg" style="margin-left: 50px">Terminar Compra</button></a>
</div>
     
     
  



</body>
</html>