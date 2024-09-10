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
	$password = $_SESSION['password'];
	$usuario = "SELECT * FROM usuario WHERE login='$login' AND password='$password'";
	$resultado = $mysqli->query($usuario);

		$fila = $resultado->fetch_object();
    echo "<div width='100%''  >";
    echo "<img src=" . $fila->{"imagen de fondo"} . " width='100%' height='300''/>";
    echo "<img src=" . $fila->{"imagen personal"} ."  class='avatar'/>";
	 	echo "<p><b> Perfil de " . $fila->{"nombre completo"} .  "</b></p>";
		echo "<p> <b>Nick: </b>" . $fila->nick . "<b> País: </b> " . $fila->pais . "</p>";
	  echo "<p><b> Descripción: </b>" . $fila->{"descripción"} .  "</p>";
		echo "<p><b> Número de subscriptores: </b>" . $fila->{"número de subscriptores"} .  "</b></p>";
    echo "<br/>";
    echo "</div>";
		$videos = "SELECT * FROM video WHERE usuario_login='$login'";
		$resultado2 = $mysqli->query($videos);
		if ($resultado2->num_rows>0){
     echo "<div>";
			while ($fila = $resultado2->fetch_object()) {
				$sub = explode('https://www.youtube.com/watch?v=', $fila->url);
        $id = $sub[0];
        $image = "https://img.youtube.com/vi/" . $id . "/0.jpg";
				echo "<div class='row'>";
				echo "<div class='column'>";
				echo "<a class='menu' href='Pagina_Video_Propio.php?idvideo=". $fila->idvideo . "&usuario=". $login . "'> <img src='". $image ."'></img></a>";
				echo "</div>";
				echo "<div class='column'> ";
        echo "<b>" . $fila->{"título"} . "</b><br/>";
				echo $fila->{"descripción"} . "<br/>";
				echo "<b> Subido: </b>" . $fila->fecha . "<br/>";
				echo "<b> Visitas: </b>" . $fila->{"número de visualizaciones"}; echo "<br/>";
				echo "<b> Me gusta: </b>". $fila->{"número de me gusta"}; echo "<br/>";
				echo "<b> No me gusta: </b>". $fila->{"número de no me gusta"}; echo "<br/>";
				echo "</div>";
        echo "</div>";
		}
		echo "</div>";
	}
}

$mysqli->close();
?>
</body>
</html>
