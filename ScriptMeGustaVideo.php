<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="stylesheet" href="micss.css">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
</head>
<body>
	<?php
	include_once ('Conexion.php');
	$login = $_GET['usuario'];
  $idvideo =  $_GET['video'];
  $cadenaSQL = "INSERT INTO `me gusta video` (`usuario_login`,`video_idvideo`,`opinion`) VALUES ('$login','$idvideo','1')";
  $mysqli->query($cadenaSQL);
  $cadenaSQL = "UPDATE `video` SET `número de me gusta`= `número de me gusta` + 1 WHERE (`idvideo` = '$idvideo')";
  $mysqli->query($cadenaSQL);
  header("Location: Pagina_Video_Propio.php?idvideo=". $idvideo . "&usuario=". $login);

$mysqli->close();
?>
</body>
</html>
