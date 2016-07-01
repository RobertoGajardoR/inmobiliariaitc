<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}
?>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<meta charset="utf-8">
<title>InmobiliariaITC</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" >
<link href="css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
function texto(e)
{
tecla=(document.all)? e.keyCode: e.which;
if(tecla==8) return true;//tecla que borra
patron =/[A-z a-z]/;//letras que acepta
te= String.fromCharCode(tecla);
return patron.test(te);
}

</script>
</head>
<body>
	<img class="logo" alt="logo" src="medios/Logo1.jpg" />
	<form id="login" action="controladores/validar.php" method="post" name="login">
		
		<label><a href="vistas/admin.php">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href="controladores/desconectar.php"> Cerrar Cesión </a></label>
	</form>
	<ul class="clase-1">
		<li><a href="index2.php" >inicio</a></li>
	<li><a href="vistas/edificios.php" >edificios</a></li>
		<li><a href="vistas/inmuebles.php" >inmuebles</a></li>
		<li><a href="vistas/clientes.php" >clientes</a></li>
		<li><a href="vistas/movimientos.php" >movimientos</a></li>
	</ul>
	<div class="inicio">
		<div class="quiens">
		<center><h2>¿Quienes somos?</h2></br></br></br>
		<p><b>Nuestra misión empresarial:</b> promover y gestionar cooperativas de viviendas que promuevan viviendas de calidad a precios muy asequibles.<br/><br/>
		Promovemos y articulamos el interés de las personas en conseguir su vivienda a un precio competitivo.<br/><br/>Ya sea a través de cooperativas de viviendas o comunidades de bienes, promovemos las construcciones, liberando a los socios de la gestión total del proyecto de la cooperativa.<br/><br/>
		<b>Nuestra visión estratégica:</b>  en un entorno comarcal, no necesariamente local, somos lideres en la  promoción de viviendas sostenibles concebidas y construidas con criterios sostenibles y a un precio muy competitivo.<br/><br/>
		ADOS C  gestora de cooperativas tiene capacidad para controlar las obras, los proyectos y las tramitaciones de licencia, entre otras cosas. Su misión es cuidar los aspectos administrativos, jurídicos y técnicos de la promoción de viviendas, a efectos de obtener las viviendas al mejor precio y con la mayor calidad.</p>
	 </center>
	</div>
	<div class="contact">
		<center><h2>Contacto</h2></center>
		<ul>
		<li>direccion: serrano #33.</li>
		<li>email: inmobiliaria-itc@gmail.com.</li>
		<li>telefonos: 22548435 - 55745465.</li>
	</ul>
</div>

</div>
<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>
