<?php
require_once("../clases/conexion.php");
require_once("../clases/usuarios.php");
session_start();
if(isset($_SESSION['usuario'])){

  $conexion= new conexion;
  $cnn=$conexion->getCnn();
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
<body style="background-color:#000000;">
<div class="container">
    <font face="Courier New, Courier, monospace" color="#333333">
    <div align="center"><font color="orange" size="4"><span class="txt anim-text-flow">Agregar Direcciones</span></font></div><br>
<div class="table table-responsive">
<form action="insertDirecciones.php" method="POST">
  <div align="center">
    <table  class="table-condensed " align="center" width="50%" eight="50%">
    <tr class="success">
      <td><div align="left"><font color="#FFFFFF">Clave Pública</font></div></td>
      <td><div align="left">
        <input type="text" name="clave_publica" required>
      </div></td>
      </tr>
    <tr>
      <td><div align="left"><font color="#FFFFFF">Clave Privada</font></div></td>
      <td><input type="text" name="clave_privada" required></td>
    <tr>
        <tr><td colspan="3"><input type="submit" name="enviar" value="Agregar" class="btn btn-dark"></td></tr>
    </tr>
  </table>
  </div>
  </div>
  <div align="center"><a href="administraciónDirecciones.php" class="btn btn-danger">Volver</a></div>
</form>
</div>
</font>
<script  src="../js/move.js"></script>
</body>
</html>
<?php } else { ?>

<script>
alert('No tiene Autorizacion para acceder a este sitio');
window.location.href='../login.php';
</script>
<?php } ?>
