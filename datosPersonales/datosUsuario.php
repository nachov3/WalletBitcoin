<?php
require_once("../clases/usuarios.php");
session_start();
if(isset($_SESSION['usuario']))
{
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="../css/style2.css" rel="stylesheet" media="screen">
</head>
<header>
  <?php include("../menu.php") ?>
</header>
<body>
<div class="container">
  <div class="table-responsive">
      <table class="table-condensed  table-hover" align="center" width="50%">
        <tr><td colspan="2" align="center"><h4><span class="txt anim-text-flow">Datos Personales:</span></h4></td></tr>
        <tr><td width="30%"><font>Modificar Datos del Usuario</font></td><td width="20%" align="center" class="info"><a href="frmUpdateDatosUsu.php"><IMG src="../imagenes/usuario.png" style="max-width: 40px; max-height: 40px"></a></td></tr>
        <tr><td width="30%"><font>Modificar Contrasena</font></td><td width="20%" align="center" class="info"><a href="frmUpdateContrasena.php"><IMG  src="../imagenes/candado.png" style="max-width: 40px; max-height: 40px"></a></td></tr>
      </table>
  </div>
  <div align="center">
  <a href="../wallet.php" class="btn btn-danger">Volver</a>
  </div>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="../js/move.js"></script>
</body>
<br><br>
</html>

<?php } else { ?>
<script>
alert('No tiene Autorizacion para acceder a este sitio');
window.location.href='../login.php';
</script>
<?php } ?>
