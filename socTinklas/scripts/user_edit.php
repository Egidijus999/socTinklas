<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location: login.php");
}
require_once '../db_connection.php';

if($_POST){
    try {
        $userid = $_POST['userid'];
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET name = '$firstName', lastName = '$lastName', email = '$email' WHERE id='$userid'";
        $query = $conn->prepare($sql);
        $result = $query->execute();
        if($result){
            header("Location: ../views/users.php");
        }

    } catch(PDOException $e) {
        echo "Update failed: ". $e->getMessage();
    }
} else {
    header("Location: ../");
}
?>