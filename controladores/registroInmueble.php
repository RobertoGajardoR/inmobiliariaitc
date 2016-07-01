<?php
	require("../datos/connect_db.php");

	$edificio=$_POST['edificio'];
	$tipo=$_POST['tipo'];
	$numero= $_POST['numero'];
	
	$descripcion=$_POST['descripcion'];
	
	$sql=mysqli_query($db,"SELECT count(Codigoinmueble), max(Codigoinmueble) FROM inmuebles");

while ($resul=mysqli_fetch_array($sql)) {
$count=$resul[0];
$max=$resul[1];
}
if ($count==0) {
$var="I0001";
}
else  {
$var='I'.substr((substr($max,1)+10001),1);
} 
	
	$query = mysqli_query($db,"INSERT INTO `inmuebles` (`edificio`, `id`, `tipo`, `numero`, `descripcion`, `Codigoinmueble`) VALUES ('$edificio', NULL, '$tipo', '$numero', '$descripcion','$var')");
	if($query) {
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Inmueble registrado con éxito");</script> ';
				echo "<script>location.href='../vistas/inmuebles.php'</script>";
				mysql_close($link);
			}else{
			echo ' <script language="javascript">alert("error al ingresar registro");</script> ';
				echo "<script>location.href='../vistas/inmuebles.php'</script>";
		}

	
?>