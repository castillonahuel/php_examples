<?php 
$_forma=$_POST['forma'];
if ($_forma == "trapecio"){
	$_h=10;
	$_bmenor=7;
	$_bmayor=6;
	$_area = ($_h*($_bmayor + $_bmenor))/2;
	echo "El area es ", " ", $_area;
}elseif($_forma == "rombo"){
	$_D = 3;
	$_d = 6;
	$_area = ($_D*$_d)/2;
	echo "El area es ", " ", $_area;
}elseif($_forma == "rectangulo"){
	$_base = 5;
	$_altura = 10;
	$_area = ($_base * $_altura);
	echo "El area es ", " ", $_area;
}else {
	echo "No ingreso una funcion";
}
?>