<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}
?>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
<meta charset="utf-8">
<title>InmobiliariaITC</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" >
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery.dataTables.css">
       <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
 
</head>
<body>
	<img class="logo" alt="logo" src="../medios/Logo1.jpg" />
	<form class="login">
		<label><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href="../controladores/desconectar.php"> Cerrar Cesión </a></label>
	
	</form>
	<ul class="clase-1">
	
		<li><a href="../index.php" >inicio</a></li>
		<li><a href="edificios.php" >edificios</a></li>
		<li><a href="inmuebles.php" >inmuebles</a></li>
		<li><a href="clientes.php" >clientes</a></li>
		<li><a href="movimientos.php" >movimientos</a></li>

	</ul>
<div class="inicio" >
		 <h1 style="margin-left: 110px;">Gestionar Edificios</h1> 
			
			<div id="Eedificio" ><center>
	<form method="post" action="" >
	 <?php include("../datos/connect_db.php")?>
		<?php
		 $id = $_GET["id"]; 	
			$sql=("SELECT * FROM edificios WHERE id = $id ");
				$query=mysqli_query($db,$sql);          
     		?>
     		 <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Editar Registro</b></legend>
    	
    			<label style=""><b>ID edificio: </b></label>
      <input type="text" name="id_edificio" value="<?=$row["id"];?>" required placeholder=""  readonly="readonly" value="<?=$row["id_vehiculo"];?>"/></br></br>	
      
    
      <label style=""><b>Nombre: </b></b></label>
      <input type="text" name="nombre" value="<?=$row["nombre"];?>" required placeholder="" /></br></br>
  	
  		
  	<label style=""><b>Ubicación: </b></label>
      <input type="text" name="ubicacion" value="<?=$row["ubicacion"];?>" required placeholder="" /></br></br>
 
      <label style=""><b>Dirección: </b></label>
      <input type="text" name="direccion" value="<?=$row["direccion"];?>"  required placeholder=""/></br></br>
  
<?php } ?>
      <input   type="submit" name="submit" value="actualizar" class="btn btn-primary" /></br></br><a href="edificios.php" class="btn btn-danger" >cancelar actualización</a>
		
   	</fieldset>
   	
		</form></center>
		</div>
     <?php
		if(isset($_POST['submit'])){
			require("../controladores/actualizaredificio.php");
		}
	?>
			
 
</div>
	<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>