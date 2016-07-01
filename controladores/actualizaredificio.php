<?php
$id_edificio=$_POST['id_edificio'];
$nombre=$_POST['nombre'];
$ubicacion=$_POST['ubicacion'];
$direccion=$_POST['direccion'];


	include("../datos/connect_db.php");
	$sql=(" UPDATE edificios SET nombre = '$nombre', ubicacion = '$ubicacion', direccion = '$direccion'  WHERE edificios.id = '$id_edificio' " ) ;
	$query=mysqli_query($db,$sql);
	if($query) {
		echo ' <script language="javascript">alert("Registro del edificio actualizado con éxito");</script> ';
		echo "<script>location.href='edificios.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al actualizar edificio");</script> ';
		echo "<script>location.href='edificios.php'</script>";
	}
?> 