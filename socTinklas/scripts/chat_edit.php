<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location: ../views/chat.php");
}
require_once("../db_connection.php");

if($_POST){
    try{
        $postid = $_POST['postid'];
        $post = $_POST['post'];
        

        $sql = "UPDATE messages SET message = '$post' WHERE id='$postid'";
        $query = $conn->prepare($sql);
        $result = $query->execute();
        if($result){
            header("Location: ../views/chat.php ");        
    }
}catch(PDOException $e){
    echo "Failed: ". $e->getMessage();
}
}else{
    header("Location: ../views/chat.php"); 
}

?>