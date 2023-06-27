<?php
//instructions
//adds a new post to a simple table within a MySQL database and redirects to viewBlog.php
session_start();
require_once("php/config.php");
//$_POST["title"]
//add post into table in sql
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $blogtitle = $_POST["title"];
    $post = $_POST["blog"];
    $sql = "INSERT INTO posts (Stitle, Spost, Stime)
    VALUES ('$blogtitle', '$post', CURRENT_TIMESTAMP)";
    
    //try需不需要if
    if ($conn->query($sql) === TRUE) {
        //jump to view blogs page
        header("location: viewBlog.php");
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //************** */
    //要的
    mysqli_close($conn);
    //************* */
}


?>