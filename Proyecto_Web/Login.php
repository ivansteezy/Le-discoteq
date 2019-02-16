<!DOCTYPE html>
<html lang="en">
<head>
	<title>Prueba</title>
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/Estilos.css">
</head>

<body style="background-image: url(https://66.media.tumblr.com/205d264158150fba052dc05e6f8bbfcf/tumblr_ns4775lh7M1u6fg98o1_1280.jpg);">
	<div class="modal-dialog modal-login">
  		<div class="modal-content">
  			<div class="modal-header">
  				<div class="avatar">
  					<img src="Imagenes/avatar.png" alt="Avatar">
  				</div>
  				<h4 class="modal-title">Inicia Sesi&oacute;n</h4>
  			</div>

  			<div class="modal-body">

          <form method="POST" action="Login.php">

    					<div class="form-group">
    						<input type="text" class="form-control" name="Usuario" placeholder="Usuario" required="required">
    					</div>

    					<div class="form-group">
    						<input type="password" class="form-control" name="Contrasena" placeholder="Contrase&ntilde;a" required="required">
    					</div>

    					<div class="form-group">
    						<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-btn">Ingresar</button>
    					</div>

            </form>

  			</div>


        <?php

        if(isset($_POST['submit']))
      {

          $dbcon = mysqli_connect("localhost", "root", "", "Lediscotec") or die("No se pudo connectar");

      $Us = $_POST['Usuario'];
      //echo $Us;


      session_start();

  //________________________________Imprime la Tabla____________________________________________________

      $sql = "SELECT * FROM Cuentas WHERE Usuario = '$Us'";

        $mydata = mysqli_query($dbcon,$sql);


        $record = mysqli_fetch_array($mydata);

        if (is_null($record))
        {
          echo "Usuario No Existe";
        }
        else if ($record['Contrasena'] == $_POST['Contrasena'])
        {


                $_SESSION['ID_U'] = $record['ID'];
                $_SESSION['Nombre_U'] = $record['Nombre'];
                $_SESSION['Direccion_U'] = $record['Direccion'];
                $_SESSION['Usuario_U'] = $record['Usuario'];
                $_SESSION['Correo_U'] = $record['Correo'];
                $_SESSION['Contrasena_U'] = $record['Contrasena'];



            header("location: Index.php");
        }
        else
        {
          echo "Contraseña Erronea";
        }





    }




         ?>




  			<div class="modal-footer">
  				<a href="CrearCuenta.php">¿No tienes cuenta? ¡Registrate!</a>
  			</div>
  		</div>
	</div>
	<footer>
		<p class="text-center">LeDiscotec &copy; 2018</p>
	</footer>
</body>
</html>
