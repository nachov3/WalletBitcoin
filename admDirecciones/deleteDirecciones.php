<?php
require_once("../clases/conexion.php");
require_once("../clases/usuarios.php");
session_start();
if(isset($_SESSION['usuario'])){
$conexion=new conexion;
$cnn=$conexion->getCnn();



echo $ID_direcciones=$_POST['ID_direcciones']; echo"<br>";


$sql="DELETE FROM direcciones WHERE ID_direcciones='$ID_direcciones'";
$rs=mysqli_query($cnn,$sql) or die (mysqli_error($sql));


header("location:administracióndirecciones.php"); ?>

<?php } else { ?>

<script>
alert('No tiene Autorizacion para acceder a este sitio');
window.location.href='../login.php';
<?php } ?>
