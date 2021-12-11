<?php   

        class Conexion{
            public function conectar(){
                $conexion = new PDO("mysql:host=localhost;dbname=AMOREMIO","root","");
                return $conexion;

                $conexion = null;
            }
        }



?>