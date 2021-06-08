<?php

    include("Bdatos.php");

    if(isset($_GET['Reg_Id'])) {

        $Reg_Id = $_GET['Reg_Id'];
        $query = "SELECT * FROM regiones WHERE Reg_Id = $Reg_Id";
        $resultadoeditar = mysqli_query($conexion, $query);

        if(mysqli_num_rows($resultadoeditar) == 1) {

            $row = mysqli_fetch_array($resultadoeditar);
            $Reg_Id = $row['Reg_Id'];
            $Name = $row['Name'];
            
        }
    }

    if (isset($_POST['actualizar'])) {

        $Reg_Id = $_GET['Reg_Id'];
        $Name = $_POST['Name'];
      

        $query = "UPDATE regiones set Name = '$Name', Reg_Id = '$Reg_Id' WHERE Reg_Id = $Reg_Id";
        mysqli_query($conexion, $query);

        $_SESSION['message'] ='region actualizada correctamente';
        $_SESSION['message_type'] = 'primary';

        header("Location:regiones.php");

    }

?>

<?php include("encabezados/header.php")?>

<div class="container p-4">
    <div class="row">
        <div class="col-md4 mx-auto">
            <div class="card card-body">
                <form action="editar_regiones.php?Reg_Id=<?php echo $_GET['Reg_Id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="Reg_Id" value = "<?php echo $Reg_Id?>" class = "form-control" placeholder = "Edite codigo">
                        <input type="text" name="Name" value = "<?php echo $Name?>" class = "form-control" placeholder = "Edite nombre">
                    
                      
                    <button class= "btn btn-success" name="actualizar">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<?php include("encabezados/footer.php")?>
