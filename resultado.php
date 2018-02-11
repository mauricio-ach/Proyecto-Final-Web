<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Resultado</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="lib/css/estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
		include 'conexion.php';
		$opcion1 = $_GET['opcion'];
		$opcion2 = $_GET['opcion2'];
		$resultado = "";
		$ganador = "";
		$j1_resultado = "0";
		$j2_resultado = "0";

		//evaluamos el resultado
		if ($opcion1 == "piedra") {
			if($opcion2 == "piedra") {
				$resultado = "Empate";
				$ganador = "Empate";
			} elseif ($opcion2 == "papel") {
				$resultado = "papel";
				$ganador = "Jugador 2";
			} elseif ($opcion2 == "tijera") {
				$resultado = "piedra";
				$ganador = "Jugador 1";
			}
		} elseif ($opcion1 == "papel") {
			if($opcion2 == "piedra") {
				$resultado = "papel";
				$ganador = "Jugador 1";
			} elseif ($opcion2 == "papel") {
				$resultado = "Empate";
				$ganador = "Empate";
			} elseif ($opcion2 == "tijera") {
				$resultado = "tijera";
				$ganador = "Jugador 2";
			}
		} elseif ($opcion1 == "tijera") {
			if($opcion2 == "piedra") {
				$resultado = "piedra";
				$ganador = "Jugador 2";
			} elseif ($opcion2 == "papel") {
				$resultado = "tijera";
				$ganador = "Jugador 1";
			} elseif ($opcion2 == "tijera") {
				$resultado = "Empate";
				$ganador = "Empate";
			}
		}	

		//1 y 0 para tabla
		if ($ganador == "Jugador 1") {
			$j1_resultado = "1";
			$j2_resultado = "0";
		} elseif ($ganador == "Jugador 2") {
			$j1_resultado = "0";
			$j2_resultado = "1";
		}

		//Comenzamos insert del juego
		if ($ganador == "Jugador 1" || $ganador == "Jugador 2") {
			$consulta_insert = "INSERT INTO juegos VALUES ('','$j1_resultado', '$j2_resultado', '$ganador')";
			$query = $bd -> prepare($consulta_insert);
			$query -> execute();
			$resultado_query = $query -> rowCount();
		} else {
			$consulta_insert = "INSERT INTO juegos VALUES ('','$j1_resultado', '$j2_resultado', '$ganador')";
			$query = $bd -> prepare($consulta_insert);
			$query -> execute();
			$resultado_query = $query -> rowCount();
		}
		//Actualizamos contador	
		if ($ganador == "Jugador 1") {
			$consulta_update = "UPDATE jugadores SET juegosganados = juegosganados + 1 WHERE jugador = 'jugador-1'";
			$query_update = $bd -> prepare($consulta_update);
			$query_update -> execute();
			$resultado_query_update = $query_update -> rowCount();	
		} elseif ($ganador == "Jugador 2" ) {
			$consulta_update = "UPDATE jugadores SET juegosganados = juegosganados + 1 WHERE jugador = 'jugador-2'";
			$query_update = $bd -> prepare($consulta_update);
			$query_update -> execute();
			$resultado_query_update = $query_update -> rowCount();
		}
	 ?>
	<div class="container-fluid">
		<div class="text-center titulo">Desarrollo Web - Proyecto Final</div>
		<div class="text-center vista1">
			<h1 class="texto-ganador">Ganador</h1>
			<h2 class="ganador"><?php echo $ganador ?></h1>
			<h3 class="carita">:)</h3>
			<button class="boton" style="margin-top: 100px;" onclick="regresar()">Regresar</button>
		</div>
		<div class="vista2">
			<div class="imagen-corona"><img src="lib/img/corona-chida.png"></div>
			<?php 
				if ($resultado == "Empate") {
					echo "<div class='imagen-tijera'><img src='lib/img/$resultado.png' width='60%'></div>";
				} else {
					echo "<div class='imagen-tijera'><img src='lib/img/$resultado.png'></div>";					
				}
			 ?>

		</div>
	</div>
</body>

<script>
	function regresar() {
		window.open("juego.php", "_self");
	}
</script>

</html>