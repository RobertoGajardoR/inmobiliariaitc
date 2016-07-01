<?php
$id = $_GET["id"];
include("../datos/connect_db.php");
	$sql=("DELETE FROM clientes WHERE id = $id " ) ;
	$query=mysqli_query($db,$sql); 
	if($query) {
		echo ' <script language="javascript">alert("registro del cliente eliminado con éxito");</script> ';
		echo "<script>location.href='../vistas/clientes.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al eliminar registro del cliente");</script> ';
		echo "<script>location.href='../vistas/clientes.php'</script>";
	}
?>