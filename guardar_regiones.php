<?php

include ("Bdatos.php");

if (isset($_POST['guardar_regiones'])){

   $Reg_Id = $_POST['Reg_Id'];
   $Name = $_POST['Name'];
  

   $query = "INSERT INTO regiones(Reg_Id, Name) VALUES ('$Reg_Id', '$Name')";
   $resultado = mysqli_query($conexion, $query);
   
   if (!$resultado) {

        die("busqueda fallida");

    }
    
    $_SESSION['message'] = 'region guardada correctamente';
    $_SESSION['message_type'] = 'success';


    header("Location:regiones.php");

}
?>