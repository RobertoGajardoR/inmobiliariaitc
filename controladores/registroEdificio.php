<?php

	$nombre=$_POST['nombre'];
	$ubicacion=$_POST['ubicacion'];
	$direccion= $_POST['direccion'];
	
	
	
	require("../datos/connect_db.php");
	$query = mysqli_query($db,"INSERT INTO edificios VALUES('','$nombre','$ubicacion','$direccion' )");
	if($query) {
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Edificio registrado con éxito");</script> ';
				echo "<script>location.href='../vistas/edificios.php'</script>";
				mysql_close($link);
			}else{
			echo ' <script language="javascript">alert("error al ingresar registro");</script> ';
				echo "<script>location.href='../vistas/edificios.php'</script>";
		}

	
?>