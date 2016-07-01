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
       <script>
function desaparecerR(  ) 
{ 

        document.getElementById('TUser').style.display = 'none'; 
        document.getElementById('RUser').style.display = 'block';

}  
function aparecerR() 
{ 
        document.getElementById('TUser').style.display = 'block'; 
        document.getElementById('RUser').style.display = 'none';
} 

</script>
  </head>
<body style="width: 1250px;">
<a href="../index2.php"><img class="logo" alt="logo" src="../medios/Logo1.jpg" style="float: left; margin-left: 30px;" /><a>
<form id="login" style="float: right; margin-right: 50px ; margin-top: 50px; ">
		<label><a href="">Bienvenido <strong><?php echo $_SESSION['user'];?></strong> </a> || <a href="../controladores/desconectar.php"> Cerrar Cesión </a></label>
	
	</form>
 <?php include("../datos/connect_db.php")?>
    <h1 style="margin: 50px; width:1200px; float : left">Gestionar cuentas</h1> 
	   
    <div class="container" id="TUser" >
        <br><br>
        <table id="example" class="display" cellspacing="0" width="100%">
        <thead>           
            <tr>
                <th>ID</th>
                <th>USER</th>
                <th>PASSWORD</th>
                <th>EMAIL</th>
             <th>PASS ADMIN</th>
               
             	
                <th>Opciones</th>
            </tr>
        </thead>
        <?php
			$sql=("SELECT * FROM login");
				$query=mysqli_query($db,$sql);        
     		?>
        <tbody>
            <?php while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ ?>
            <tr>
              <td><?=$row["id"];?></td>
                <td><?=$row["user"];?></td>
                <td><?=$row["password"];?></td>
                <td><?=$row["email"];?></td>
                <td><?=$row["pasadmin"];?></td>
					
                <td>
               
               
                    <a href="EUser.php?id=<?=$row["id"];?>&ideditar=2" class="btn btn-primary">Editar</a>
                    <a href="../controlador/eliminaruser.php?id=<?=$row["id"];?>&idborrar=2" class="btn btn-danger">Eliminar</a>               	
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
   <a  onclick="desaparecerR()" class="btn btn-primary" style="margin-bottom: 30px;" >registrar nuevo user </a>
    </div>
        <div  id="RUser" style="display : none;">
 <center>
<form method="post" action="../controladores/registrouser.php" >
   	<fieldset style="width : 500px; margin : 10px 10px 10px 10px; ">
    	<legend  style=""><b>Nuevo Registro</b></legend>
   
      <label style=""><b>Nombre usuario</b></label>
      <input type="text" name="user" required placeholder="" /></br></br>
 
    
      <label style=""><b>Contraseña trabajo</b></label>
      <input type="text" name="password"   required placeholder=""/></br></br>
      
      <label style=""><b>Correo electrónico</b></b></label>
      <input type="text" name="email" required placeholder="" /></br></br>
  
  
     
      <input  onclick="desaparecer()" type="submit" name="submit" class="btn btn-primary" value="Registrar"/></br></br><a onclick="aparecerR()" class="btn btn-danger">cancelar registro</a>

   	</fieldset> 
		</form>
		</center>    
</div>
  </body>
</html>
