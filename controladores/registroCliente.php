<?php

	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$rut= $_POST['rut'];
	$sexo=$_POST['sexo'];
	$id_inmueble=$_POST['id_inmueble'];
	
 require("../datos/connect_db.php");
  require("../controladores/validarut.php");
          if (valida_rut($rut)== false)
             {
             echo ' <script language="javascript">alert("Ingrese un RUT valido");</script> ';
				echo "<script>location.href='../vistas/clientes.php'</script>";
             } else {


$sql=mysqli_query($db,"SELECT count(numrecibo), max(numrecibo) FROM clientes");

while ($resul=mysqli_fetch_array($sql)) {
$count=$resul[0];
$max=$resul[1];
}
if ($count==0) {
$var="A0001";
}
else  {
$var='A'.substr((substr($max,1)+10001),1);
} 

 
	
	$query = mysqli_query($db,"INSERT INTO clientes VALUES('','$nombre','$apellidos','$rut','$sexo', '$id_inmueble', '$var' ) ");
	if($query) {
				//echo 'Se ha registrado con exito';
				
				echo ' <script language="javascript">alert("Cliente registrado con éxito");</script> ';
				echo "<script>location.href='../vistas/clientes.php'</script>";
				mysql_close($link);
			}else{
			echo ' <script language="javascript">alert("ingrese id inmueble disponible");</script> ';
			echo "<script>location.href='../vistas/clientes.php'</script>";
		}

}	
?>