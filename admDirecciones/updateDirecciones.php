<?php
  require_once("../clases/conexion.php");
  session_start();
  if(isset($_SESSION['usuario'])){
  $conexion=new conexion;
  $cnn=$conexion->getCnn();



  $ID_direcciones=$_POST['ID_direcciones'];


  $sql="UPDATE direcciones SET clave_publica='$_POST[clave_publica]', clave_privada='$_POST[clave_privada]' WHERE ID_direcciones='$ID_direcciones'";
  $rs=mysqli_query($cnn,$sql) or die (mysqli_error());


 header("location:administraciónDirecciones.php"); ?>

<?php } else { ?>

<script>
alert('No tiene Autorizacion para acceder a este sitio');
window.location.href='../login.php';
</script>
<?php } ?>
