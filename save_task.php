<?php


include("db.php");

if(isset($_POST["save_task"])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query= "INSERT INTO  task(title,description) VALUES ('$title', '$description')";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Died");
    }

    $_SESSION['message']='Task Saved Succesfully';
    $_SESSION['message_type']='success';
    $_SESSION['arial']='Success:';
    $_SESSION['link']='#check-circle-fill';
    header("Location:index.php");
}
?>