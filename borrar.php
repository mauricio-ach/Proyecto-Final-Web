<?php 
	include 'conexion.php';

	//Consulta borrarr
	$consulta = "DELETE FROM juegos";
	$query = $bd -> prepare($consulta);
	$query -> execute();
	$resultado_query = $query -> rowCount();

	//Reinicio a score
	$consulta_score = "UPDATE jugadores SET juegosganados = 0";
	$query_score = $bd -> prepare($consulta_score);
	$query_score -> execute();
	$resultado_query_score = $query_score -> rowCount();

	header("Location:juego.php")
 ?>