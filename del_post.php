<?php
session_start();
include_once('db.php');

if (isset($_SESSION['user'])){
    header("location: login.php");
    return;
}
if(isset($_GET['pid'])){
    header("location: index.php");
    }else{
        $pid = $_GET['pid'];
        $sql = "DELETE FROM postd WHERE id=$pid";
        mysqli_query($db,$sql);
       header("location: index.php")
        
    }
   
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Delete Post</title>
    </head>
    <body>
        
    </body>
</html>
