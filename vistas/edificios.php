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
    <script>
function desaparecerR(  ) 
{ 

        document.getElementById('TEdificio').style.display = 'none'; 
        document.getElementById('REdificio').style.display = 'block';

}  
function aparecerR() 
{ 
        document.getElementById('TEdificio').style.display = 'block'; 
        document.getElementById('REdificio').style.display = 'none';
} 

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
			 <?php include("../datos/connect_db.php");?>
	   
    <div class="container" id="TEdificio">
        <br><br>
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>           
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Dirección</th>
             	
             	
                <th>Opciones</th>
            </tr>
        </thead>
        <?php
			$sql=("SELECT * FROM edificios");
				$query=mysqli_query($db,$sql);      
     		?>
        <tbody>
            <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
            <tr>
                <td><?=$row["id"];?></td>
                <td><?=$row["nombre"];?></td>
                <td><?=$row["ubicacion"];?></td>
                <td><?=$row["direccion"];?></td>
					
					
                <td>
               
               
                    <a href="Eedificios.php?id=<?=$row["id"];?>&ideditar=2" class="btn btn-primary">Editar</a>
                    <a href="javascript:;" onclick="aviso('../controladores/eliminarEdificio.php?id=<?=$row["id"];?>&idborrar=2'); return false;" class="btn btn-danger" >Eliminar</a>
               	
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
   <a  onclick="desaparecerR()" class="btn btn-primary" style="margin-bottom: 30px;" >Registrar nuevo edificio </a>
   <a  href="../reportes/reporte_edificios.php" target="_blank" class="btn btn-success" style="margin-bottom: 30px;" >Generar lista edificios</a>
    </div>
    
    <div  id="REdificio" style="display : none;"><center>
 
<form method="post" action="../controladores/registroEdificio.php" >
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Nuevo Registro</b></legend>
   
      <label style=""><b>Nombre: </b></label>
      <input type="text" name="nombre" required placeholder="" /></br></br>
 
    
      <label style=""><b>Ubicación: </b></label>
      <input type="text" name="ubicacion"   required placeholder=""/></br></br>
      
      <label style=""><b>Dirección: </b></b></label>
      <input type="text" name="direccion" required placeholder="" /></br></br>
  
     
      <input  onclick="desaparecer()" type="submit" name="submit" class="btn btn-primary" value="Registrar"/></br></br><a onclick="aparecerR()" class="btn btn-danger">cancelar registro</a>

   	</fieldset> 
		</form>  </center>  
</div>

	  
</div>
	<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>