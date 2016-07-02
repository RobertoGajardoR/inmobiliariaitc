<?php
$id=$_POST['id'];
$user=$_POST['user'];
$password=$_POST['password'];
$email=$_POST['email'];
$previ=$_POST['previ'];

	include("../datos/connect_db.php");
	if ($previ=="user") {
		$sql=(" UPDATE login SET user = '$user', password = '$password', email = '$email', pasadmin = ''  WHERE login.id = '$id' " ) ;
	}else if ($previ=="admin") {
		$sql=(" UPDATE login SET user = '$user', password = '$password', email = '$email' , pasadmin = '$password' WHERE login.id = '$id' " ) ;
	}
	$query=mysqli_query($db,$sql);
	if($query) {
		echo ' <script language="javascript">alert("Registro usuario actualizado con éxito");</script> ';
		echo "<script>location.href='admin.php'</script>";
	}else {
		echo ' <script language="javascript">alert("error al actualizar usuario");</script> ';
		echo "<script>location.href='admin.php'</script>";
	}
?> 