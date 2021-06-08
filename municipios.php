<?php include("Bdatos.php")?>
<?php include("encabezados/header.php")?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="guardar_municipios.php" method = "POST">
                    <div class="form-group">
                        <input type="text" name = "Mun_Id" class = "form-control" placeholder = "Codigo" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name = "Name" class = "form-control" placeholder = "Nombre del municipio">
                    </div>
                    <div class="form-group">
                        <input type="text" name = "Status" class = "form-control" placeholder = "Estado">
                    </div>
                    <div class="form-group">
                        <input type="text" name = "Reg_Id" class = "form-control" placeholder = "Establezca el codigo de la region">
                    </div>
                    <input type="submit" class = "btn btn-warning btn-block" name = "guardar_municipios" value = "Guardar municipio" >
                </form>
            </div> 

            <?php if(isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden = "true">&times;</span>
                </button>
                
                </div>

            <?php  session_unset(); } ?>           

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Mun_Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Reg_Id</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    $query = "SELECT * FROM municipios";
                    $resultadomunicipios = mysqli_query($conexion, $query);

                    while($row = mysqli_fetch_array($resultadomunicipios)) { ?>

                        <tr>
                        
                            <td><?php echo $row['Mun_Id']?></td>
                            <td><?php echo $row['Name']?></td>
                            <td><?php echo $row['Status']?></td>
                            <td><?php echo $row['Reg_Id']?></td>
                            
                            <td>

                                <a href="editar_municipios.php?Mun_Id=<?php echo $row['Mun_Id']?>" class= "btn btn-success">
                                <i class="fas fa-marker"></i>
                                </a>
                                <a href="borrar_municipios.php?Mun_Id=<?php echo $row['Mun_Id']?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                                </a>
                            
                            </td>
                        
                        </tr>


                   <?php }  ?>
                

                </tbody>
            </table>
        
        
        </div>
    
    </div>

</div>



<?php include("encabezados/footer.php")?>