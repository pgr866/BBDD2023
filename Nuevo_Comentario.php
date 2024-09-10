<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<link rel="stylesheet" href="micss.css">
</head>
<body>
	<?php
	include_once ('Conexion.php');
	session_start();
  $login = $_GET['login'];
	if($login=="anonimo") {
		echo "<h1>Por favor, logueate para ver este contenido</h1>";
	} else {
    $idvideo = $_GET['idvideo'];
		echo "<br/>";
		echo "<h1>Añadir comentario</h1>";
		echo "<br/>";
    echo "<form action='ScriptNuevoComentario.php' method='post'>";
    echo "<input type='hidden' name='video_id' value='$idvideo'>";
      echo "<input type='hidden' name='login' value='$idvideo'>";
    echo "<textarea name='texto' rows='5' cols='50'></textarea><br>";
    echo "<input type='checkbox' name='me_gusta' value='1'>Me gusta<br>";
    echo "<input type='checkbox' name='no_me_gusta' value='1'>No me gusta<br>";
    echo "<input type='submit' value='Añadir comentario'>";
    echo "</form>";
}
$mysqli->close();
?>
</body>
</html>
