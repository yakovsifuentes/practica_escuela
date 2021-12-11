<?php 
include'base_de_datos.php';
$query1= mysqli_query($conn,"SELECT `id_producto`,`nom_producto`,`Talla`,`cant_prod`,`caracteristicas`,`Precio` FROM `productos` WHERE 1");
 ?>
<head>
	<meta charset="utf-8">
	<script src="sweetalert2.min.js"></script>
	<title>Actualizar Mercancia</title>
</head>
	<div id="titulo">
		<p id="header">Actualizar Mercancia</p>
	</div>
<body> 
        <!-- USERNAME INPUT -->
        <?php 
include'base_de_datos.php';
$id=$_GET['id'];
$query=mysqli_query($conn,"SELECT `id_producto`,`nom_producto`,`Talla`,`cant_prod`,`caracteristicas`,`precio` FROM `productos` WHERE `id_producto`='".$id."'" );

         while ($datos=mysqli_fetch_array($query)) 
         {
             ?>
<center>
     <div class="login-box">
      <form method="post" action="productoActualizar.php">

        <input type="hidden" value="<?php echo $datos['id_producto']?>" name="ID" >
        <label> ID: <?php echo $datos['id_producto']?></label>

        <label for="costo">Nombre del producto</label>
        <input type="text" value="<?php echo $datos['nom_producto']?>" name="NOM" required>

        <label for="costo">Tallas</label>
        <select name="TALL" required>
        <option type="text" value="<?php echo $datos['Talla']?>"><?php echo $datos['Talla']?></option>
            <option value="Ch">Ch</option>
            <option value="M">M</option>
            <option value="G">G</option>

        <label for="costo">Cantidad</label>
        <input type="number" value="<?php echo $datos['cant_prod']?>" name="CAN" required>
        <label for="costo">Descripcion</label>
        <input type="text" value="<?php echo $datos['caracteristicas']?>" name="DES" required>
        <label for="costo">Precio de Compra</label>
        <input type="number" value="<?php echo $datos['precio']?>" name="COM" required>
        <input type="submit" value="A C T U A L I Z A R">
        <input type="submit" onclick="location.href='paginaproducto.php';" value="C A N C E L A R" />
      </form>
      </center>
      <?php } ?>
      </div>
      
</body>
