<?php

    include("Bdatos.php");

    if(isset($_GET['Mun_Id'])) {

        $Mun_Id = $_GET['Mun_Id'];
        $query = "SELECT * FROM municipios WHERE Mun_Id = $Mun_Id";
        $resultadoeditar = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultadoeditar) == 1) {

            $row = mysqli_fetch_array($resultadoeditar);
            $Mun_Id = $row['Mun_Id'];
            $Name = $row['Name'];
            $Status= $row['Status'];
            $Reg_Id= $row['Reg_Id'];
            
        }
    }

    if (isset($_POST['actualizar'])) {

        $Mun_Id = $_GET['Mun_Id'];
        $Name = $_POST['Name'];
        $Status = $_POST['Status'];
        $Reg_Id = $_POST['Reg_Id'];
      

        $query = "UPDATE municipios set Name = '$Name', Status = '$Status', Reg_Id = '$Reg_Id' WHERE Mun_Id = $Mun_Id";
        mysqli_query($conexion, $query);

        $_SESSION['message'] ='region actualizada correctamente';
        $_SESSION['message_type'] = 'primary';

        header("Location:municipios.php");

    }

?>

<?php include("encabezados/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md4 mx-auto">
            <div class="card card-body">
                <form action="editar_municipios.php?Mun_Id=<?php echo $_GET['Mun_Id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="Mun_Id" value = "<?php echo $Mun_Id?>" class = "form-control" placeholder = "Edite codigo">
                        <input type="text" name="Name" value = "<?php echo $Name?>" class = "form-control" placeholder = "Edite nombre">
                        <input type="text" name="Status" value = "<?php echo $Status?>" class = "form-control" placeholder = "Edite el estado">
                        <input type="text" name="Reg_Id" value = "<?php echo $Reg_Id?>" class = "form-control" placeholder = "seleccione la region">
                    <button class= "btn btn-success" name="actualizar">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include("encabezados/footer.php")?>
