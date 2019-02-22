<?php
require_once("../clases/conexion.php");
require_once("../clases/usuarios.php");
session_start();

if(isset($_SESSION['usuario'])){

$conexion= new conexion;
$cnn = $conexion->getCnn();

$usuID=$_SESSION['usuario']->getUsuID();


/*
$sql="SELECT *  FROM libros";
$rs=mysqli_query($cnn,$sql) or die (mysqli_error($sql));
$fila=mysqli_fetch_array($rs);
$fila['libroID'];
*/
$_pagi_sql="SELECT * FROM direcciones WHERE ID_usuario=$usuID ";
$_pagi_result=mysqli_query($cnn,$_pagi_sql) or die (mysqli_error($_pagi_sql));
$_pagi_cuantos = 5;

require_once("../clases/paginator.inc.php");

/*$sql="SELECT * FROM libros INNER JOIN autores WHERE libros.autorID = autores.autorID";
$rs=mysqli_query($cnn,$sql) or die (mysqli_error($sql));*/

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
  <font face="Courier New, Courier, monospace">
<?php////////////////////////////////////////////////////// ?>
  <div class="table table-responsive">
  <table  class="table" align="center" width="50%" style="background-color: rgba(12, 12, 12, 0.1)">
    <tr class="active"><td colspan="2"><div align="center"><a href="frmInsertDirecciones.php"><img src="../imagenes/add.png" style="max-width: 30px; max-height=30px"></a></div></td>
    <td><div align="center"><font  size="4"><span class="txt anim-text-flow">Clave Pública</span></font></div></td>
    <td><div align="center"><font  size="4"><span class="txt anim-text-flow">Clave Privada</span></font></div></td>
    <?php
    foreach($_pagi_result as $fila)
    { ?>
    <tr>
      <td><a href="frmUpdateDirecciones.php?ID_direcciones=<?php echo $fila['ID_direcciones']?>"><img src="../imagenes/update.png" style="max-width: 30px; max-height=30px"></a></td>
      <td><a href="frmDeleteDirecciones.php?ID_direcciones=<?php echo $fila['ID_direcciones']?>"><img src="../imagenes/delete.png" style="max-width: 30px; max-height=30px"></a></td>
      <td><div align="center"><font color="#FFFFFF"><?php echo $fila['clave_publica']; ?></font></div></td>
      <td><div align="center"><font color="#FFFFFF"><?php echo $fila['clave_privada']; ?></font></div></td>
    <?php } ?>
  </table>
</div>
<div align="center">
  <font color="#FFFFFF"><?php echo"<p>".$_pagi_navegacion."</p>"; ?></font>
</div>
<div align="center"><a href="../wallet.php" class="btn btn-danger">Volver Wallet </a>
</div>
<!------------------------Exportar tablas a excel----------------------------------------->

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
