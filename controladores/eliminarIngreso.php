<?php
$id = $_GET["id"];
include("../datos/connect_db.php");
	$sql=("DELETE FROM ingresos WHERE id = $id " ) ;
	$query=mysqli_query($db,$sql); 
	if($query) {
		echo ' <script language="javascript">alert("registro del recibo eliminado con éxito");</script> ';
		echo "<script>location.href='../vistas/movimientos.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al eliminar registro del recibo");</script> ';
		echo "<script>location.href='../vistas/movimientos.php'</script>";
	}
?>