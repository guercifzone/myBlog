<?php
 session_start();
 include_once("db.php");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>MY Blog</title>
    </head>
    <body>
        <?php 
            require_once("nbbc/nbbc.php");
            $bbcode = new BBCode;
            $sql = "SELECT * FROM posts ORDER BY id DESC";
            $res = mysqli_query($db,$sql) or die(mysqli_error());
            $posts ="";
            if(mysqli_num_rows($res) > 0){
                while($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $content = $row['content'];
                    $date = $row['date'];

                    $admin = "<div><a href='del_post.php?pid=$id'>Delete</a>&nbsp;<a href='edit_post.php?pid=$id'>Edite</a></div>";
                    $output = $bbcode->Parse($content);
                    $posts .= "<div><he><a href='view_post.php?pid=$id'>$title</a></h2><h3>$date</h3><p>$output</p>$admin<hr /></div>";
                }
                echo $posts;
               }else{
                   echo "There are no Poste !";
           
            }

        ?>
        <a href="post.php" target="_self">post</a>
    </body>
</html>
