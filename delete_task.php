<?php 

include("db.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM task WHERE id=$id";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed");
    }
        $_SESSION['message']="Task Removed Successfully";
        $_SESSION['message_type']="danger";
        $_SESSION['arial']='info:';
        $_SESSION['link']='#info-fill';
        
        header("Location:index.php");
}

?>