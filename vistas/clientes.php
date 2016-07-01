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

        document.getElementById('TCliente').style.display = 'none'; 
        document.getElementById('RCliente').style.display = 'block';

}  
function aparecerR() 
{ 
        document.getElementById('TCliente').style.display = 'block'; 
        document.getElementById('RCliente').style.display = 'none';
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
		
	<h1 style="margin-left: 110px;">Gestionar Clientes</h1>    
	
			 <?php include("../datos/connect_db.php"); ?>
    <div class="container" id="TCliente" >
        <br><br>
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>           
            <tr>
                <th>ID</th>
             	<th>Código inmueble</th>
             	<th>Numero recibo</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Rut</th>
             	<th>Sexo</th>
             	
                <th>Opciones</th>
            </tr>
        </thead>
        <?php
			$sql=("SELECT * FROM clientes");
				$query=mysqli_query($db,$sql);        
     		?>
        <tbody>
            <?php while($row = mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?=$row["id"];?></td>
					<td><?=$row["Codigoinmueble"];?></td>
					<td><?=$row["numrecibo"];?></td>
                <td><?=$row["nombre"];?></td>
                <td><?=$row["apellidos"];?></td>
                <td><?=$row["rut"];?></td>
					<td><?=$row["sexo"];?></td>
					
                <td>
                    <a href="Eclientes.php?id=<?=$row["id"];?>&action=edit" class="btn btn-primary">Editar</a>   
                    <a href="javascript:;" onclick="aviso('../controladores/eliminarCliente.php?id=<?=$row["id"];?>&idborrar=2'); return false;" class="btn btn-danger" >Eliminar</a>
                    <a href="../reportes/reporte_recibos.php?codigo=<?=$row["numrecibo"];?>" target="_blank" class="btn btn-success">generar recibo</a>            	
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
   <a  onclick="desaparecerR()" class="btn btn-primary" style="margin-bottom: 30px;" >Registrar nuevo Cliente </a>
       <a  href="../reportes/reporte_clientes.php" target="_blank" class="btn btn-success" style="margin-bottom: 30px;" >Generar lista clientes</a>
    </div>
     <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    

<div  id="RCliente" style="display : none;"><center>
 
<form name="form" method="post" action="../controladores/registroCliente.php" >
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Nuevo Registro</b></legend>
    
   
      <label style=""><b>Nombre: </b></label>
      <input type="text" name="nombre" required placeholder="" /></br></br>
 
    
      <label style=""><b>Apellidos: </b></label>
      <input type="text" name="apellidos"   required placeholder=""/></br></br>
      
      <label style=""><b>RUT: </b></b></label>
      <input type="text" name="rut" id="txtRut"  required placeholder="" /></br></br>
   <label style=""><b>Sexo: </b></b></label>
      <input required type="radio" name="sexo" value="Hombre" /> Hombre
<input required type="radio" name="sexo" value="Mujer" /> Mujer</br></br>
   <label style=""><b>Código inmueble: </b></b></label>
      
 <select name="id_inmueble">
		<?php 
    
      $sql1=(" SELECT * FROM inmuebles WHERE NOT EXISTS (SELECT * FROM clientes WHERE inmuebles.Codigoinmueble=clientes.Codigoinmueble)");
      $query1=mysqli_query($db,$sql1); 
    
			 ?>
       <?php 
    
       while($row1=mysqli_fetch_array($query1, MYSQLI_ASSOC)){ ?>
       
       <option value="<?=$row1["Codigoinmueble"];?>"><?=$row1["Codigoinmueble"];?></option>        
   	<?php } ?>
   	</select></br></br>    

     
      <input    type="submit" name="submit" class="btn btn-primary" value="Registrar"/></br></br><a onclick="aparecerR()" class="btn btn-danger">cancelar registro</a>

   	</fieldset> 
		</form>   </center> 
	
</div>    
	</div>
	<div class="piepag"><h5>Copyright © 2015. InmobiliariaITC es un producto de tu imaginacion.</h5><p><a href="#">Aviso legal</a> | <a href="#">Politica de privacidad</a></p></div>
</body>
</html>
