<?php 
include'base_de_datos.php';
$query1= mysqli_query($conn,"SELECT id_producto, nom_producto, cant_prod, Talla, caracteristicas, Precio FROM productos");
if(isset($_GET['nombre_producto'])){
  $nombreProducto=$_GET['nombre_producto'];
  $query1 = mysqli_query($conn,"SELECT id_producto, nom_producto, cant_prod, Talla, caracteristicas, Precio FROM productos WHERE nom_producto like '%".$nombreProducto."%'");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

  <script src="sweetalert2.min.js"></script>
    <script type="text/javascript" src="Almacen.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
              window.location.href="eliminarProducto.php?id="+id;
              }
        else
          {
              alert("Cancelado; será redirigido a la pagina Alma");
              window.location ="paginaproducto.php";
          }
        }
</script>
  <div></div>


 <div align="center">
        <p id="header2">Almacen</p>
         <div class="btn-enviar">
        <button onclick="ActivarForm()">Ingresar Mercancia</button>

        <form method="GET" action="paginaproducto.php">
          <input type="text" name="nombre_producto" id="nombre_producto" placeholder="Ingrese nombre">
          <button type="submit">BuscarMercancia</button>
        </form>
        <button onclick="location.href='paginaproducto.php';">Limpiar Busqueda</button>
        </div>
      <table class="table-fill">
                <thead>
                    <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>cantidad</th>
                <th>Talla</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-hover">
                <?php  
                  while ($filas=mysqli_fetch_array($query1)) 
                  {
                      ?>
                      <tr>
                         <td><?php echo $filas['id_producto'] ?></td>
                         <td><?php echo $filas['nom_producto'] ?></td>
                         <td><?php echo $filas['cant_prod'] ?></td>
                         <td><?php echo $filas['Talla'] ?></td>
                         <td><?php echo $filas['caracteristicas'] ?></td>
                         <td><?php echo $filas['Precio'] ?></td>
                         <td>
                        
                         <a href="actualizarProducto.php?id=<?php echo $filas['id_producto'] ?>"><img  src="img/cargando.PNG"></a> 
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
        function BuscarMercancia(){
          var nombreProducto = document.getElementById("nombre_producto");
        }
      </script>
        <center>
     <div style="display:none" id="formulario" >
      <form method="post" action="agregarMer.php">

        <!--<label for="cantidad">ID</label>-->
        <input type="hidden" placeholder="Ingrese ID" name="ID" required>
        <label>Nombre del producto</label>
        <input type="text" placeholder="Ingrese Nombre" name="NOM" required>
        <label>Tallas</label>

        <select name="TALL" required>
          <option value="">Elija la Talla</option>
          
            <option value="Ch">Ch</option>
            <option value="M">M</option>
            <option value="G">G</option>           
         
       </select>

        <label>Cantidad</label>
        <input type="number" placeholder="CantidadDeArticulo" name="CAN" required>
        <label>Descripcion</label>
        <input type="text" placeholder="Ingrese Descripcion" name="DES" required>
        <label>Precio</label>
        <input type="number" placeholder="Precio" name="PRE" required>
        <input type="submit" value="I N G R E S A R" >
        <input type="submit" onclick="location.href='paginaproducto.php';" value="C A N C E L A R" />
      </form>
      </center>

      <div align="center">
         <div class="btn-enviar">
          <button onclick="location.href='paginaprincipal.html';">Regresar</button>        
        </div>
      </div> 
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>