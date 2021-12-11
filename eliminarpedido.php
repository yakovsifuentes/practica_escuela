<?php 
include 'base_de_datos.php';
$id=$_GET['id'];
$query=mysqli_query($conn,"DELETE FROM pedido WHERE id_pedido='".$id."'");
if(mysqli_affected_rows($conn) != 0){
header('Location: paginapedido.php');
}else{
echo "No se pudo modificar tu registro";
}
 ?>