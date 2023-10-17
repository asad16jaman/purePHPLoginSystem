<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbs = "asad";
$cnct = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbs) ;
if(!$cnct){
    echo "error : ". mysqli_connect_error();
}

?>