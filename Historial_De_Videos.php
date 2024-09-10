<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<link rel="stylesheet" href="micss.css">
</head>
<body>
<?php
include_once ('Conexion.php');
session_start();
if ($_SESSION['login'] == "anonimo") {
	echo "<h1>Por favor, inicie sesión para ver este contenido</h1>";
} else {
	$login = $_SESSION['login'];
	echo "</div>";
	$videos = "SELECT * FROM video V INNER JOIN historial H ON V.idvideo = H.idvideo AND H.login = '$login'";
	$resultado = $mysqli->query($videos);
	echo "<div>";
	while ($fila = $resultado->fetch_object()) {
	    $sub = explode('https://www.youtube.com/watch?v=', $fila->url);
	    $id = $sub[0];
	    $image = "https://img.youtube.com/vi/" . $id . "/0.jpg";
	    echo "<div class='row' style='margin: 20pt;'>";
	    echo "<div class='column' style='margin: 20pt;'>";
	    if ($fila->usuario_login==$login) {
	    echo "<a class='menu' href='Pagina_Video_Propio.php?idvideo=". $fila->idvideo . "&usuario=". $login . "'> <img src='". $image ."' width='100%' height='480'></img></a>";
	    }
	    else {
				echo "<a class='menu' href='Pagina_Video_Ajeno.php?idvideo=". $fila->idvideo . "&usuario=". $login . "'> <img src='". $image ."' width='100%' height='480'></img></a>";
			}
	    echo "</div>";
	    echo "<div class='column' style='margin: 20pt;'> ";
	    echo "<a class='menu' href='Pagina_Usuario.php?usuario=". $fila->login . "&visor=". $login . "'><p><b> " . $fila->{"usuario_login"} .  "</b></p></a>";
	    echo "<b>" . $fila->{"título"}; echo "</b><br/>";
			$historial = "SELECT * FROM historial H INNER JOIN video V ON V.idvideo = '$fila->idvideo' AND H.login = '$login'";
			$resultado2 = $mysqli->query($historial);
			$fila2 = $resultado->fetch_object();
			echo "<b> Fecha de Última Reproducción: </b>" . $fila2->{"FechaReproducción"}; echo "<br/>";
	    echo "<b> Visitas: </b>" . $fila->{"número de visualizaciones"}; echo "<br/>";
	    echo "<b> Me gusta: </b>". $fila->{"número de me gusta"}; echo "<br/>";
	    echo "<b> No me gusta: </b>". $fila->{"número de no me gusta"}; echo "<br/>";
	    echo "</div>";
	    echo "</div>";
		}
}
echo "</div>";
?>
</body>
</html>
