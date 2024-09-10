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
	if($_SESSION['login']=="anonimo") {echo "<h1>Por favor, logueate para ver este contenido</h1>";}
  else {
	$login = $_SESSION['login'];

	$usuario = "SELECT * FROM usuario";
	$resultado = $mysqli->query($usuario);
	if ($resultado->num_rows>0){
		while ($fila = $resultado->fetch_object())
		{
		echo "<div width='100%' >";
    echo "<img src=" . $fila->{"imagen personal"} ."  class='avatar'/>";
		echo "<a class='menu' href='Pagina_Usuario.php?usuario=". $fila->login . "&visor=" . $login . "'><p><b> " . $fila->{"nombre completo"} .  "</b></p></a>";
		echo "<p> <b>Nick: </b>" . $fila->nick . "<b> País: </b> " . $fila->pais . "</p>";
	  echo "<p><b> Descripción: </b>" . $fila->{"descripción"} .  "</p>";
		echo "<p><b> Número de subscriptores: </b>" . $fila->{"número de subscriptores"} .  "</b></p>";
    echo "<br/>";
    echo "</div>";
	  }
	}
}

$mysqli->close();
?>
</body>
</html>
