<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Programación Orientada a Objetos</title>
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
                    <div class="col-sm-8"><h2>Agregar registro a <b>Gastos</b></h2></div>
                    <div class="col-sm-4">
                        <a href="../gastos.php" class="btn btn-info add-new" style="margin-top: 20px;float: right;background: linear-gradient(60deg, #f00, #7b019b);border: none;"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("databaseg.php");
				$gastos= new Database();
				if(isset($_POST) && !empty($_POST)){
					$fech = $gastos->sanitize($_POST['fech']);
					$mont = $gastos->sanitize($_POST['mont']);
					$type = $gastos->sanitize($_POST['type']);
					
					$res = $gastos->create($fech, $mont, $type);
					if($res){
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudieron insertar los datos";
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
					<label>Fecha:</label>
					<input type="date" name="fech" id="fech" class='form-control' maxlength="100" required>
				</div>

				<div class="col-md-6">
					<label>Monto:</label>
					<input type="number" name="mont" id="mont" class='form-control' maxlength="100" required>
				</div>

				<div class="col-md-12">
					<label>Tipo:</label>
					<input type="text" name="type" id="type" class='form-control' maxlength="100" required>
				</div>

				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success" style="margin-top: 15px;background: linear-gradient(60deg, #f00, #7b019b);border: none;">Guardar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            