<?php
//instructions
// if loggedin: asks the user to post a blog entry and use addPost.pnp to submit
// if not: redirect to login.pnp
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    require_once("php/config.php");
}
else{
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href = "css/reset.css" rel = "stylesheet"/>
        <link href = "css/form.css" rel = "stylesheet"/>
        <title>Add Blog</title>
    </head>

    <body>
        
        <header>
            <nav>
                <h1 id="heading"><a href="index.php">Fang Shu Li</a></h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
<fieldset>
        <div id="container">
            <h2>Add Blog</h2>
            <p id="notice">* Title and blog cannot be empty</p>

            <form name="addpost" action="addEntry.php" onsubmit="stop()" method="post">
                
                    <div class="form-row">   
                        <input type="text" name="title" id="title" placeholder="* Title">
                    </div>

                    <div class="form-row">
                        <textarea name="blog" id="blog" rows="20" cols="70" placeholder="* Enter your text here"></textarea>
                    </div>

                    <div class="form-row">
                        <input type="submit" name="post" value="Post">
                        <input type="reset" onclick="return confirm_reset()" name="clear" value="Clear">
                        <!-- <Button type="reset" onclick="return confirm_reset()" name="clear" value="Clear">reset</button> -->
                    </div>  
                 
            </form>  
        </div>
        </fieldset>  

        <!-- js! -->
        <script src="js/addPost.js"></script>

    </body>
</html>
