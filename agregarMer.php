<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estilos_mercancia.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
  <script src="sweetalert2.min.js"></script>
    <script type="text/javascript" src="Almacen.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
	<title></title>
</head>
<body>

</body>
</html>
<?php  
include 'base_de_datos.php';
$id=$_POST['ID'];
$nombre=$_POST['NOM'];
$cantidad=$_POST['CAN'];
$talla=$_POST['TALL'];
$descripcion=$_POST['DES'];
$precio=$_POST['PRE'];
$sql=("INSERT INTO `productos` (`id_producto`, `nom_producto`, `cant_prod`, `caracteristicas`, `talla`,`precio`) VALUES ('".$id."','".$nombre."','".$cantidad."','".$descripcion."','".$talla."','".$precio."')");
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header('Location:paginaproducto.php');
} else {
      echo "Error: ID Duplicado  " . $sql . "<br>" . mysqli_error($conn);


}
?>

 <button type="button" onclick="location.href='paginaproducto.php'">VOLVER</button>