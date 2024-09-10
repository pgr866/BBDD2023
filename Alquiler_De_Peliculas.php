<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
	<link rel="stylesheet" href="micss.css">
</head>
<body>
	<?php
		include_once('Conexion.php');
		session_start();
		$login = $_SESSION['login'];
		if ($login == "anonimo") {
			echo "<h1>Por favor, inicie sesión para ver este contenido</h1>";
		} else {
			echo "<h1>Lista de películas disponibles</h1>";
			$peliculas = "SELECT * FROM películas";
			$resultado = $mysqli->query($peliculas);
			if ($resultado->num_rows > 0) {
				echo "<div style='margin: 20pt;'>";
				while ($fila = $resultado->fetch_object()) {
					echo "<br/><a href='" . $fila->EnlaceFilmAffinity . "' target='_blank'><img src='" . $fila->Imagen . "' width='200' height='200'></a><br/>";
					echo "<b>Título:</b> " . $fila->Título . "<br/>";
					echo "<b>Duración:</b> " . $fila->Duración . "<br/>";
					echo "<b>Fecha de Publicación:</b> " . $fila->{'Fecha de Publicación'} . "<br/>";
					echo "<b>Sinopsis:</b> " . $fila->Sinopsis . "<br/>";
					echo "<b>Subtítulos:</b> " . $fila->Subtítulos . "<br/>";
					echo "<b><a href='" . $fila->Trailer . "' target='_blank'>Trailer</a></b><br/>";

					$alquiler = "SELECT * FROM alquiler WHERE IdPelicula='$fila->IdPelicula' AND login='$login'";
					$resultado2 = $mysqli->query($alquiler);
					if ($resultado2->num_rows>0) {
						$fila2 = $resultado2->fetch_object();
						echo "<b>Alquilada hasta:</b> " . $fila2->FechadeAlquiler . "<br/>";
					} else {
						echo "<form method='POST' action='ScriptAlquilarPelicula.php'>";
						echo "<input type='hidden' name='idpelicula' value='" . $fila->IdPelicula . "'>";
						echo "<input type='hidden' name='login' value='" . $login . "'>";
						echo "<button type='submit'>Alquilar</button>";
						echo "</form>";
					}
				}
				echo "</div>";
				} else {
					echo "<h3>No hay películas disponibles</h3>";
				}
		$mysqli->close();
		}
	?>
</body>
</html>
