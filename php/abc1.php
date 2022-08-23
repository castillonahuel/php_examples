<?php
$_array=range('a', 'c');
shuffle($_array);
foreach($_array as $_clave => $_valor){
	echo $_array[$_clave];
}
?>