
<?php
session_start();
	require("../datos/connect_db.php");

	$username=$_POST['mail'];
	$pass=$_POST['pass'];

	// $sql2=mysqli_query($db,"SELECT * FROM login WHERE email='$username'");
	// if($f2=mysqli_fetch_array($sql2)){
	// 	if($pass==$f2['pasadmin']){
	// 		$_SESSION['id']=$f2['id'];
	// 		$_SESSION['user']=$f2['user'];
	// 		$_SESSION['pasadmin']=$f2['pasadmin'];
	// 		echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
	// 		echo "<script>location.href='../vistas/admin.php'</script>";
		
	// 	}
	// }


	$sql=mysqli_query($db,"SELECT * FROM login WHERE email='$username'");
	if($f=mysqli_fetch_array($sql, MYSQLI_ASSOC)){
		if($pass==$f['password'] && $f['pasadmin'] == ''){
			$_SESSION['id']=$f['id'];
			$_SESSION['user']=$f['user'];
			echo '<script>alert("Bienvenido '.$_SESSION['user'].' ")</script> ';
			echo "<script>location.href='../index.php'</script>";
		}else{
			if($pass==$f['pasadmin']){
				$_SESSION['id']=$f['id'];
				$_SESSION['user']=$f['user'];
				$_SESSION['pasadmin']=$f['pasadmin'];
				echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
				echo "<script>location.href='../vistas/admin.php'</script>";
		
			}else{
				echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
		
				echo "<script>location.href='../index.php'</script>";	
			}
			
		}
	}else{
		
		echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
		echo "<script>location.href='../index.php'</script>";	

	}

?>