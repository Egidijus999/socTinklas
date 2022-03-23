<?php 
$nick = $name = $lastName = $email = $password = $confirmPassword = "";
if ($_POST){
    $nick = $_POST['nick'];
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
} else {
    header("Location:../index.php");
    exit;
}
echo $nick.$name.$lasName.$email.$password.$confirmPassword;
if($password == $confirmPassword){
    $password = password_hash($password, PASSWORD_BCRYPT);
    echo $password;
} else {
    header("Location: ../../socTinklas/?username=".$username."&email=".$email."&error=Passwords+do+not+match");
    //header("Location: ../socTinklas/?error=Passwords+do+not+match");
    exit;
}
header("Location: ../../socTinklas/views/welcome.php?username=".$username);
?>