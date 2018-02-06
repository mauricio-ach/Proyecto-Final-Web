<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Piedra, Papel ó Tijera</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="lib/css/estilos.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="text-center titulo">Desarrollo Web - Proyecto Final</div>
		<div class="text-center vista1">
			<ul class="lista">
				<li>Piedra</li>
				<li>Papel</li>
				<li>Tijera</li>
			</ul>
			<button class="boton-inicio" onclick="abrePag()">Comenzar</button>
		</div>
		<div class="vista2">

			<div class="imagen-piedra"><img src="lib/img/piedra.png"></div>
			<div class="imagen-papel"><img src="lib/img/papel.png"></div>
			<div class="imagen-tijera"><img src="lib/img/tijera.png"></div>
		</div>
	</div>
</body>

<script>
	function abrePag() {
		window.open("juego.php");
	}
</script>

</html>