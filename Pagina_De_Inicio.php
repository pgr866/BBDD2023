<!DOCtype html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
<link rel="stylesheet" href="micss.css">
</head>
<body>

<?php
error_reporting(E_ALL ^ E_NOTICE);
if(!isset($_SESSION)) { session_start(); $_SESSION['login'] = "anonimo";}
 ?>

<div class="sidebar">
  <a class="menu" href="Principal.php"><img src="https://as01.epimg.net/meristation/imagenes/2021/05/24/betech/1621891634_968422_1621891957_noticia_normal.jpg" alt="Youtube" width="100%" height="100"></a>
  <a class="menu" href="Perfil.php">Perfil</a>
  <a class="menu" href="Nuevo_Video.php">Nuevo Video</a>
  <a class="menu" href="Listas_De_Videos.php">Listas</a>
  <a class="menu" href="Historial_De_Videos.php">Historial</a>
  <a class="menu" href="Ver_Usuarios.php">Usuarios</a>
  <a class="menu" href="Lista_De_Seguidores.php">Seguidores</a>
	<a class="menu" href="Ganancias.php">Ganancias</a>
  <a class="menu" href="Alquiler_De_Peliculas.php">Alquiler de Películas</a>
	<a class="menu" href="Pagina_Login.html">Login</a>
</div>

<div class="content" id="main" >
<div>
   <?php include 'Principal.php'?>
 </div>
</div>
<script>

$(document).on('click', '.menu', function(e) {
  e.preventDefault();
 $.ajax({
   url: $(this).attr('href'),
   success: function(data){
     $("#main").html(data);
   }
 });
});
</script>
<script>
$(document).on('submit', '.formulario', function() {
	 event.preventDefault();
	 $.ajax( {
			 url: $(this).attr('action'),
			 data: $(".formulario").serialize(),
			 method: "post",
			dataType: 'html',
			 success: function(strMessage) {
					 $("#main").html(strMessage);
			 }
	 });
 });


</script>
</body>
</html>
