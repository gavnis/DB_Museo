<?php
	if (isset($_GET['id_muestra'])){
		$id_muestra=intval($_GET['id_muestra']);
	} else {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Museo de Bellas Artes Mar del Plata</title>
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
                    <div class="col-sm-8"><h2>Editar Muestra</h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("database.php");
				$muestra = new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$fecha = $muestra->sanitize($_POST['fecha']);
					$direccion = $muestra->sanitize($_POST['direccion']);
					$id_muestra=intval($_POST['id_muestra']);
					$res = $muestra->update($fecha, $direccion,$id_muestra);
					if($res){
						$message= "Datos actualizados";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_muestra=$muestra->single_record($id_muestra);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Fecha:</label>
					<input type="date" name="fecha" id="fecha" class='form-control' maxlength="100" required  value="<?php echo $datos_muestra->nombre;?>">
					<input type="hidden" name="id_muestra" id="id_muestra" class='form-control' maxlength="100"   value="<?php echo $datos_muestra->id_muestra;?>">
				</div>
				<div class="col-md-6">
					<label>Dirección:</label>
					<input type="text" name="direccion" id="direccion" class='form-control' maxlength="100" required  value="<?php echo $datos_muestra->direccion;?>">
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            