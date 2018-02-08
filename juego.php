<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Juego</title>
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
	<div class="container-fluid">
		<div class="text-center titulo">Desarrollo Web - Proyecto Final</div>
		<div class="text-center vista1-juego">

			<div><img id="img-1" src="lib/img/interrogacion.png"></div>
			
			<form action="">
				<select id="opcion">
					<option value="interrogacion">Seleccion opción...</option>
					<option value="piedra">Piedra</option>
					<option value="papel">Papel</option>
					<option value="tijera">Tijera</option>
				</select>
			</form>

			<div>Puntuacion</div>

		</div>
		<div class="vista2-juego">
			<img class="imagen-versus" src="lib/img/versus.png">
			<button class="boton-juego" onclick="abreResultado()">Jugar</button>
		</div>
		<div class="vista3-juego">
			
			<div><img id="img-2" src="lib/img/interrogacion.png"></div>
			
			<form action="">
				<select id="opcion2">
					<option value="interrogacion">Seleccion opción...</option>
					<option value="piedra">Piedra</option>
					<option value="papel">Papel</option>
					<option value="tijera">Tijera</option>
				</select>
			</form>

			<div>Puntuacion</div>

		</div>
		<div>
			<?php 
				include 'conexion.php';
				$consulta = "SELECT * FROM jugadores";
				$query = $bd -> prepare($consulta);
				$query -> execute();
				$resultado_query = $query -> fetchAll();
				echo "<table class='table table-striped table-responsive table-bordered' width=100%>";
				echo "<tr>
						<td style='text-align:center'>Jugador 1</td>
						<td style='text-align:center'>Jugador 2</td>
						<td style='text-align:center'>Ganador</td>
					</tr>";
				for ($i=0; $i < count($resultado_query) - 1; $i++) { 
					echo "<tr>";
					echo "<td style='text-align:center' id='identificador" . $i . "'>" . $resultado_query[$i][0] . "</td>";
					echo "<td>" . $resultado_query[$i][1] . "</td>";
					echo "<td>" . $resultado_query[$i][2] . "</td>";
					echo "<td>" . $resultado_query[$i][3] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
				
			 ?>
		</div>
	</div>
</body>

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>
	
	function abreResultado() {
		window.open("resultado.php", "_self");
	}

	$("#opcion").change(function(){
		var imagen = document.getElementById("opcion").value;
		$("#img-1").attr("src", "lib/img/" + imagen + ".png");
	});

	$("#opcion2").change(function(){
		var imagen = document.getElementById("opcion2").value;
		$("#img-2").attr("src", "lib/img/" + imagen + ".png");
	});

</script>
</html>