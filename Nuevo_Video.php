<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="micss.css">
	<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
	<title> Nuevo Video</title>
</head>
<body>
	<?php
	include_once ('Conexion.php');
	session_start();
	if($_SESSION['login']=="anonimo") {echo "<h1>Por favor, logueate para ver este contenido</h1>";exit();}
	?>

	<form action="ScriptNuevoVideo.php" method="post" class="formulario" style='margin:20pt; background-color:black;color:white;'>
		<table>
			<tr>
				<td>Título:</td>
				<td><input type="text" size="120" name="titulo"/></td>
			</tr>
			<tr>
				<td>Descripción:</td>
				<td><textarea name="descripcion" rows="5" cols="120"></textarea></td>
			</tr>
			<tr>
				<td>Url:</td>
				<td><input type="text" size="120" name="url"/></td>
			</tr>
			<tr>
				<td>Monetizado:</td>
				<td><input type="checkbox" name="monetizado" value="1" /></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="Subir" style='width:300%; background-color:red;color:white;' value="Subir" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
