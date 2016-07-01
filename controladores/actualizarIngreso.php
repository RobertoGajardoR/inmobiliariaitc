<?php
	$id=$_POST['id'];
	$codigorecibo=$_POST['codigorecibo'];
	$femision=$_POST['femision'];
	
	$renta=$_POST['renta'];
	$agua=$_POST['agua'];
	$luz=$_POST['luz'];
	$comunes=$_POST['comunes'];
	$situacion=$_POST['situacion'];
	include("../datos/connect_db.php");
	
	$sql=(" UPDATE ingresos SET  fechaemision = '$femision' , montorenta = '$renta', valoragua = '$agua', valorluz = '$luz', gastoscomunes = '$comunes', situacion = '$situacion'   WHERE ingresos.id = $id " ); 
	$query=mysqli_query($db,$sql); 	
	if($query) {
		echo ' <script language="javascript">alert("Registro recibo actualizado con éxito");</script> ';
		echo "<script>location.href='../vistas/movimientos.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al actualizar recibo");</script> ';
		echo "<script>location.href='../vistas/movimientos.php'</script>";
	}
?> 