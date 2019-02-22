<?php
require_once("../clases/conexion.php");
require_once("../clases/usuarios.php");
session_start();
if(isset($_SESSION['usuario'])){
$conexion=new conexion();
$cnn=$conexion->getCnn();

$usuID=$_SESSION['usuario']->getUsuID();

$clave_publica=$_POST['clave_publica'];
$clave_privada=$_POST['clave_privada'];


  $sql="INSERT INTO direcciones(clave_publica, clave_privada, ID_usuario) VALUES ('$clave_publica','$clave_privada','$usuID')";
  $rs=mysqli_query($cnn,$sql) or die ("Error en la conexion");


  header("location:administraciónDirecciones.php");


} else { ?>

  <script>
  alert('No tiene Autorizacion para acceder a este sitio');
  window.location.href='../login.php';
  </script>
<?php } ?>
