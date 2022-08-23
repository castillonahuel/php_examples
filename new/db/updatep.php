<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:../proveedores.php");
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
                    <div class="col-sm-8"><h2>Editar <b>Proveedor</b></h2></div>
                    <div class="col-sm-4">
                        <a href="../proveedores.php" class="btn btn-info add-new" style="margin-top: 20px;float: right;background: linear-gradient(60deg, #f00, #7b019b);border: none;"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include ("databasep.php");
				$prove= new Database();
				
				if(isset($_POST) && !empty($_POST)){
					$prov = $prove->sanitize($_POST['prov']);
					$pag = $prove->sanitize($_POST['pag']);
					$da = $prove->sanitize($_POST['da']);
					$tot = $prove->sanitize($_POST['tot']);
					$id_prov=intval($_POST['id_prov']);
					$res = $prove->update($prov, $pag, $da, $tot, $id_prov);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						header("location:../proveedores.php");
						
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
				$datos_prov=$prove->single_record($id);
			?>
			<div class="row">
				<form method="post">

				<div class="col-md-6">
					<label>Proveedor:</label>
					<input type="date" name="prov" id="prov" class='form-control' maxlength="100" required  value="<?php echo $datos_prov->prov;?>">
					<input type="hidden" name="id_pagente" id="id_pagente" class='form-control' maxlength="100"   value="<?php echo $datos_prov->id;?>">
				</div>

				<div class="col-md-6">
					<label>Pago:</label>
					<input type="number" name="pag" id="pag" class='form-control' maxlength="100" required value="<?php echo $datos_prov->pag;?>">
				</div>

				<div class="col-md-6">
					<label>Deuda Anterior:</label>
					<input type="number" name="da" id="da" class='form-control' maxlength="15" required value="<?php echo $datos_prov->da;?>">
				</div>


				<div class="col-md-12">
					<label>Total:</label>
					<input type="number" name="tot" id="tot" class='form-control' maxlength="64" required value="<?php echo $datos_prov->tot;?>">	
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