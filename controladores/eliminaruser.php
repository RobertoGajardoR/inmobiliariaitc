<?php
$id = $_GET["id"];
include("../datos/connect_db.php");
	$sql=("DELETE FROM login WHERE id = $id " ) ;
	$query=mysqli_query($db,$sql); 
	if($query) {
		echo ' <script language="javascript">alert("registro del usuario eliminado con éxito");</script> ';
		echo "<script>location.href='../vistas/admin.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al eliminar registro del usuario");</script> ';
		echo "<script>location.href='../vistas/admin.php'</script>";
	}
?>