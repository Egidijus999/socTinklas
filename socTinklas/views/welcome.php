<?php 
session_start();
if(!isset($_SESSION['userid'])){
    header("Location: login.php");
}
include '../layout/header.php'; //warning,, jei yra klaidų
//require ''; //Fatal Error, jei yra klaidų
if($_GET){
    echo "Welcome ".$_GET['username']."!";
}
?>
<?php include '../layout/footer.php'; ?>