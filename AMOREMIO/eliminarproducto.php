<?php

    require_once "../crud/crud_producto.php";
    $id=$_POST['id'];

    $obj = new Crud();

    echo $obj->eliminarDatosProducto($_POST['id']);

?>