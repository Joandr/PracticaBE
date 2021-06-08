<?php

include ("Bdatos.php");

if (isset($_POST['guardar_municipios'])){

   $Mun_Id = $_POST['Mun_Id'];
   $Name = $_POST['Name'];
   $Status = $_POST['Status'];
   $Reg_Id = $_POST['Reg_Id'];
  

   $query = "INSERT INTO municipios(Mun_Id, Name, Status, Reg_Id) VALUES ('$Mun_Id', '$Name', '$Status', '$Reg_Id')";
   $resultado = mysqli_query($conexion, $query);
   
   if (!$resultado) {

        die("busqueda fallida");

    }
    
    $_SESSION['message'] = 'Municipio guardado correctamente';
    $_SESSION['message_type'] = 'success';


    header("Location:municipios.php");

}
?>