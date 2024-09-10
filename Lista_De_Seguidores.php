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
	$usuario = "SELECT * FROM usuario U INNER JOIN suscripción S ON U.login = S.login1 AND S.login2='$login'";
	$resultado = $mysqli->query($usuario);
	if ($resultado->num_rows>0){
		while ($fila = $resultado->fetch_object())
		{
		echo "<div width='100%' >";
    echo "<img src=" . $fila->{"imagen personal"} ."  class='avatar'/>";
		echo "<a class='menu' href='Pagina_Usuario.php?usuario=". $fila->login . "&visor=" . $login . "'><p><b> " . $fila->nick .  "</b></p></a>";
    echo "<br/>";
    echo "</div>";
	  }
	}
}

$mysqli->close();
?>
</body>
</html>
