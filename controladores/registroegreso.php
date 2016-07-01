<?php
	
	$fecha=$_POST['fecha'];
	$servicio=$_POST['servicio'];
	$cuenta= $_POST['cuenta'];
	$banco=$_POST['banco'];
	$monto=$_POST['monto'];
	$situacion=$_POST['situacion'];
	
require("../datos/connect_db.php");
 $query = mysqli_query($db,"INSERT INTO `egresos` (`id`, `fechalim`, `servicio`, `cuenta`, `banco`, `monto`, `situacion`) VALUES 
 (NULL, '$fecha', '$servicio', '$cuenta', '$banco', '$monto', '$situacion')");
	
		if($query) {
				//echo 'Se ha registrado con exito';
				
				echo ' <script language="javascript">alert("Egreso registrado con éxito");</script> ';
				echo "<script>location.href='../vistas/movimientos.php'</script>";
				mysql_close($link);
			}else{
			echo ' <script language="javascript">alert("error al Egreso recibo");</script> ';
			echo "<script>location.href='../vistas/movimientos.php'</script>";
		}

?> 