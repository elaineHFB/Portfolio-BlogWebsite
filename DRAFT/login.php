<?php
// login and redirect to addEntry.pnp
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: addEntry.pnp");
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

// Validate credentials
if(empty($email_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT id, email, password FROM users WHERE email = ?";
    
    if($stmt = mysqli_prepare($mysqli, $sql)){
        // Bind variables to the prepared statement as parameters, "s" is String type
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        
        // Set parameters
        $param_email = $email;
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Store result
            mysqli_stmt_store_result($stmt);
            
            // Check if email exists, if yes then verify password
            if(mysqli_stmt_num_rows($stmt) == 1){                    
                // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $username, $email, $hashed_password);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)){
                        // Password is correct, so start a new session
                        session_start();
                        
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;                            
                        
                        // Redirect user to welcome page
                        header("location: welcome.php");
                    } else{
                        // Password is not valid, display a generic error message
                        $login_err = "Invalid email or password.";
                    }
                }
            } else{
                // email doesn't exist, display a generic error message
                $login_err = "Invalid email or password.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}

// Close connection
mysqli_close($mysqli);

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
        
        <!--回头把link删了-->
        <header>
            <h1 id="heading"> <a href="index.html">Fang Shu Li</a> </h1>
        </header>
        
        <div class="container">
            <h2>Login</h2>
            
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            <fieldset>

                <div class="form-row">
                    <input type="email" name="email" placeholder="Email" id="email"><br>
                    <span class="invalid-feedback"><?php echo $email_err; ?></span>
                </div>
                <div class="form-row">
                    <input type="password" name="password" placeholder="Password" id="password"><br>
                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                </div>

                <div class="form-row">
                    <input type="submit" name="Login" value="Login">
                </div>
                
            </fieldset>
            </form>
        </div>
    </body>
</html>
