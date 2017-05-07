<?php
 session_start();
 include_once("db.php");

 if(isset($_POST['post'])){
     $title = strip_tags($_POST['title']);
     $content = strip_tags($_POST['content']);

     $title = mysqli_real_escape_string($db,$title);
     $content = mysqli_real_escape_string($db,$content);

     $date = date('l jS \of F h:i:s A');
     $sql = "INSERT into posts (title, content, date) Value ('$title', '$content' , '$date')";

     if($title == "" || $content == ""){
         echo "please complete your poste !!!";
         return;
     }
     mysqli_query($db, $sql);

     header("location: index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>My Blog</title>
    </head>
    <body>
        <form action="post.php" method="post" enctype="multipart/form-data">
         <input placeholder="title" name="title" type="text" autofocus size="48"><br/><br/>
         <textarea placeholder="Content" name="content" rows="20" cols="50" ></textarea><br/>
            <input name="post" type="submit" value="Post">
        </form>
    </body>
</html>
