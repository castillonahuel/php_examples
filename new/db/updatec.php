<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:../compras.php");
	}
?>
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
                    <div class="col-sm-8"><h2>Editar <b>Compra</b></h2></div>
                    <div class="col-sm-4">
                        <a href="../compras.php" class="btn btn-info add-new" style="margin-top: 20px;float: right;background: linear-gradient(60deg, #f00, #7b019b);border: none;"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("databasec.php");
				$compras= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$fech = $compras->sanitize($_POST['fech']);
					$prov = $compras->sanitize($_POST['prov']);
					$mont = $compras->sanitize($_POST['mont']);
					$id_compra=intval($_POST['id_compra']);
					$res = $compras->update($fech, $prov, $mont, $id_compra);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						header("location:../compras.php");
						
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
				$datos_compras=$compras->single_record($id);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Fecha:</label>
					<input type="text" name="fech" id="fech" class='form-control' maxlength="100" required  value="<?php echo $datos_compras->fech;?>">
					<input type="hidden" name="id_compra" id="id_compra" class='form-control' maxlength="100"   value="<?php echo $datos_compras->id;?>">
				</div>
				<div class="col-md-6">
					<label>Proveedor:</label>
					<input type="text" name="prov" id="prov" class='form-control' maxlength="100" required value="<?php echo $datos_compras->prov;?>">
				</div>
				<div class="col-md-12">
					<label>Monto:</label>
					<textarea  name="mont" id="mont" class='form-control' maxlength="255" required><?php echo $datos_compras->mont;?></textarea>
				</div>
				
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success" style="margin-top: 15px;background: linear-gradient(60deg, #f00, #7b019b);border: none;">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>
    </div>     
</body>
</html>                            