<?php

	$realname=$_POST['user'];
	$mail=$_POST['email'];
	$pass= $_POST['password'];
	$rpass=$_POST['pasadmin'];


	
	require("../datos/connect_db.php");
	$query = mysqli_query($db,"INSERT INTO login VALUES('','$realname','$pass','$mail','')");
	if($query) {
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("usuario registrado con éxito");</script> ';
				echo "<script>location.href='admin.php'</script>";
				
			}else{
			echo ' <script language="javascript">alert("error al ingresar usuario");</script> ';
			echo "<script>location.href='admin.php'</script>";
		}

	
?>
	
?>