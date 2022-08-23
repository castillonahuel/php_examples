<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="./assets/form-style.css">
<script type="text/javascript" src="./assets/form-script.js"></script>
<script type="text/javascript" src="./assets/anime.min.js"></script>
</head>

<body>
<div class="page">

	<div class="container">
          <div class="left">
            <div class="login">Ingresar</div>
            <div class="eula">Bienvenido al sistema de administracion de Frigorifico Etcétera</div>
    </div>
    <div class="right">
		<svg viewBox="0 0 320 300">
            <defs>
                <linearGradient
                                inkscape:collect="always"
                                id="linearGradient"
                                x1="13"
                                y1="193.49992"
                                x2="307"
                                y2="193.49992"
                                gradientUnits="userSpaceOnUse">
                <stop
                        style="stop-color:#ff0000;"
                        offset="0"
                        id="stop876" />
                <stop
                        style="stop-color:#ff0000;"
                        offset="1"
                        id="stop878" />
            	</linearGradient>
            </defs>
            <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
    	</svg>
    	<div class="form">
			<form method="POST">
				<label for="text">Usuario</label>
				<input type="text" name="txtusuario" id="txtusuario" placeholder="Ingresar usuario" required /> 
				<label for="password">Contraseña</label>
				<input type="password" name="txtpassword" id="txtpassword" placeholder="Ingresar contraseña" required /> 
				<input type="submit" name="btningresar" id="btningresar" value="Ingresar"/>
				<input type="submit" name="btningresar" id="btningresar" value="Registrarse"/>
			</form>
		</div>
	</div>
</div>
</body>

<script src="./assets/form-script.js"></script>

</html>

<?php

session_start();
if(isset($_SESSION['nombredelusuario']))
{
	header('location: ventas.php');
}

if(isset($_POST['btningresar']))
{
	
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="users";
	
	$conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$conn)
	{
		die("No hay conexión: ".mysqli_connect_error());
	}
	
	$nombre=$_POST['txtusuario'];
	$pass=$_POST['txtpassword'];
	
	$query=mysqli_query($conn,"SELECT * from login where usuario = '".$nombre."' and password = '".$pass."'");
	$sql=mysqli_query("SELECT access FROM login WHERE usuario = '".$nombre."' and password = '".$pass."' and access = 0");
	$result = mysqli_num_rows($sql);
	$nr=mysqli_num_rows($query);
	
	if(!isset($_SESSION['nombredelusuario']))
	{
	if($nr == 1)
	{
		if($result == 1){

			echo "<script>alert('Usuario en uso');window.location= 'index.php' </script>";
		}
		else if ($result == 0){

			$_SESSION['nombredelusuario'] = $nombre;
			$_SESSION['contrausuario'] = $pass;
			header("location: ventas.php");
			$query=mysqli_query($conn,"UPDATE login SET access = 1 where usuario = '".$nombre."' and password = '".$pass."'");

		}
	}
	else if ($nr == 0)
	{
		echo "<script>alert('Usuario no existe');window.location= 'index.php' </script>";
	}
	}
	}
?>