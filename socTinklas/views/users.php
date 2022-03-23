<?php 
session_start();
if(!isset($_SESSION['userid'])){
    header("Location: login.php");
}
include '../layout/header.php';
require_once '../db_connection.php';

try{
    $sql = "SELECT * FROM users";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();
} catch (PDOException $e) {
    echo "Select failed: ". $e->getMessage();
}
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                    Hello, <?php echo $_SESSION['userid']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Users list</h5>
                    <table class="table table-striped">
                        <tr>
                            <th>Nick</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($result as $user){
                            echo "<tr><td>".$user['nick']."</td><td>".$user['name']."</td><td>".$user['lastName']."</td>
                            <td>".$user['email']."</td><td>".$user['created']."</td><td>".$user['Updated']."</td>
                            <td>
                            <a class='btn btn-warning' href='user_edit.php?userid=".$user['user_id']."'>Edit</a>
                            <a class='btn btn-danger' href='../scripts/user_delete.php?userid=".$user['user_id']."'>Delete</a>
                            </td>
                            </tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="card-footer text-muted">                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../layout/footer.php' ?>