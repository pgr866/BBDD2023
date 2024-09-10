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
	$login = $_POST['login'];
	$password = $_POST['password'];
	$usuario = "SELECT * FROM usuario WHERE login='$login' AND password='$password'";
	$resultado = $mysqli->query($usuario);
	if ($resultado->num_rows>0){
			session_start();
			$_SESSION['login'] = $login;
			$_SESSION['password'] = $password;
      $_SESSION['loggedin'] = true;
			header("Location:Principal.php");
	}
	else {
		echo "<h1>Usuario no encontrado: Revise sus credenciales.</h1>";
	}
$mysqli->close();
?>
</body>
</html>
