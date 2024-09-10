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
	echo "<a class='menu' href='ScriptNuevaLista.php?&usuario=". $login . "'><button style='width:100%; margin:10pt;  background-color:red;color:white;'>Nueva Lista de Videos</button></a>";
	$listas = "SELECT * FROM `lista de videos` WHERE usuario_login='$login'";
	$resultado = $mysqli->query($listas);

	echo "<div style='margin:20pt;'>";
	while ($fila = $resultado->fetch_object()){
	  echo "<div width='100%''>";
	 	echo "<p><b> Lista : </b>" . $fila->nombre .  "</p>";
		$id = $fila->{"idlista de videos"};
		$videos = "SELECT * FROM video as vid INNER JOIN `videos de la lista` as lista WHERE lista.`lista de videos_idlista de videos`='$id'
		and vid.idvideo = lista.video_idvideo";
		$resultado2 = $mysqli->query($videos);
		if ($resultado2->num_rows>0){
     echo "<div class='row' style='margin: 20pt;'>";
			while ($fila = $resultado2->fetch_object()) {
				$sub = explode('https://www.youtube.com/watch?v=', $fila->url);
        $id = $sub[0];
        $image = "https://img.youtube.com/vi/" . $id . "/0.jpg";
				echo "<div class='column' style='margin: 20pt;'>";
				if ($fila->usuario_login==$login) {
				echo "<a class='menu' href='Pagina_Video_Propio.php?idvideo=". $fila->idvideo . "&usuario=". $login . "'> <img src='". $image ."' width='100%' height='480'></img></a>";
			  }
				else {	echo "<a class='menu' href='Pagina_Video_Ajeno.php?idvideo=". $fila->idvideo . "&usuario=". $login . "'> <img src='". $image ."' width='100%' height='480'></img></a>";}
				echo "<b>" . $fila->{"título"}; echo "</b><br/>";
				echo "</div>";
		}
	 echo "</div>";
	}
	}
	echo "</div>";
}


$mysqli->close();
?>
</body>
</html>
