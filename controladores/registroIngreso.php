<?php

	$codigorecibo=$_POST['codigorecibo'];
	$femicion=$_POST['femicion'];

	$renta=$_POST['renta'];
	$agua=$_POST['agua'];
	$luz=$_POST['luz'];
	$comunes=$_POST['comunes'];
	$situacion=$_POST['situacion'];

 require("../datos/connect_db.php");
 $query = mysqli_query($db,"INSERT INTO `ingresos` (`id`, `numrecibo`, `fechaemision`, `montorenta`, `valoragua`, `valorluz`, `gastoscomunes`, `situacion`) VALUES 
 (NULL, '$codigorecibo', '$femicion', '$renta', '$agua', '$luz', '$comunes', '$situacion')");
	
		if($query) {
				//echo 'Se ha registrado con exito';
				
				echo ' <script language="javascript">alert("Recibo registrado con éxito");</script> ';
				echo "<script>location.href='../vistas/movimientos.php'</script>";
				
			}else{
			echo ' <script language="javascript">alert("error al ingresar recibo");</script> ';
			echo "<script>location.href='../vistas/movimientos.php'</script>";
		}

	
?>