<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Juego</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="lib/css/estilos.css">

	<link rel="stylesheet" href="lib/boostrap/css/bootstrap.min.css">
	<script src="lib/boostrap/js/bootstrap.min.js"></script>
	<script src="lib/jQuery/jquery-3.3.1.min.js"></script>	

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="text-center titulo">Desarrollo Web - Proyecto Final</div>
		</div>
		<div class="row">
			<form class="col-md-12" id="formulario" action="resultado.php?<?php echo "opcion1=" . $_GET['opcion'] ?>">
				<div class="text-center vista1-juego col-md-5">
						<img id="img-1" src="lib/img/interrogacion.png">
			
						<select id="opcion" name="opcion">
							<option value="interrogacion" selected>	Seleccion opción...</option>
							<option value="piedra">Piedra</option>
							<option value="papel">Papel</option>
							<option value="tijera">Tijera</option>
						</select>

					<div class="score">
						<?php 
							include 'conexion.php';
							$consulta_score = "SELECT * FROM jugadores";
							$query_score = $bd -> prepare($consulta_score);
							$query_score -> execute();
							$resultado_query_score = $query_score -> fetchAll();
							echo $resultado_query_score[0][2];
						 ?>
					</div>

				</div>
				<div class="vista2-juego col-md-2">
					<img class="imagen-versus" src="lib/img/versus.png">
					<div class="boton-juego text-center" style="padding-top: 2%" onclick="validar()">Jugar</div>
				</div>
				<div class="vista3-juego col-md-5">
			
					<img id="img-2" src="lib/img/interrogacion.png">
					<select id="opcion2" name="opcion2">
						<option value="interrogacion" selected>Seleccion opción...</option>
						<option value="piedra">Piedra</option>
						<option value="papel">Papel</option>
						<option value="tijera">Tijera</option>
					</select>

					<div class="score">
						<?php 
							echo $resultado_query_score[1][2];
					 	?>
					</div>

				</div>
			</form>
		</div>
		<div class="row">
			
			<?php 
					$consulta = "SELECT * FROM juegos";
					$query = $bd -> prepare($consulta);
					$query -> execute();
					$resultado_query = $query -> fetchAll();
					echo "<table class='table table-striped table-bordered'>";
					echo "<tr>
							<td style='text-align:center'>Jugador 1</td>
							<td style='text-align:center'>Jugador 2</td>
							<td style='text-align:center'>Ganador</td>
						</tr>";
					for ($i=0; $i < count($resultado_query); $i++) { 
						echo "<tr>";
						echo "<td style='text-align:center'" . $i . "'>" . $resultado_query[$i][1] . "</td>";
						echo "<td style='text-align:center'>" . $resultado_query[$i][2] . "</td>";
						echo "<td style='text-align:center'>" . $resultado_query[$i][3] . "</td>";
						echo "</tr>";
					}
					echo "</table>";
					
				 ?>

		</div>
		<div class="row">	
			<div class="text-center col-md-12">
				<button onclick="borrar()" class="btn btn-danger" style="margin-bottom: 10px"><i class="fa fa-trash" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</body>


<script>
	function borrar(){
		window.open("borrar.php", "_self");
	}

	function validar(){
		var opc1 = document.getElementById("opcion").value;
		var opc2 = document.getElementById("opcion2").value;
		if(opc1 == "interrogacion" || opc2 == "interrogacion" ) {
			alert("Selecciona una opción ! ")
		} else {
			document.getElementById("formulario").submit();
		}
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