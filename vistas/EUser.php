<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}
?>
<html lang="en">
  <head>
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <meta charset="utf-8">
    <title>administrador inmobiliaria itc</title>
    	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery.dataTables.css">
       <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>



  </head>
<body style="width: 1250px;">
<img class="logo" alt="logo" src="../datos/Logo1.jpg" style="float: left; margin-left: 30px;" />
<form id="login" style="float: right; margin-right: 50px ; margin-top: 50px; ">
		<label><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href="../controladores/desconectar.php"> Cerrar Cesión </a></label>
	
	</form>
 <?php include("../controladores/connect_db.php")?>
    <h1 style="margin: 50px; width:1200px; float : left">Gestionar cuentas</h1> 
	   

		<div id="EUser" ><center>
	<form method="post" action="" >
	 <?php include("../controladores/connect_db.php")?>
		<?php
		 $id = $_GET["id"]; 	
			$sql=("SELECT * FROM login WHERE id = $id ");
				$query=mysqli_query($db,$sql);        
     		?>
     		 <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Editar Registro</b></legend>
    	
    			<label style=""><b>ID user </b></label>
      <input type="text" name="id" value="<?=$row["id"];?>"required placeholder=""  readonly="readonly" /></br></br>	
  	
  		
  	<label style=""><b>Nombre</b></label>
      <input type="text" name="user" value="<?=$row["user"];?>" required placeholder="" /></br></br>
 
    
      <label style=""><b>contraseña</b></label>
      <input type="text" name="password" value="<?=$row["password"];?>"  required placeholder=""/></br></br>
      
      <label style=""><b>correo electrónico</b></b></label>
      <input type="text" name="email" value="<?=$row["email"];?>" required placeholder="" /></br></br>
   
<?php } ?>
      <input   type="submit" name="submit" value="actualizar" class="btn btn-primary" /></br></br><a href="admin.php" class="btn btn-danger" >cancelar actualización</a>
		
   	</fieldset>
   	
		</form>
		</center>
		</div>
     <?php
		if(isset($_POST['submit'])){
			require("../controladores/actualizaruser.php");
		}
	?>
</div>
  </body>
</html>

