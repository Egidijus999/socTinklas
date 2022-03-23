<?php
$servername="localhost";
$username="root";
$password="";
$database="socTinklas";
try {
    $conn=new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to Db ";
}catch(PDOException $e){
    echo "Conection failed: ".$e->getMessage();
}
?>