<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Resultado</title>

	<link rel="stylesheet" href="lib/css/estilos.css">
	<link rel="stylesheet" href="lib/boostrap/css/bootstrap.min.css">
	<script src="lib/boostrap/js/bootstrap.min.js"></script>
	<script src="lib/jQuery/jquery-3.3.1.min.js"></script>	
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
		<div class="row">
			<div class="text-center titulo col-md-12">Desarrollo Web - Proyecto Final</div>
		</div>
		
		<div class="row">
			<div class="text-center vista1 col-md-6">
				<h1 class="texto-ganador">Ganador</h1>
				<h2 class="ganador"><?php echo $ganador ?></h2>
				<h3 class="carita">:)</h3>
				<button class="boton" style="margin-top: 100px;" onclick="regresar()">Regresar</button>
			</div>
			<div class="vista2 col-md-6">
					<img class="imagen-corona" src="lib/img/corona-chida.png">
					<?php 
						if ($resultado == "Empate") {
							echo "<img class='imagen-tijera' src='lib/img/$resultado.png' style='width:40%'>";
						} else {
							echo "<img class='imagen-tijera' src='lib/img/$resultado.png'>";
						}
					 ?>
			</div>
		</div>
	</div>
</body>

<script>
	function regresar() {
		window.open("juego.php", "_self");
	}
</script>

</html>