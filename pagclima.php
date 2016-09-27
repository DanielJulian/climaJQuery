<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');
include_once("callApi.php");
session_start();

//var_dump($_POST);
$resultado=[]; //Array donde voy a guardar los resultados de las busquedas
$id = "";


if(is_null($_SESSION["user"]) && is_null($_SESSION["password"]) ){
	header("location: http://localhost/climaJQuery/loginclima.php"); //Para  ir a la otra pagina web
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<title>Clima</title>
	<link rel="stylesheet" href="./css/estiloclima.css">
	<link href='./css/normalize.css' rel='stylesheet'>
    <link href='./css/bootstrap.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-2.2.3.js"></script>
    <script src="jquery.js"></script>
</head>
<body>
    <div class='video-container'>
      <video autoplay height='768' loop poster='./videos/ftb/ftb.jpg' width='1366'>
        <source src='./videos/ftb/ftb.mp4' typ='video/mp4'>
        <source src='./videos/ftb/ftb.webm' typ='video/webm'>
      </video>
    </div>
	<div class='container'>
		<div id="info" class="dancing-script">
			<p><?php echo "Bienvenido " . $_SESSION["user"];?></p>
			<p><?php echo "<a href='logoutclima.php'>Cerrar Sesion</a>";?></p>
		</div>
		<div class="titulo">
			<i class='glyphicon glyphicon-tint'></i>
			<i class='glyphicon glyphicon-tint'></i>
			<i class='glyphicon glyphicon-tint'></i>
			<i class='glyphicon glyphicon-flash'></i>
			<i class='glyphicon glyphicon-flash'></i>
			<i class='glyphicon glyphicon-flash'></i>
			<h1 id="titulo">Weather Page</h1>
		</div>
		<form>
			<div>
				<input type="text" id="id" name="id" placeholder="ID de la ciudad" />
			</div>
			<div id="buscar">
				<input type="button" value="Buscar"	onclick="callAPI()" /> 
			</div>
		</form>
		<div id="resultados">
			<textarea name="resultados" rows="10" cols="70" id="result" disabled placeholder="Aquí se mostrarán los resultados de su búsqueda">
			</textarea>
		</div>
		<div id="busquedas">
			<textarea name="textarea" rows="10" cols="50" disabled placeholder="Aquí se mostrarán los resultados de sus antiguas búsquedas"><?php
				if(isset($_SESSION["memoria"])){
					$_SESSION["memoria"] = $_POST["memoria"] . $_SESSION["memoria"] ;
					print_r($_SESSION["memoria"]);
				}else{
					$_SESSION["memoria"] = $_POST["memoria"];
					print_r($_SESSION["memoria"]);
				}
			?></textarea>
		</div>
	</div>
</body>
</html>

