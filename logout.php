<?php
/*require_once("class/lineaPrestamo.php");
require_once("class/conexion.php");
require_once("class/carritoLibros.php");
session_start();
$conexion=new conexion;
$cnn=$conexion->getCnn();
if(isset($_SESSION['ocarritoLibros'])){
foreach($_SESSION["ocarritoLibros"]->GetoLineasLibros() as $i=>$p)
{

 				echo $libroID=$p->getLibroID();
 				echo $p->getDescripcionLibro();
				echo $cantLibro=$p->getCantidad(); echo "<br>";

				$sql="SELECT * FROM libros WHERE libroID=$libroID";
				$rs=mysqli_query($cnn,$sql) or die (mysqli_error($sql));
				$fila=mysqli_fetch_array($rs);
				$libroID=$fila['libroID'];
				$stocku=$fila['stock']+$cantLibro;
				$sql2="UPDATE libros SET stock=$stocku WHERE libroID='$libroID'";
				$rs2=mysqli_query($cnn,$sql2) or die (mysqli_error($sql2));



 }

   session_unset();
   session_destroy();
   header("location:index.php");
 } else {*/

 session_start();
 session_unset();
 session_destroy();
 header("location:login.php");

 //}
?>
