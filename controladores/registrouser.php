<?php

	$realname=$_POST['user'];
	$mail=$_POST['email'];
	$pass= $_POST['password'];
	$privilegios=$_POST['previ'];


	if ($privilegios=="user") {
		$sql="INSERT INTO login VALUES('','$realname','$pass','$mail','')";
	}else if($privilegios=="admin"){
		$sql="INSERT INTO login VALUES('','$realname','$pass','$mail','$pass')";
	}
	require("../datos/connect_db.php");
	$query = mysqli_query($db,$sql);
	if($query) {
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("usuario registrado con éxito");</script> ';
				echo "<script>location.href='../vistas/admin.php'</script>";
				
			}else{
			echo ' <script language="javascript">alert("error al ingresar usuario");</script> ';
			echo "<script>location.href='../vistas/admin.php'</script>";
		}

	
?>
	
?>