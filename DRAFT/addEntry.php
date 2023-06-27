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
        <link href = "css/addpost.css" rel = "stylesheet"/>
        <title>Add Blog</title>
    </head>

    <body>
        
        <header>
            <h1 id="heading"> <a href="index.html">Fang Shu Li</a> </h1>
        </header>

        <div class="container">
            <h2>Add Blog</h2>
            <p id="notice">* Title and blog cannot be empty</p>

            <form name="addpost" action="addPost.pnp" onsubmit="stop()" method="post">
                <fieldset>
                    <div id="entertitle">   
                        <input type="text" name="title" id="title" placeholder="* Title">
                    </div>

                    <div id="enterblog">
                        <textarea name="blog" id="blog" rows="20" cols="70" placeholder="* Enter your text here"></textarea>
                    </div>

                    <div id="submit">
                        <input type="submit" name="post" value="Post">
                        <input type="reset" name="clear" value="Clear">
                    </div>  
                </fieldset>     
            </form>
        </div>

        <script>
            function stop(){
                var title = document.forms["addpost"]["title"].value;
                var blog = document.forms["addpost"]["blog"].value;
                //var date = new date();
                
                clear();

                if(title==null || title==""){
                    document.getElementById('notice').style.color="red";
                    document.getElementById('title').style.borderColor="red";
                    event.preventDefault();
                }
                
                if(blog==null || blog==""){
                    document.getElementById('notice').style.color="red";
                    document.getElementById('blog').style.borderColor="red";
                    event.preventDefault();
                }
            }
            function clear(){
                //reset
                document.getElementById('notice').style.color="black";
                document.getElementById('blog').style.borderColor="black";
                document.getElementById('title').style.borderColor="black";

            }
        </script>

    </body>
</html>
