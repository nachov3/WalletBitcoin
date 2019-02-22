<?php
require_once("../clases/conexion.php");
require_once("../clases/usuarios.php");
session_start();

if(isset($_SESSION['usuario']))
{
$conexion=new conexion;
$usuID=$_SESSION['usuario']->getUsuID();



$sql="SELECT * FROM usuarios WHERE ID_usuario='$usuID'";
$rs=mysqli_query($conexion->getCnn(),$sql) or die("Error en la conexion");
 ?>
 <html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/style2.css" rel="stylesheet" media="screen">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<header>
  <?php include("../menu.php"); ?>
</header>
<body  style="background-color:#000000;">
<div class="container">
  <font face="Courier New, Courier, monospace">
  <div align="center"><tr><td colspan="7" align="center"><h4><span class="txt anim-text-flow">Datos Personales</span></h4></td></tr></div>
  <div class="table-responsive">
<table  class="table-condensed  table-hover" align="center" width="50%">
  <?php while($fila=mysqli_fetch_array($rs))

  {?>
  <form action="updateUsuario.php" method="post">
      <tr>
        <td><font color="#FFFFFF">login Usuario</font></td>
        <td><font color="#FFFFFF">Nombre de usuario</font></td>
        <td><font color="#FFFFFF">Apellido de Usuario</font></td>
        <td><font color="#FFFFFF">DNI Usuario</font></td>
        <td><font color="#FFFFFF">Telefono Usuario</font></td>
        <td><font color="#FFFFFF">Direccion usuario</font></td>
        <td><font color="#FFFFFF">Emial Usuario</font></td>
      </tr>
         <td><input type="text" name="loginUsu" value="<?php echo $fila['loginUsu']; ?>"></td>
         <td><input type="text" name="nombreUsu" value="<?php echo $fila['nombreUsu']; ?>"></td>
         <td><input type="text" name="apellidoUsu" value="<?php echo $fila['apellidoUsu'];?>"></td>
         <td><input type="text" name="dniUsu" value="<?php echo $fila['dniUsu']; ?>"></td>
         <td><input type="text" name="telefonoUsu" value="<?php echo $fila['telefonoUsu'];?>"></td>
         <td><input type="text" name="direccionUsu" value="<?php echo $fila['direccionUsu'];?>"></td>
         <td><input type="text" name="emailUsu" value="<?php echo $fila['emailUsu']; ?>"></td>
         <tr bgcolor="black"><td colspan="7"><input type="submit" value="Modificar" class="btn btn-light"></td></tr>
      </tr>
   </form>
<?php } ?>
</table>
</div><br>
<div align="center">
<a href="datosUsuario.php" class="btn btn-danger">Volver</a>
</div>
</div>
<script  src="../js/move.js"></script>
</body>
</html>

<?php } else { ?>
<script>
alert('No tiene Autorizacion para acceder a este sitio');
window.location.href='../login.php';
</script>
<?php } ?>
