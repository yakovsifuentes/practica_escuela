<?php 
include'base_de_datos.php';
$id=$_GET['id'];
$query1= mysqli_query($conn,"SELECT `Id_pedido`,`cantidad`,`Fecha`,`status`, `id_producto` FROM `pedidos` WHERE Id_pedido like '%".$id."%'"); 
$queryProductos=mysqli_query($conn,"SELECT `id_producto`,`nom_producto` FROM `productos`");
$getPedido= mysqli_query($conn,"
SELECT 
	`pedidos`.`Id_pedido` as `Id_pedido`,
    `productos`.`id_producto` as `id_producto`, 
	`productos`.`nom_producto` as `nom_producto`, 
    `pedidos`.`Fecha` as `Fecha`,
    `pedidos`.`cantidad` as `cantidad`, 
    `pedidos`.`status` as `status`
FROM `pedidos`
inner join `productos` on `pedidos`.`id_producto` = `productos`.`id_producto`
where `pedidos`.`Id_pedido` = '".$id."'" );

 ?>
<head>
	<meta charset="utf-8">
	<script src="sweetalert2.min.js"></script>
	<title>Actualizar pedido</title>
</head>
	<div id="titulo">
		<p id="header">Actualizar Pedido</p>
	</div>
<body> 
<!-- USERNAME INPUT -->
<?php 
while ($datos=mysqli_fetch_array($getPedido)) {
  
  ?>
  <center>
     <div class="login-box">
     <form method="post" action="pedidoActualizar.php">
        <input type="hidden" value="<?php echo $datos['Id_pedido']?>" name="ID" >

        <select name="IDPROD">
          <?php while ($datosProductos=mysqli_fetch_array($queryProductos)){ ?>            
          <option value="<?php echo $datosProductos['id_producto']?>"<?php echo $datosProductos['id_producto']==$datos['id_producto']?"selected":''?>><?php echo $datosProductos['nom_producto']?></option>
          <?php }?>
        </select>

        <label for="fecha">Fecha</label>
        <input type="text" value="<?php echo $datos['Fecha']?>" name="FECHA" required>

        <label for="status">status</label>
        <select name="STATUS" required>
          <option type="text" value="<?php echo $datos['status']?>"><?php echo $datos['status']?></option>
          <option value="EC" <?php echo($datos['status']=="EC")?'selected':''?>>En camino</option>
          <option value="E" <?php echo($datos['status']=="E")?'selected':''?>>Entregado</option>
          <option value="V" <?php echo($datos['status']=="V")?'selected':''?>>Vendido </option>
        </select>
        <label for="cantidad">Cantidad</label>
        <input type="number" value="<?php echo $datos['cantidad']?>" name="CANTIDAD" required>

        <input type="submit" value="A C T U A L I Z A R">
        <input type="submit" onclick="location.href='paginapedido.php';" value="C A N C E L A R" />
      </form>
      </center>
      <?php } ?>
      </div>      
</body>