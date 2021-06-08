<?php

    include("Bdatos.php");

    if(isset($_GET['Reg_Id'])) {

        $Reg_Id = $_GET['Reg_Id'];
        $query = "DELETE FROM regiones WHERE Reg_Id = $Reg_Id";
        $resultadoborrar = mysqli_query($conexion, $query);

        if(!$resultadoborrar) {

            die("terminar busqueda");

        }


        $_SESSION['message'] = 'region borrada con exito';
        $_SESSION['message-type'] = 'ojo';

        header("Location: regiones.php");

    }



?>