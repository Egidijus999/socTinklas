<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location: ../views/login.php");
}
include("../layout/header.php");
require_once("../db_connection.php");

if($_POST){
    $userid=$_SESSION['userid'];  
    $post = $_POST['post'];
}
try{
    $sql = "INSERT INTO messages (user_id, message) VALUES ('$userid', '$post');";
    $query = $conn->prepare($sql);
    $query->execute();
    header("Location: ../views/chat.php");
}catch(PDOException $e){
    echo "insert failed: ". $e->getMessage();
}
?>