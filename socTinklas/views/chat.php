<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location: users.php");
}
include '../layout/header.php';
require_once("../db_connection.php");


 
try{
$sql = "SELECT *
FROM messages
JOIN users ON users.user_id=messages.user_id";
$query = $conn->prepare($sql);
$query->execute();
$result = $query->fetchAll();

}catch(PDOException $e){
    echo "Failed". $e->getMessage();
}
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header bg-success"></div>
                <div class="card-body">
                    <h5 class="card-title">Chat</h5>
                    <table class="table table-striped">
                        <tr>
                            <th>nick</th>
                            <th>post</th>
                            <th>created</th>
                            <th>action</th>                            
                        </tr>                     
                        
                        <?php
foreach($result as $user){   
    $id=$user['id']; 
          
    if($_SESSION['userid']==$user['user_id']){    
        echo "<tr><td>".$user['nick']."</td> <td>".$user['message']."</td> <td>".$user['created']."</td><td><a class='btn btn-warning' href='chat_edit.php?postid=".$user['id']."'>Edit</a></td> </tr>";
    }else {
        echo "<tr><td>".$user['nick']."</td><td>".$user['message']."</td><td>".$user['created']."</td></tr>";
    }
}
?>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    <div class="card-header bg-secondary">
                        <form action="../scripts/post.php" method="POST">
                        <input type="hidden" name="userid" value="<?php echo $result['message'];?>">
                            <textarea name="post" id="" cols="100" rows="5" 
                                placeholder="write here something..."></textarea>                            
                            <button type="submit" class="btn btn-success">Post</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>