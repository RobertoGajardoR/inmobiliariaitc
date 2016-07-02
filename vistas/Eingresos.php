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
 	      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <SCRIPT language=Javascript>
      
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }
      
   </SCRIPT>
    <script>
  $(function() {
      $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    $( "#datepicker1" ).datepicker({dateFormat: 'yy-mm-dd'});
  });
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
	
	<div id="Eingreso" >
	<form method="post" action="" ><center>
	 <?php include("../datos/connect_db.php")?>
		<?php
		 $id = $_GET["id"]; 	
			$sql=("SELECT * FROM ingresos WHERE id = $id ");
				$query=mysqli_query($db,$sql);      
     		?>
     		 <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Editar Registro</b></legend>
    				<label style=""><b>ID: </b></label>
      <input type="text" name="id"  value="<?=$row["id"];?>" required placeholder=""  readonly="readonly" /></br></br>	
  	
    	
    	
    			<label style=""><b>Código recibo: </b></label>
      <input type="text" name="numrecibo" value="<?=$row["numrecibo"];?>" required placeholder=""  readonly="readonly" /></br></br>	
  	
    	
    			<label style=""><b>Fecha emisión: </b></label>
      <input type="text" name="femision" id="datepicker" value="<?=$row["fechaemision"];?>" required placeholder=""   /></br></br>	
  	
      
   
  		
    <label style=""><b>Monto renta: </b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="renta" value="<?=$row["montorenta"];?>" required placeholder="" /></br></br>
 
    
      <label style=""><b>Monto agua: </b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="agua" value="<?=$row["valoragua"];?>"  required placeholder=""/></br></br>
      
      <label style=""><b>Monto luz: </b></b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="luz" value="<?=$row["valorluz"];?>" required placeholder="" /></br></br>
   <label style=""><b>Gastos comunes: </b></b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="comunes" value="<?=$row["gastoscomunes"];?>" required placeholder="" /></br></br>
 <label style=""><b>Situación: </b></b></label>
      <select name="situacion" required >
      <option value="pagado" <?php 
      if ('pagado'==$row["situacion"]){
      echo "selected";
      };
      ?> >pagado</option>      
		<option value="sin pagar" <?php 
      if ('sin pagar'==$row["situacion"]){
      echo "selected";
      };
      ?> >sin pagar</option>      
      </select></br></br>
      
<?php } ?>
      <input   type="submit" name="submit" value="actualizar" class="btn btn-primary" /></br></br><a href="movimientos.php" class="btn btn-danger" >cancelar actualización</a>
		
   	</fieldset>
   	
		</form></center>
		</div>
     <?php
		if(isset($_POST['submit'])){
			require("../controladores/actualizarIngreso.php");
		}
	?>
	
	
	</div>
	<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>