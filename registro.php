<?php
require_once("clases/conexion.php");
require_once("clases/usuarios.php");

  $conexion= new conexion;
  $cnn=$conexion->getCnn();
?>
<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/style2.css" rel="stylesheet" media="screen">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="background-color:#000000;">
<div class="container">
    <font face="Courier New, Courier, monospace" color="#333333">
    <div align="center"><font size="4"><span class="txt anim-text-flow">Registro</span></font></div><br>
<div class="table-responsive">
<form action="insertRegistro.php" method="POST">
  <div align="center">
    <table  class="table-condensed " align="center" width="50%" eight="50%">
    <tr class="success">
      <td><div align="left"><font color="#FFFFFF">Nombre de login</font></div></td>
      <td><div align="left">
        <input type="text" name="usuLog" required>
      </div></td>
      </tr>
    <tr>
      <td><div align="left"><font color="#FFFFFF">Nombre</font></div></td>
      <td><input type="text" name="usuNom" required></td>
      <tr>
        <td><div align="left"><font color="#FFFFFF">Apellido</font></div></td>
        <td><input type="text" name="usuApe" required></td>
        <tr>
          <td><div align="left"><font color="#FFFFFF">Contrasena</font></div></td>
          <td><input type="password" name="usuPass" required></td>
        <tr>
          <td><div align="left"><font color="#FFFFFF">DNI Usuario</font></div></td>
          <td><input type="number" name="dniUsu" required></td>
        <tr>
          <td><div align="left"><font color="#FFFFFF">Telefono Usuario</font></div></td>
          <td><input type="number" name="telefonoUsu" required></td>
        <tr>
          <td><div align="left"><font color="#FFFFFF">Direccion usuario</font></div></td>
          <td><input type="text" name="direccionUsu" required></td>
        <tr>
          <td><div align="left"><font color="#FFFFFF">Codigo Postal</font></div></td>
          <td><input type="number" name="codPostalUsu" required></td>
        <tr>
          <td><div align="left"><font color="#FFFFFF">Emial Usuario</font></div></td>
          <td><input type="email" name="emailUsu" required></td>
        <tr>
          <td><div align="left"><font color="#FFFFFF">Fecha  Alta</font></div></td>
          <td><input type="text" name="fecAltaUsu" value="<?php echo date('Y-m-d')?>" readonly></td>
        <tr>
        <tr><td colspan="3"><input type="submit" name="enviar" value="Agregar" class="btn btn-light"></td></tr>
    </tr>
  </table>
  </div>
  </div>
  <div align="center"><a href="login.php" class="btn btn-danger">Volver</a></div>
</form>
</div>
</font>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/move.js"></script>
</body>
</html>
