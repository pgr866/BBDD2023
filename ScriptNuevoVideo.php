<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="micss.css">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
</head>
<body>
	<?php
	include_once ('Conexion.php');
	session_start();
	if($_SESSION['login']=="anonimo") {echo "<h1>Por favor, logueate para ver este contenido</h1>";}
  else {
  $login = $_SESSION['login'];
	$titulo = $_POST['titulo'];
  $descripcion =  $_POST['descripcion'];
  $url = $_POST['url'];

  $videos = "SELECT count(*) AS total FROM video";

  $resultado = $mysqli->query($videos);

	$fila = $resultado->fetch_object();

	$numero_video = $fila->total + 1;

	$fecha = date_create('now');

  $fecha = $fecha->format('Y/m/d');

 $cadenaSQL = "INSERT INTO `video` (`idvideo`, `título`, `descripción`, `fecha`, `número de visualizaciones`, `número de me gusta`, `número de no me gusta`, `monetizado`, `usuario_login`, `url`)
  VALUES ('$numero_video','$titulo','$descripcion','$fecha','0','0','0','0','$login','$url')";
  $mysqli->query($cadenaSQL);
  header("Location: Principal.php");
}

$mysqli->close();
?>
</body>
</html>
