<?php

//prisijungiame duomenu baze
require_once("../db_connection.php");
//gauname duomenis is formos ir sukeliame i kintamuosius
if($_POST){
    $nick = $_POST['nick'];
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
}else {   
    header("Location: ../"); 
    die;
}
//sukeliame duomenis i duomenu baze  pasitikrinam slaptazodi
if ($password==$confirmPassword){
    $password=password_hash($password, PASSWORD_BCRYPT);
} else {    
    header("Location: ../");
    die;
}
//pasidarom sql uzklausa i kuria sudesim users lenteles duomenis.. preparinam..exexutinam
try{
    $sql = "INSERT INTO users (nick, name, lastName, email, password) VALUES ('$nick', '$name', '$lastName', '$email', '$password')";
    
    $query = $conn->prepare($sql);
    $query->execute();
    header("Location: ../");
} catch(PDOException $e){
    echo "Insert failed: ". $e->getMessage();
}
?>