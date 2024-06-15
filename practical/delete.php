<?php
    session_start();
    include("conn.php");
    $id = $_GET['id'];
    $userprofile = $_SESSION['user_name'];
    if($userprofile){}
    else{ header('location:login.php');}

    $query = "DELETE FROM form where id ='$id'";
    $data = mysqli_query($conn,$query);
    if($data)
    {
        echo "<script>alert('Record Deleted')</script>";
        header("location:display.php");
    }
    else echo"Failed to delete";
?>