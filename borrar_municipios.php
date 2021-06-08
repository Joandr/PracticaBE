<?php

    include("Bdatos.php");

    if(isset($_GET['Mun_Id'])) {

        $Mun_Id = $_GET['Mun_Id'];
        $query = "DELETE FROM municipios WHERE Mun_Id = $Mun_Id";
        $resultadoborrar = mysqli_query($conexion, $query);

        if(!$resultadoborrar) {

            die("terminar busqueda");

        }


        $_SESSION['message'] = 'municipio borrado con exito';
        $_SESSION['message-type'] = 'danger';

        header("Location: municipios.php");

    }



?>