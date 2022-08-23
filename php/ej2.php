<?php 
$_dmenor=$_POST['dmenor'];
$_dmayor=$_POST['dmayor'];
$_h=$_POST['altura'];
$_area=($_h*($_dmayor + $_dmenor))/2;
echo "El area es", " ", $_area;
?>