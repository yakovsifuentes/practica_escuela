<?php  
include'base_de_datos.php';
$id=$_POST['ID'];
$nombre=$_POST['NOM'];
$cantidad=$_POST['CAN'];
$talla=$_POST['TALL'];
$descripcion=$_POST['DES'];
$compra=$_POST['COM'];


$query1=mysqli_query($conn,"UPDATE `productos` SET `id_producto` = '".$id."', `nom_producto` = '".$nombre."', `cant_prod` = '".$cantidad."', `Talla` = '".$talla."', `caracteristicas` = '".$descripcion."', `precio` = '".$compra."' WHERE `productos`.`id_producto` = '".$id."';");

if(mysqli_affected_rows($conn) != 0){
echo "Se actualizaron tus datos";
header('Location: paginaproducto.php');
}else{
echo'<script type="text/javascript">
    alert("No se actualizaron datos");
    window.location.href="paginaproducto.php";
    </script>';
}
?>  