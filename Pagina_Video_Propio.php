<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<link rel="stylesheet" href="micss.css">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
</head>
<body>
	<?php
	include_once ('Conexion.php');
	$idvideo = $_GET['idvideo'];
	$usuario = $_GET['usuario'];
	$video = "SELECT * FROM video WHERE idvideo='$idvideo'";
	$resultado = $mysqli->query($video);
	$fila = $resultado->fetch_object();

	echo "<div class='row' style='margin: 20pt; background-color:red'>";
	echo "<div class='column' style='margin: 20pt;' >";
	$sub = explode('https://www.youtube.com/watch?v=', $fila->url);
	$id = $sub[0];
	$video = "https://www.youtube.com/embed/" . $id;
	echo "<p align='center'><iframe width='100%' height='480' allowfullscreen src='". $video ."'></iframe></p>";
	echo "</div>";
	echo "<div class='column' style='margin: 20pt;'> ";
	echo "<a class='menu' href='Pagina_Usuario.php?usuario=". $fila->usuario_login . "&visor=". $usuario . "'><p><b> Ir al Perfil del Propietario </b></p></a>";
	echo "<b>" . $fila->{"título"}; echo "</b><br/>";
	echo "<b>" . $fila->{"descripción"}; echo "</b><br/>";
	echo "<b> Subido: </b>" . $fila->fecha; echo "<br/>";
	echo "<b> Visitas: </b>" . $fila->{"número de visualizaciones"}; echo "<br/>";
	echo "<b> Me gusta: </b>". $fila->{"número de me gusta"}; echo "<br/>";
	echo "<b> No me gusta: </b>". $fila->{"número de no me gusta"}; echo "<br/>";
	echo "<a href='ScriptMeGustaVideo.php?usuario=" .  $usuario . "&video=" . $idvideo . "'" . "class='menu' ><button style='width:100%'>Me Gusta</button></a><br/>";
	echo "<a href='ScriptNoMeGustaVideo.php' class='menu'><button style='width:100%'>No Me Gusta</button></a><br/>";
	echo "<a href='ScriptMonetizar.php' class='menu'><button style='width:100%'>Monetizar</button></a><br/>";
	echo "<a href='Lista_De_Comentarios.php?idvideo=$idvideo&login=$usuario' class='menu'><button style='width:100%'>Comentarios</button></a><br/>";
	echo "<form action='ScriptAnadorALista.php' method='post' class=formulario>";
	$listas = "SELECT * FROM `lista de videos` WHERE usuario_login='$usuario'";
	$resultado2 = $mysqli->query($listas);
  echo "<select style='width:100%'>";
	while ($fila2 = $resultado2->fetch_object()) {
  echo "<option value='" .$fila2->nombre . "'>" . $fila2->nombre . "</option>";
  }
  echo "</select><br/>";
	echo "<input type='submit'style='width:100%' value='Anadir a una lista'>";
	echo "</form>";
	echo "</div>";
	echo "</div>";




$mysqli->close();
?>
</body>
</html>
