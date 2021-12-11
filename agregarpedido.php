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
$id=$_POST['IDP'];
$id2=$_POST['IDPR'];
$fecha=$_POST['FECHA'];
$status=$_POST['STATUS'];
$precio=$_POST['PRE'];
$sql=("INSERT INTO `pedidos` (`id_pedido`, `id_producto`, `status`, `Fecha`, `cantidad`) VALUES ('".$id."','".$id2."','".$status."','".$fecha."','".$precio."')");
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header('Location:paginaproducto.php');
} else {
      echo "Error: ID Duplicado  " . $sql . "<br>" . mysqli_error($conn);


}
?>

 <button type="button" onclick="location.href='paginaproducto.php'">VOLVER</button>