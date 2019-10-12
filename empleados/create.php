<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Museo de Bellas Artes Mar del Plata </title>
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
                    <div class="col-sm-8"><h2>Añadir Empleado</h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$empleados = new Database();
				if(isset($_POST) && !empty($_POST)){
					$dni = $empleados->sanitize($_POST['dni']);
					$nombre = $empleados->sanitize($_POST['nombre']); 
					$apellido = $empleados->sanitize($_POST['apellido']);

					$res = $empleados->create($dni, $nombre, $apellido);
					if($res){
						$message= "Guardardo";
						$class="alert alert-success";
					}else{
						$message="Error al Guardar";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
	
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>DNI:</label>
					<input type="text" name="dni" id="dni" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Apellido:</label>
					<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            