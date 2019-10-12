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
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Añadir Visitantes</h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$visitantes= new Database();
				if(isset($_POST) && !empty($_POST)){
					$nombre = $visitantes->sanitize($_POST['nombre']);
					$apellido = $visitantes->sanitize($_POST['apellido']);
					$dni = $visitantes->sanitize($_POST['dni']);
					$telefono = $visitantes->sanitize($_POST['telefono']);
					$fecha_nac = $visitantes->sanitize($_POST['fecha_nac']);
					
					$res = $visitantes->create($nombre, $apellido, $dni, $telefono, $fecha_nac);
					if($res){
						$message= "Guardardo";
						$class="alert alert-success";
					}else{
						$message="Error al Guardarr";
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
					<label>Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Apellido:</label>
					<input type="text" name="apellido" id="apellido" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>DNI:</label>
					<input type="text" name="dni" id="dni" class='form-control' maxlength="255" required>
				</div>
				<div class="col-md-6">
					<label>Teléfono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15" required >
				</div>
				<div class="col-md-6">
					<label>Fecha de Nacimiento:</label>
					<input type="fecha_nac" name="fecha_nac" id="fecha_nac" class='form-control' maxlength="64" required>
				
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