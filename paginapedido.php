<?php 
include'base_de_datos.php';
$getPedidos = mysqli_query($conn,"SELECT 
`pedidos`.`Id_pedido` as `Id_pedido`,
`productos`.`id_producto` as `id_producto`, 
`productos`.`nom_producto` as `nom_producto`, 
  `pedidos`.`Fecha` as `Fecha`,
  `pedidos`.`cantidad` as `cantidad`, 
  `pedidos`.`status` as `status`
FROM `pedidos`
inner join `productos` on `pedidos`.`id_producto` = `productos`.`id_producto`");


$getProducts = mysqli_query($conn,"SELECT `id_producto`,`nom_producto` from `productos`");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

  <script src="sweetalert2.min.js"></script>
    <script type="text/javascript" src="Almacen.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
 
</head>
<body>
  <script type="text/javascript"> 
        function ActivarFormActualiza(id,nom,uni){ 
        var id=id;
        var nom=nom;
        var uni=uni;   
        var contenedor = document.getElementById("formulario2");   
        contenedor.style.display = "block";
        document.form2.id.value = id;
        document.form2.nom.value = nom;
        document.form2.uni.value = uni;
        return true;  
      }
      </script>
      <script type="text/javascript">
function confirmarRegistro(id)
{
   if (window.confirm("Desea eliminar el registro?") == true)
      {
      window.location.href="eliminarpedido.php?id="+id;
      }
else
   {
      alert("Cancelado; será redirigido a la pagina Alma");
      window.location ="paginapedido.php";
   }
}
</script>
      
 <div align="center">
        <p id="header2">Almacen</p>
         <div class="btn-enviar">
        <button onclick="ActivarForm()">Ingresar pedido</button>

        </div>
      <table class="table-fill">
                <thead>
                    <tr>
                <th>Nombre</th>
                <th>FECHA</th>
                <th>Cantidad</th>
                <th>STATUS</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-hover">
                <?php  
         while ($filas=mysqli_fetch_array($getPedidos)) 
         {
             ?>
             <tr>
                <td><?php echo $filas['nom_producto'] ?></td> 
                <td><?php echo $filas['Fecha'] ?></td> 
                <td><?php echo $filas['cantidad'] ?></td>
                <td><?php echo $filas['status'] ?></td>
                <td>               
                <a href="actualizarPedido.php?id=<?php echo $filas['Id_pedido']?>"><img  src="img/cargando.PNG"></a> 
                <a href="javascript:confirmarRegistro(<?php echo $filas['id_producto']?>)"><img  src="img/elimina1.PNG"></a>   
              <!-- 
                <a href="javascript:confirmarRegistro(<?php echo $filas['id_producto']?>)"><img  src="img/elimina1.PNG"></a>
                <a href="AgregarMer.php?id=<?php echo $filas['id_producto'] ?>"><img  src="img/mas.PNG"></a>
               -->
                </td>
            </tr>
             <?php  
         }
         ?>
            </tbody>
        </table>
        </div>
        <script type="text/javascript"> 
        function ActivarForm(){    
        var contenedor = document.getElementById("formulario");   
        contenedor.style.display = "block";   
        return true;  
      }
      </script>
        <center>
     <div style="display:none" id="formulario" >
      <form method="post" action="agregarpedido.php">

        <!--<label for="cantidad">ID</label>-->


        <input type="hidden" placeholder="Ingrese ID" name="IDP" required>

        <select name="IDPR" required>
          <?php
            while ($filas=mysqli_fetch_array($getProducts)){
            ?>
              <option value=<?php echo $filas['id_producto']?>><?php echo $filas['nom_producto']?></option>
              <?php
            }
            ?>
         </select>


        <label>FECHA</label>
        <input type="text" placeholder="Ingrese Fecha" name="FECHA" required>
        <label>Status</label>

        <select name="STATUS" required>
          <option value="">Elija la status </option>          
          <option value="EC">En camino </option>
          <option value="E">Entregado</option>
          <option value="V">Vendido</option>
       </select>

        
        <label>Cantidad</label>
        <input type="number" placeholder="Cantidad" name="PRE" required>
        <input type="submit" value="I N G R E S A R" >
        <input type="submit" onclick="location.href='paginapedido.php';" value="C A N C E L A R" />
      </form>
      </center>

      <div align="center">
        
         <div class="btn-enviar">
        <button onclick="location.href='paginaprincipal.html';">Regresar</button>
        
        </div>



</body>
</html>