<?php
$numrecibo=$_POST['numrecibo'];
$id_cliente=$_POST['id_cliente'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$rut=$_POST['rut'];
$sexo= $_POST['sexo'];
$codigo= $_POST['codigo'];

	include("../datos/connect_db.php");
	 require("validarut.php");
          if (valida_rut($rut)== false)
             {
             echo ' <script language="javascript">alert("Ingrese un RUT valido");</script> ';
				echo "<script>location.href='clientes.php'</script>";
             } else {
	
	$sql=(" UPDATE clientes SET  nombre = '$nombre', apellidos = '$apellidos', rut = '$rut' , sexo = '$sexo', Codigoinmueble = '$codigo'    WHERE clientes.id = '$id_cliente' " ); 
	$query=mysqli_query($db,$sql);
	if($query) {
		echo ' <script language="javascript">alert("Registro cliente actualizado con éxito");</script> ';
		echo "<script>location.href='clientes.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al registrar cliente");</script> ';
		echo "<script>location.href='clientes.php'</script>";
	}
	}
?> 