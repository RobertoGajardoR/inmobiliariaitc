<?php
	$id=$_POST['id'];
	$fecha=$_POST['fecha'];
	$servicio=$_POST['servicio'];
	$cuenta= $_POST['cuenta'];
	$banco=$_POST['banco'];
	$monto=$_POST['monto'];
	$situacion=$_POST['situacion'];
	
	include("../datos/connect_db.php");
	
	$sql=(" UPDATE egresos SET  fechalim = '$fecha', servicio = '$servicio' , cuenta = '$cuenta', banco = '$banco', monto = '$monto', situacion = '$situacion'  WHERE egresos.id = $id " ); 
	$query=mysqli_query($db,$sql);	
	if($query) {
		echo ' <script language="javascript">alert("Registro egreso actualizado con éxito");</script> ';
		echo "<script>location.href='../vistas/movimientos.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al actualizar egreso");</script> ';
		echo "<script>location.href='../vistas/movimientos.php'</script>";
	}
?> 