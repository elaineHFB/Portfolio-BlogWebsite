<?php
// login and redirect to addEntry.pnp
session_start();

// Check if the user is already logged in, if yes then redirect him to add post
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: addPost.php");
    exit;
}

require_once("php/config.php");

$email = $password = "";
$email_err = $password_err = $login_err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // 
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users";
        
        mysqli_select_db( $conn, 'ecs417' );
        $mysqli = mysqli_query( $conn, $sql );
        if(! $mysqli )
        {
            die('cant read data: ' . mysqli_error($conn));
        }

        $count = 0;
        while($row = mysqli_fetch_assoc($mysqli))
        {
            if($row['email'] == trim($_POST["email"]) && $row['password'] == trim($_POST["password"])){
                $count++;
            }
        }
        if($count == 1){
            // Password is correct, so start a new session
            session_start();

            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;                            
            
            // Redirect user to add post
            header("location: addPost.php");
        }
        else{
            $login_err = "Invalid email or password.";
        }

        mysqli_free_result($mysqli);
    }
    mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href = "css/reset.css" rel = "stylesheet"/>
        <link href = "css/form.css" rel = "stylesheet"/>
        <title>Login</title>
    </head>

    <body>
        
        <header>
            <nav>
                <h1 id="heading"><a href="index.php">Fang Shu Li</a></h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </header>
<fieldset>          
        <div id="container">
        
            <h2>Login</h2>
            <span class="feedback">
                <?php if(!empty($login_err)){ echo "$login_err";} ?>
            </span>
            
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                          

                <div class="form-row">
                    <input type="email" name="email" placeholder="Email" id="email" value="<?php echo $email; ?>"><br>
                    <span class="feedback"><?php echo $email_err; ?></span>
                </div>
                <div class="form-row">
                    <input type="password" name="password" placeholder="Password" id="password" ><br>
                    <span class="feedback"><?php echo $password_err; ?></span>
                </div>

                <div class="form-row">
                    <input type="submit" name="Login" value="Login">
                </div>
                
                
            </form>
        </div>
</fieldset>

    </body>
</html>
