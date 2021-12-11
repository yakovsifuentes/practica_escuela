<?php 
include 'base_de_datos.php';
$id=$_GET['id'];
$query=mysqli_query($conn,"DELETE FROM productos WHERE id_producto='".$id."'");
if(mysqli_affected_rows($conn) != 0){
header('Location: paginaproducto.php');
}else{
echo "No se pudo modificar tu registro";
}
 ?>