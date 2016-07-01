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

        document.getElementById('TInmueble').style.display = 'none'; 
        document.getElementById('RInmueble').style.display = 'block';

}  
function aparecerR() 
{ 
        document.getElementById('TInmueble').style.display = 'block'; 
        document.getElementById('RInmueble').style.display = 'none';
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
		<label><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href="desconectar.php"> Cerrar Cesión </a></label>
	
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
			 <?php include("../datos/connect_db.php");?>
	   
    <div class="container" id="TInmueble">
        <br><br>
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>           
            <tr>
                <th>Nombre de edificio</th>
                <th>ID inmueble</th>
                <th>Código inmueble</th>
                <th>Tipo</th>
                <th>Numero</th>
            
             	<th>Descripción</th>
             	
                <th>Opciones</th>
            </tr>
        </thead>
        <?php
			$sql=("SELECT * FROM inmuebles");
				$query=mysqli_query($db,$sql);        
     		?>
        <tbody>
            <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
            <tr>
                <td><?=$row["edificio"];?></td>
                <td><?=$row["id"];?></td>
                 <td><?=$row["Codigoinmueble"];?></td>
                <td><?=$row["tipo"];?></td>
                <td><?=$row["numero"];?></td>
		
					<td><?=$row["descripcion"];?></td>
					
                <td>
               
               
                    <a href="Einmuebles.php?id=<?=$row["id"];?>&ideditar=2" class="btn btn-primary">Editar</a>
                    <a href="javascript:;" onclick="aviso('../controladores/eliminarInmueble.php?id=<?=$row["id"];?>&idborrar=2'); return false;" class="btn btn-danger" >Eliminar</a>            	
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
   <a  onclick="desaparecerR()" class="btn btn-primary" style="margin-bottom: 30px;" >Registrar nuevo inmueble </a>
    <a  href="../reportes/reporte_inmuebles.php" target="_blank" class="btn btn-success" style="margin-bottom: 30px;" >Generar lista inmuebles</a>
    </div>
    
    <div  id="RInmueble" style="display : none;"><center>
 
<form method="post" action="../controladores/registroInmueble.php" >
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Nuevo Registro</b></legend>
   
      <label style=""><b>Nombre edificio: </b></label>
      
         <select name="edificio" required >
		<?php 
      $sql=("SELECT * FROM edificios");
				$query=mysqli_query($db,$sql); 
        while($row = mysqli_fetch_array($query)){ ?>
       <option value="<?=$row["nombre"];?>" ><?=$row["nombre"];?></option> 
   	<?php } ?>
   	</select></br></br> 
   	
      <label style=""><b>Tipo: </b></label>
 
      <input required type="radio" name="tipo" value="Local" /> Local
<input required type="radio" name="tipo" value="Oficina" /> Oficina
    <input required type="radio" name="tipo" value="Piso" /> Piso</br></br>
      <label  style=""><b>Numero: </b></b></label>
      <input type="text" name="numero" required placeholder="Ejemplo: A054" /></br></br>
  
      
   <label style=""><b>Descripción: </b></b></label>
      <input type="text" name="descripcion" required placeholder="" /></br></br>
 

     
      <input  onclick="desaparecer()" type="submit" name="submit" class="btn btn-primary" value="Registrar"/></br></br><a onclick="aparecerR()" class="btn btn-danger">cancelar registro</a>

   	</fieldset> 
		</form>  </center>  
</div>

	  
</div>
	<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>
