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
	if($_SESSION['login']=="anonimo") {
		echo "<h1>Por favor, logueate para ver este contenido</h1>";
	} else {
		$idvideo = $_GET['idvideo'];
		$login = $_GET['login'];
    $query = "SELECT * FROM comentario WHERE idvideo = '$idvideo'";
    $result = $mysqli->query($query);
    echo "<h1>Comentarios del video</h1>";
		echo "<a class='menu' href='Nuevo_Comentario.php?idvideo=". $idvideo . "&login=". $login . "'><p><b> " . "<h2>Añadir comentario</h2>" .  "</b></p></a>";
		echo "<br/>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>{$row['Texto']}</p>";
        echo "<p>Me gusta: {$row['NúmeroMeGustas']}</p>";
        echo "<p>No me gusta: {$row['NúmeroNoMeGustas']}</p>";
				echo "<br/>";
    }
    echo "</form>";
}
$mysqli->close();
?>
</body>
</html>
