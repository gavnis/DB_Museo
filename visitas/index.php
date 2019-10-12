<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Museo Mar de Bellas Artes Mar del Plata</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Registrar Visitante<b></b></h2></div>
                    <div class="col-sm-4">
                        <a href="create.php" class="btn btn-info add-new" style="margin: 1px"><i class="fa fa-plus"></i> Añadir vistante</a>
                        <a href="../index.php" class="btn btn-info add-new" style="margin: 1px"><i class="fa fa-arrow-left"> </i> Regresar</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>D.N.I</th>
						<th>Telefono</th>
                        <th>Fecha de Nacimiento</th>
                    </tr>
                </thead>
				<?php 
				include ('database.php');
				$vistante = new Database();
				$listado=$vistante->read();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
						$id_visitantes=$row->id_visitantes;
						$nombre=$row->nombre;
						$apellido=$row->apellido;
						$dni=$row->dni;
						$telefono=$row->telefono;
                        $fecha_nac=$row->fecha_nac;
				?>
					<tr>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $apellido;?></td>
                        <td><?php echo $dni;?></td>
						<td><?php echo $telefono;?></td>
                        <td><?php echo $fecha_nac;?></td>
                        <td>
						    <a href="update.php?id_visitantes=<?php echo $id_visitantes;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="delete.php?id_visitantes=<?php echo $id_visitantes;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
					}
				?>
                    
                    
                          
                </tbody>
            </table>
        </div>
    </div>     
</body>
</html>                            