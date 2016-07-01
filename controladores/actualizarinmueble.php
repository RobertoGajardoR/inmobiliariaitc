<?php
$id_inmueble=$_POST['id_inmueble'];
$tipo=$_POST['tipo'];

$numero=$_POST['numero'];
$edificio= $_POST['edificio'];
$descripcion= $_POST['descripcion'];

	include("../datos/connect_db.php");
	$sql=(" UPDATE inmuebles SET edificio = '$edificio', tipo = '$tipo', numero = '$numero' , descripcion = '$descripcion' WHERE inmuebles.id = '$id_inmueble' " ) ;
	$query=mysqli_query($db,$sql);
	if($query) {
		echo ' <script language="javascript">alert("Registro inmueble actualizado con éxito");</script> ';
		echo "<script>location.href='inmuebles.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al registrar inmueble");</script> ';
		echo "<script>location.href='inmuebles.php'</script>";
	}
?> 