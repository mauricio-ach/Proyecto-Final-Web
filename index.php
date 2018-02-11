<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Piedra, Papel ó Tijera</title>

	<link rel="stylesheet" href="lib/css/estilos.css">
	<link rel="stylesheet" href="lib/boostrap/css/bootstrap.min.css">
	<script src="lib/boostrap/js/bootstrap.min.js"></script>
	<script src="lib/jQuery/jquery-3.3.1.min.js"></script>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div id="titulo" class="text-center titulo col-md-12 col-xs-12">Desarrollo Web - Proyecto Final</div>
		</div>
		
		<div class="row">	
			<div id="vista1" class="text-center vista1 col-md-6 col-xs-6" style="margin-bottom: 15px">
				<ul class="lista text-center">
				<li>Piedra</li>
				<li>Papel</li>
				<li>Tijera</li>
				</ul>
				<button class="boton" onclick="abreJuego()">Comenzar</button>
			</div>
			<div id="vista2" class="vista2 col-md-6 col-xs-6">
				<div class="row">
					<div class="imagen-piedra"><img src="lib/img/piedra.png"></div>
					<div class="imagen-papel"><img src="lib/img/papel.png"></div>
				</div>
				<div class="row">
					<div class="imagen-tijera"><img src="lib/img/tijera.png"></div>
				</div>
			</div>
		</div>
	</div>
</body>

<script>
	function abreJuego() {
		$("#titulo").hide(500);
		$("#vista1").hide(500);
		$("#vista2").hide(500, function(){
			window.open("juego.php", "_self");
		});		
	}
</script>

</html>