<?php
$id = $_GET["id"];
include("../datos/connect_db.php");
	$sql=("DELETE FROM edificios WHERE id = $id " ) ;
	$query=mysqli_query($db,$sql); 
	if($query) {
		echo ' <script language="javascript">alert("registro del edificio eliminado con éxito");</script> ';
		echo "<script>location.href='../vistas/edificios.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al eliminar registro del edificio");</script> ';
		echo "<script>location.href='../vistas/edificios.php'</script>";
	}
?>