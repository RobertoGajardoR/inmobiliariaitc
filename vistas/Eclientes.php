<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
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
<div class="inicio">			
<h1 style="margin-left: 110px;">Gestionar Clientes</h1>   
			
			<div id="ECliente" >
	<form method="post" action="" ><center>
	 <?php include("../datos/connect_db.php")?>
		<?php
		 $id = $_GET["id"]; 	
			$sql=("SELECT * FROM clientes WHERE id = $id ");
				$query=mysqli_query($db,$sql);        
     		?>
     		 <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Editar Registro</b></legend>
    	
    			<label style=""><b>Numero recibo: </b></label>
      <input type="text" name="numrecibo" value="<?=$row["numrecibo"];?>" required placeholder=""  readonly="readonly" /></br></br>	
  	
    	
    			<label style=""><b>ID Cliente: </b></label>
      <input type="text" name="id_cliente" value="<?=$row["id"];?>" required placeholder=""  readonly="readonly" /></br></br>	
    	<label style=""><b>Código inmueble: </b></label>
		<select required name="codigo" value >
  	
		<?php 
    	
      $sql1=(" SELECT * FROM inmuebles WHERE NOT EXISTS (SELECT * FROM clientes WHERE inmuebles.Codigoinmueble=clientes.Codigoinmueble)");
     $query1=mysqli_query($db,$sql1);  
    
			 ?>
       <option value="<?=$row["Codigoinmueble"];?>"><?=$row["Codigoinmueble"];?></option>
       <?php 
       
       while($row1=mysqli_fetch_array($query1, MYSQLI_ASSOC)){ ?>
       <option value="<?=$row1["Codigoinmueble"];?>"><?=$row1["Codigoinmueble"];?></option>        
   	<?php } ?>
   	</select></br></br>    

    	
  		
    <label style=""><b>Nombre: </b></label>
      <input type="text" name="nombre" value="<?=$row["nombre"];?>" required placeholder="" /></br></br>
 
    
      <label style=""><b>Apellidos: </b></label>
      <input type="text" name="apellidos" value="<?=$row["apellidos"];?>"  required placeholder=""/></br></br>
      
      <label style=""><b>RUT: </b></b></label>
      <input type="text" name="rut" value="<?=$row["rut"];?>" required placeholder="" /></br></br>
  
   <label style=""><b>Sexo: </b></b></label>
      <input type="radio" name="sexo" value="Hombre" 
		  <?php 
       if($row['sexo']=="Hombre" ) {
      echo "checked='checked'";
		}
       ?>       
      /> Hombre
<input type="radio" name="sexo" value="Mujer" 
  <?php 
       if($row['sexo']=="Mujer" ) {
      echo "checked='checked'";
		}
       ?>  
/> Mujer</br></br>    
    
     <!--  <select name="id_inmueble" >
    
		<?php include("../datos/connect_db.php"); 
      $sql=("SELECT * FROM inmuebles");
				$query=mysqli_query($db,$sql); ?>
       <?php while($row2 = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
       <option value="<?=$row["id"];?>" 
       <?php 
       if($row['id_inmueble']==$row2["id"] ) {
      echo "selected";
}
       ?>
        ><?=$row2["id"];?></option> 
   	<?php } ?>
   	</select></br></br> 
  -->
<?php } ?>
      <input   type="submit" name="submit" value="actualizar" class="btn btn-primary" /></br></br><a href="clientes.php" class="btn btn-danger" >cancelar actualización</a>
		
   	</fieldset>
   	
		</form></center>
		</div>
     <?php
		if(isset($_POST['submit'])){
			require("../controladores/actualizarcliente.php");
		}
	?>
	</div>
	<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>