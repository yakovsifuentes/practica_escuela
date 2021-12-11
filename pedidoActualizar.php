<?php  
include'base_de_datos.php';

$id=$_POST['ID'];
$idProducto=$_POST['IDPROD'];
$fecha=$_POST['FECHA'];
$cantidad=$_POST['CANTIDAD'];
$status=$_POST['STATUS'];

$query1= mysqli_query($conn,"UPDATE `pedidos` SET `id_producto`='".$idProducto."', `Fecha`='".$fecha."', `cantidad`='".$cantidad."', `status`='".$status."' WHERE `Id_pedido`='".$id."'");

if(mysqli_affected_rows($conn) != 0){
echo "Se actualizaron tus datos";
header('Location: paginapedido.php');
}else{
echo'<script type="text/javascript">
    alert("No se actualizaron datos");
    window.location.href="paginaproducto.php";
    </script>';
}
?>  
