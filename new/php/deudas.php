<?php

header('Content-Type: application/json');

$server="localhost";
$user="root";
$pass="";
$db="sistema";
$total = 0;
$data = array();
$conn = new mysqli($server, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT ticket,mayores,premay,menores,premen,mayoresp,premayp,menoresp,premenp,autos,preau,fecha FROM ticket";
  $sql = 'SELECT cli, mont FROM deudas';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {

        $data[] = $row;
    }
    //echo 'total $' .$total. '';
} else {
    echo "0 results";
}
$conn->close();
print json_encode($data);
?>