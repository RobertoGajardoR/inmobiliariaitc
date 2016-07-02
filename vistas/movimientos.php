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
     <script src="../js/jquery-ui.js"></script>
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
    function desaparecerRI(  ) 
{ 

        document.getElementById('TIngresos').style.display = 'none'; 
        document.getElementById('RIngresos').style.display = 'block';

}  
function aparecerRI() 
{ 
        document.getElementById('TIngresos').style.display = 'block'; 
        document.getElementById('RIngresos').style.display = 'none';
} 

function desaparecerR(  ) 
{ 

        document.getElementById('TEgresos').style.display = 'none'; 
        document.getElementById('REgresos').style.display = 'block';

}  
function aparecerR() 
{ 
        document.getElementById('TEgresos').style.display = 'block'; 
        document.getElementById('REgresos').style.display = 'none';
} 

</script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    
     $( "#datepicker2" ).datepicker({dateFormat: 'yy-mm-dd'});
  });
  </script>
 <script language="JavaScript">
function aviso(url){
if (!confirm("ALERTA!! va a proceder a eliminar este registro, si desea eliminarlo de click en ACEPTAR\n de lo contrario de click en CANCELAR.")) {
return false;
}
else {
document.location = url;
return true;
}
}
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
	
	 <h1 style="margin-left: 110px;">Gestionar Ingresos</h1> 
			 <?php include("../datos/connect_db.php");?>
	   
    <div class="container" id="TIngresos">
        <br><br>
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>           
            <tr>
                <th>ID</th>
                <th>Código Recibo</th>
                <th>Fecha emisión</th>
               
             	<th>Monto renta</th>
             	<th>Agua</th>
             	<th>Luz</th>
             	<th>Gastos comunes</th>
             	<th>Situación</th>
             	
                <th>Opciones</th>
            </tr>
        </thead>
        <?php
			$sql=("SELECT * FROM ingresos");
				$query=mysqli_query($db,$sql);          
     		?>
        <tbody>
            <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
            <tr>
                <td><?=$row["id"];?></td>
                <td><?=$row["numrecibo"];?></td>
                <td><?=$row["fechaemision"];?></td>
              
					<td><?=$row["montorenta"];?></td>
					<td><?=$row["valoragua"];?></td>
					<td><?=$row["valorluz"];?></td>
					<td><?=$row["gastoscomunes"];?></td>
					<td><?=$row["situacion"];?></td>
                <td>
               
               
                    <a href="Eingresos.php?id=<?=$row["id"];?>&ideditar=2" class="btn btn-primary">Editar</a>  
                    <a href="javascript:;" onclick="aviso('../controladores/eliminarIngreso.php?id=<?=$row["id"];?>&idborrar=2'); return false;" class="btn btn-danger" >Eliminar</a>            	
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
     <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
   <a  onclick="desaparecerRI()" class="btn btn-primary" style="margin-bottom: 30px;" >Registrar nuevo recibo </a>
    </div>
    
    <div  id="RIngresos" style="display : none;"><center>
 
<form method="post" action="../controladores/registroIngreso.php" >
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Nuevo Registro</b></legend>
   <label style=""><b>Código recibo: </b></label>
        <select name="codigorecibo" >
		<?php 
      $sql=("SELECT * FROM clientes");
				$query=mysqli_query($db,$sql);  ?>
       <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
       <option value="<?=$row["numrecibo"];?>" ><?=$row["numrecibo"];?></option> 
   	<?php } ?>
   	</select></br></br> 
    
      <label style=""><b>Fecha emisión: </b></label>
      <input type="text"id="datepicker" name="femicion"   required placeholder="0000-00-00"/></br></br>

     
		
		      <label style=""><b>Monto de renta: </b></b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="renta" required placeholder="solo numeros" /></br></br>
  
	      <label style=""><b>Monto agua: </b></b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="agua" required placeholder="solo numeros" /></br></br>
  
      <label style=""><b>Monto luz: </b></b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="luz"  required placeholder="solo numeros" /></br></br>
  
        <label style=""><b>Gastos comunes: </b></b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="comunes"  required placeholder="solo numeros" /></br></br>
  
      <label style=""><b>Situación: </b></b></label>
      <select name="situacion" required >
      <option value="pagado" >pagado</option>      
		<option value="sin pagar" selected>sin pagar</option>      
      </select></br></br>

  
     
      <input  onclick="desapareceRI()" type="submit" name="submit" class="btn btn-primary" value="Registrar"/></br></br><a onclick="aparecerRI()" class="btn btn-danger">cancelar registro</a>

   	</fieldset> 
		</form>  </center>  
	</div>
	 <h1 style="margin-left: 110px;">Gestionar Egresos</h1> 
	   
    <div class="container" id="TEgresos">
        <br><br>
        <table id="example1" class="display" cellspacing="0" width="100%">
        <thead>           
            <tr>
                <th>ID</th>
                <th>Fecha pago</th>
                <th>Servicio prestado</th>
                <th>Cuenta bancaria</th>
             	<th>Banco</th>
             	<th>monto</th>
             	<th>Situación</th>
             	
                <th>Opciones</th>
            </tr>
        </thead>
        <?php
			$sql=("SELECT * FROM egresos");
				$query=mysqli_query($db,$sql);          
     		?>
        <tbody>
            <?php while($row =  mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
            <tr>
                <td><?=$row["id"];?></td>
                <td><?=$row["fechalim"];?></td>
                <td><?=$row["servicio"];?></td>
                <td><?=$row["cuenta"];?></td>
					 <td><?=$row["banco"];?></td>
					  <td><?=$row["monto"];?></td>
					  <td><?=$row["situacion"];?></td>
                <td>
               
               
                    <a href="Eegreso.php?id=<?=$row["id"];?>&ideditar=2" class="btn btn-primary">Editar</a>             	
                    <a href="javascript:;" onclick="aviso('../controladores/eliminarEgreso.php?id=<?=$row["id"];?>&idborrar=2'); return false;" class="btn btn-danger" >Eliminar</a>            	
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
     <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        
        } );
    </script>
   <a  onclick="desaparecerR()" class="btn btn-primary" style="margin-bottom: 30px;" >Registrar nuevo egreso </a>
      <a  href="../reportes/reporte_egresos.php" target="_blank" class="btn btn-success" style="margin-bottom: 30px;" >Generar lista Egresos</a>
    </div>
    
    <div  id="REgresos" style="display : none;"><center>
 
<form method="post" action="../controladores/registroegreso.php" >
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Nuevo Registro</b></legend>
   
      <label style=""><b>Fecha de pago: </b></label>
      <input type="text" id="datepicker2" name="fecha" required placeholder="0000-00-00" /></br></br>
 
    
      <label style=""><b>Servicio prestado: </b></label>
      <input type="text" name="servicio"   required placeholder=""/></br></br>
      
      <label style=""><b>Cuenta bancaria: </b></b></label>
      <input type="text" name="cuenta" required placeholder="" /></br></br>
      
        <label style=""><b>Banco: </b></b></label>
      <input type="text" name="banco" required placeholder="" /></br></br>
  
    <label style=""><b>Monto: </b></b></label>
      <input type="number" onkeypress="return isNumberKey(event)" name="monto" required placeholder="solo numeros" /></br></br>
      
    <label style=""><b>Situación: </b></b></label>
      <select name="situacion" required>
      <option value="pagado" >pagado</option>      
		<option value="sin pagar" selected>sin pagar</option>      
      </select></br></br>
      <input  onclick="desapareceR()" type="submit" name="submit" class="btn btn-primary" value="Registrar"/></br></br><a onclick="aparecerR()" class="btn btn-danger">cancelar registro</a>

   	</fieldset> 
		</form>  </center>  
	</div>
	
	
	</div>
	<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>
