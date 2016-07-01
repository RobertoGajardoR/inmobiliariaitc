<?php
$id = $_GET["id"];
include("../datos/connect_db.php");
	$sql=("DELETE FROM inmuebles WHERE id = $id " ) ;
	$query=mysqli_query($db,$sql); 
	if($query) {
		echo ' <script language="javascript">alert("registro del inmueble eliminado con éxito");</script> ';
		echo "<script>location.href='../vistas/inmuebles.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al eliminar registro del inmueble");</script> ';
		echo "<script>location.href='../vistas/inmuebles.php'</script>";
	}
?>