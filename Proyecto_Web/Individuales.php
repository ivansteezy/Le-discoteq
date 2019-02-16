 <?php 	

	$Con = 1;

	while (!isset($_POST[$Con])) {
		$Con++;
	}

  session_start();

  $_SESSION['Album'] = $Con;


	$dbcon = mysqli_connect("localhost", "root", "", "lediscotec") or die("No se pudo connectar");
    //echo "Conexion Segura";

//________________________________Imprime la Tabla____________________________________________________
    $sql ="SELECT * FROM albums where ID = '$Con'";

      $mydata = mysqli_query($dbcon,$sql);

      while($record = mysqli_fetch_array($mydata))
      {  

        $ID = $record['ID'];
        $Nombre =  $record['Nombre'];
        $Artista =  $record['Artista'];
        $Descripcion = $record['Descripcion'];
        $Precio =  $record['Precio'];
        $Imagen =  $record['Imagen'];
        $FK_Genero = $record['FK_Genero']; 

      }

 ?>

 <!DOCTYPE html>
 <html>
 <head>



 	<title><?php echo $Nombre; ?></title>

 	<script type="text/javascript">
 		
 		function change()
 		{
 			var image = document.getElementById('social')
 			image.src = "<?php echo $Imagen; ?>";
 		}



 	</script>

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
 <body onload="change();">


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

                      <li><a href="HipHop.php">Hip Hop</a></li>
                      <li><a href="Pop.php">Pop</a></li>
                      <li><a href="Rock.php">Rock</a></li>
                      <li><a href="Electro.php">Electro</a></li>
                      <li><a href="Oldies.php">Oldies</a></li>

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


	<div class="container">

	        <h1 align="center"><?php echo $Nombre;?></h1>

	        <br>

	        <div class="row">

	        	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">

					<div class="thumnail">

						<img src="" id="social" style="width: 250px; height: 250px;" class="img-resposive img-thumbnail">

						<div class="caption" align="Left">
							<h2><?php echo $Nombre;?></h2>
							<h3><?php echo $Artista;?></h3>
						</div>

					</div>

				</div>

				<br><br><br><br>

				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-6" >


					<div class="well well-m" >

						<?php echo $Descripcion;?>

					</div>


					<div>

						<h2 style="float: left; display: inline;">Precio: </h2> 
						<h2 style="float: left; display: inline;"><?php echo $Precio;?>$</h2>

						<a href="AntesCarro.php"><button class="btn btn-success btn-lg" style="margin:0px 50px 50px 50px;">Comprar</button></a>

					</div>

				</div>


			</div>


		

	</div>


 
 </body>
 </html>