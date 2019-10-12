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
                    <div class="col-sm-8"><h2>Añadir Actividad</h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$actividad = new Database();
				if(isset($_POST) && !empty($_POST)){
					$titulo = $actividad->sanitize($_POST['titulo']);
					$fecha = $actividad->sanitize($_POST['fecha']); 
					$hora = $actividad->sanitize($_POST['hora']);

					$res = $actividad->create($titulo, $fecha, $hora);
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
					<label>Tipo de Actividad:</label>
					<input type="text" name="titulo" id="titulo" class='form-control' maxlength="100" required >
				</div>
				<div class="col-md-6">
					<label>Fecha:</label>
					<input type="date" name="fecha" id="fehca" class='form-control' maxlength="100" required>
				</div>
				<div class="col-md-6">
					<label>Hora:</label>
					<input type="time" name="hora" id="hora" class='form-control' maxlength="100" required>
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