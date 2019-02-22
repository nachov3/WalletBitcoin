<?php
require_once("../clases/conexion.php");
require_once("../clases/usuarios.php");
session_start();

if(isset($_SESSION['usuario'])){


$conexion= new conexion;
$cnn= $conexion->getCnn();


$ID_direcciones=$_GET['ID_direcciones'];

$_pagi_sql="SELECT * FROM direcciones WHERE ID_direcciones=$ID_direcciones ";
$_pagi_result=mysqli_query($cnn,$_pagi_sql) or die (mysqli_error($_pagi_sql));
$_pagi_cuantos = 5;

foreach($_pagi_result as $fila){
 ?>
<html>
  <head>
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/style2.css" rel="stylesheet" media="screen">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  </head>
  <header>
    <?php include("../menu.php"); ?>
  <header>
  <body style="background-color:#000000;">
  <div class="container">
  <font face="Courier New, Courier, monospace" color="#333333">
  <div align="center"><font  size="4"><span class="txt anim-text-flow">Modificar Dirección</span></font></div><br>
    <div class="table table-responsive">
      <form action="updateDirecciones.php" method="POST">
        <table  class="table-condensed " align="center" width="50%" eight="50%">
          <input type="hidden" name="ID_direcciones" value="<?php echo $ID_direcciones ?>" required>
          <tr>
            <td><div align="left"><font color="#FFFFFF">Clave Pública</font></div></td>
            <td><div align="center">
              <input type="text" name="clave_publica" value="<?php echo $fila['clave_publica'] ?>" required>
            </div></td></tr>
            <tr>
              <td><div align="left"><font color="#FFFFFF">Clave Privada</font></div></td>
              <td><div align="center">
                <input type="text" name="clave_privada" value="<?php echo $fila['clave_privada'] ?>" required>
              </div></td>
            </tr>
          <tr><td colspan="13"><input type="submit" name="enviar" value="Modificar" class="btn btn-dark"></td></tr>
        </table>
        <?php } ?>
        </div>
        <div align="center"><a href="administraciónDirecciones.php" class="btn btn-danger">Volver</a></div>
        </form>
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
