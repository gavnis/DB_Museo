<?php
	if (isset($_GET['id_obras'])){
		$id_obras=intval($_GET['id_obras']);
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
                    <div class="col-sm-8"><h2>Editar listado de  las Obras</h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Volver</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("database.php");
				$obras = new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$titulo = $obras->sanitize($_POST['titulo']);
					$autor = $obras->sanitize($_POST['autor']);
					$id_obras=intval($_POST['id_obras']);
					$res = $obras->update($titulo,$autor,$id_obras);
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
				$datos_obras=$obras->single_record($id_obras);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Titulo:</label>
					<input type="text" name="titulo" id="titulo" class='form-control' maxlength="100" required  value="<?php echo $datos_obras->titulo;?>">
					<input type="hidden" name="id_obras" id="id_obras" class='form-control' maxlength="100"   value="<?php echo $datos_obras->id_obras;?>">
				</div>
				<div class="col-md-6">
					<label>Autor:</label>
					<input type="text" name="autor" id="autor" class='form-control' maxlength="100" required value="<?php echo $datos_obras->autor;?>">
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