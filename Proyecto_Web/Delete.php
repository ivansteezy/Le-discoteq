<?php 

	$id = $_GET['id'];

	$dbcon = mysqli_connect("localhost", "root", "", "Lediscotec") or die("No se pudo connectar");

	$sql = "DELETE FROM carro WHERE ID = $id"; 

	if (mysqli_query($dbcon, $sql)) {
	    mysqli_close($dbcon);
	    header('Location: Vista_Carro.php'); 
	    exit;
	} else {
	    echo "Error deleting record";
	}

 ?>