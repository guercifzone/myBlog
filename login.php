<?php
session_start();

if(isset($_POST['login'])) {
    include_once("db.php");
    $username = strip_tags($_POST['user']);
     $password = strip_tags($_POST['pwd']);

     $username = stripcslashes($username);
     $password = stripcslashes($password);

     $username = mysqli_real_escape_string($username);
     $password = mysqli_real_escape_string($password);

     $password = md5($password);

     $sql = "SELECT * FROM users WHERE name = '$username' LIMIT 1";
     $query = mysqli_query($db,$sql);
     $row = mysqli_fetch_array($query);
     $id = $row['id'];
     $db_password = $row['password'];

     if($password == $db_password){
         $_SESSION['user']=$username;
         $_SESSION['id']=$id;

         header("location: index.php");
     } else{
         echo "You didn blbbllb";
     }
     
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
    </head>
    <body>
         <form action="login.php" method="POST">
        <input name="user" type="text" placeholder="Type Your Name" size="25">
         <input name="pwd" type="password" placeholder="Type Your Password" size="25">
            <input  name="login" type="submit" value="Login">
        </form>
        
    </body>
</html>
