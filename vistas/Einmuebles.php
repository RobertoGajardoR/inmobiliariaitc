<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:../index.php");
}
?>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href=".../favicon.ico">
<meta charset="utf-8">
<title>InmobiliariaITC</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" >
	<link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery.dataTables.css">
       <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script>

</script>
</head>
<body>
	<img class="logo" alt="logo" src="../medios/Logo1.jpg" />
	<form class="login">
      <?php
      if (@!$_SESSION['pasadmin']) {
        ?>

        <label><a href="#">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href="../controladores/desconectar.php"> Cerrar Cesión </a></label>
        <?php
      }else{
        ?>
          <label><a href="../vistas/admin.php">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href="../controladores/desconectar.php"> Cerrar Cesión </a></label>
        <?php

      } ?>
	</form>
	<ul class="clase-1">

		<li><a href="../index.php" >inicio</a></li>
		<li><a href="edificios.php" >edificios</a></li>
		<li><a href="inmuebles.php" >inmuebles</a></li>
		<li><a href="clientes.php" >clientes</a></li>
		<li><a href="movimientos.php" >movimientos</a></li>

	</ul>
<div class="inicio" >
		
			
		<h1 style="margin-left: 110px;">Gestionar Inmuebles</h1> 
			
			<div id="EInmueble" ><center>
	<form method="post" action="" >
	 <?php include("../datos/connect_db.php")?>
		<?php
		 $id = $_GET["id"]; 	
			$sql=("SELECT * FROM inmuebles WHERE id = $id ");
				$query=mysqli_query($db,$sql);        
     		?>
     		 <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Editar Registro</b></legend>
    	
   
    			<label style=""><b>ID Inmueble: </b></label>
      <input type="text" name="id_inmueble" value="<?=$row["id"];?>" required placeholder=""  readonly="readonly" /></br></br>	
  	    <label style=""><b>Nombre de edificio: </b></label>
  	     <input type="text" name="edificio" value="<?=$row["edificio"];?>" required placeholder=""  readonly="readonly" /></br></br>	
 
  	
  		
  	    <label style=""><b>Tipo: </b></label>
 
      <input required type="radio" name="tipo" value="Local" 
        <?php 
       if($row['tipo']=="Local" ) {
      echo "checked='checked'";
		}
       ?> 
      /> Local
<input required type="radio" name="tipo" value="Oficina" 
  <?php 
       if($row['tipo']=="Oficina" ) {
      echo "checked='checked'";
		}
       ?> 
/> Oficina
    <input required type="radio" name="tipo" value="Piso" 
      <?php 
       if($row['tipo']=="Piso" ) {
      echo "checked='checked'";
		}
       ?> 
    /> Piso</br></br>
    
      <label style=""><b>Numero: </b></b></label>
      <input type="text" name="numero" value="<?=$row["numero"];?>" required placeholder="" /></br></br>
  
   <label style=""><b>Descripción: </b></b></label>
      <input type="text" name="descripcion" value="<?=$row["descripcion"];?>" required placeholder="" /></br></br>
 
<?php } ?>
      <input   type="submit" name="submit" value="actualizar" class="btn btn-primary" /></br></br><a href="inmuebles.php" class="btn btn-danger" >cancelar actualización</a>
		
   	</fieldset>
   	
		</form></center>
		</div>
     <?php
		if(isset($_POST['submit'])){
			require("../controladores/actualizarinmueble.php");
		}
	?>
</div>
	<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>
s