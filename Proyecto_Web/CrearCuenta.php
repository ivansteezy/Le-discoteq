<!DOCTYPE html>
<html>
<head>
	<title>Crear Cuenta</title>

	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/Estilos.css">
</head>

<body style="background-image: url(https://66.media.tumblr.com/2e0ffef8f50dff219e92962606605509/tumblr_npwl2ldUKg1uwnds8o1_1280.jpg);">

	<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header">
					<div class="avatar">
						<img src="Imagenes/avatar.png" alt="Avatar">
					</div>
					<h4 class="modal-title" id="Registro">Registro</h4>
				</div>


				<div class="modal-body">

					<form method="POST" action="CrearCuenta.php">
						<div class="form-group">
							<input type="text" class="form-control" Name="Nombre" placeholder="Nombre Completo">
						</div>

						<div class="form-group">
							<input type="text" class="form-control" Name="Direccion" placeholder="Dirección">
						</div>

						<div class="form-group">
							<input type="text" class="form-control" Name="Usuario" placeholder="Usuario">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" Name="Correo" placeholder="Correo">
						</div>

						<div class="form-group">
							<input type="password" class="form-control" Name="Contrasena" placeholder="Contraseña">
						</div>

						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary btn-lg btn-block login-btn">Registrarse</button>
						</div>

						</form>

				</div>



			</div>
	</div>


	<?php
	    $dbcon = mysqli_connect("localhost", "root", "", "Lediscotec") or die("No se pudo connectar");
	    //echo "Conexion Segura";
	//________________________________Inserta a la Base_____________________________________________________
	    if(isset($_POST['submit']))
	    {
	    	$dbcon = mysqli_connect("localhost", "root", "", "Lediscotec") or die("No se pudo connectar");

	        $sql = "INSERT INTO cuentas (Nombre,Direccion,Usuario,Correo,Contrasena) VALUES ('$_POST[Nombre]','$_POST[Direccion]','$_POST[Usuario]','$_POST[Correo]', '$_POST[Contrasena]')" or die("NO QUERY");

	        mysqli_query($dbcon,$sql);


	    $Us = $_POST['Usuario'];
	    echo $Us;


	    session_start();

	//________________________________Imprime la Tabla____________________________________________________
	    $sql = "SELECT * FROM Cuentas WHERE Usuario = '$Us'";

	      $mydata = mysqli_query($dbcon,$sql);

	      while($record = mysqli_fetch_array($mydata))
	      {

	          $_SESSION['ID_U'] = $record['ID'];
	          $_SESSION['Nombre_U'] = $record['Nombre'];
	          $_SESSION['Direccion_U'] = $record['Direccion'];
	          $_SESSION['Usuario_U'] = $record['Usuario'];
	          $_SESSION['Correo_U'] = $record['Correo'];
	          $_SESSION['Contrasena_U'] = $record['Contrasena'];
	      }

	      echo  $_SESSION['ID_U'] ;
	        echo  $_SESSION['Nombre_U'];
	        echo  $_SESSION['Direccion_U'];
	        echo  $_SESSION['Usuario_U'];
	        echo  $_SESSION['Correo_U'];
	        echo  $_SESSION['Contrasena_U'];


	      header("location: Index.php");

    }
 	?>

	<footer>
		<p class="text-center">LeDiscotec &copy; 2018</p>
	</footer>
</body>
</html>
