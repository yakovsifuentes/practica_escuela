<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/estilos_login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMOREMIO</title>
</head>
<body>
    
<section class="form-login">
    <h5>Inicio de Sesion</h5>
    <form method = "POST" action="login.php">
       
        <input class="texto" type="text" placeholder ="&#128100; Ingrese su Usuario" name="usuario" autocomplete="off" required>    

        <input class="texto" type="password" placeholder ="&#9919; Ingresar Contraseña" name="contraseña" autocomplete="off" required>

        <input class="buttons" type="submit" value="Iniciar Sesion">


        <?php
          $valida="contraseña o usuario incorrecto";
          $dbhost = "localhost";
          $dbuser = "root";
          $dbpass = "";
          $dbname = "amoremioboutique";
          $us="listo";

            $conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbname);
              if (!$conn) 
              {
                die("No hay conexión: ".mysqli_connect_error());
              }
                $nombre = $_POST["usuario"];
                $pass = $_POST["contraseña"];

                $query = mysqli_query($conn,"SELECT usuario, contraseña FROM usuarios WHERE usuario = '".$nombre."' and contraseña = '".$pass."'");
                $nr = mysqli_num_rows($query);

                if($nr == 1){
                    header("Location: paginaprincipal.html");
                }else if ($nr == 0) 
                 {
                    echo "<div style = 'color:red' align = 'center'>El usuario o contraseña son incorrectos </div>";
                }

?>
    </form>
</section> 

</body>

</html>