<?php
//connect to table
require_once("php/config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    $sql = "INSERT INTO users (username, email, password) 
    VALUES ('$fname', '$sname', '$email', '$pass1')";
        if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href = "css/reset.css" rel = "stylesheet"/>
    <link href = "css/form.css" rel = "stylesheet"/>
    <title>Sign Up</title>
</head>
<body>
    
    <header>
        <h1 id="heading"> <a href="index.html">Fang Shu Li</a> </h1>
    </header>

    <div class="container">
        <h2>Sign Up</h2>
        <!-- echo htmlspecialchars($_SERVER["PHP_SELF"]);  -->
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">

            <!-- username -->
            <div class="form-row">
                <input type="text" name="username" placeholder="Enter username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <!-- email -->
            <!-- password -->
            <div class="form-row">
                <input type="password" name="password" placeholder="Enter password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <!-- confirm password -->
            <div class="form-row">
                <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <!-- submit reset -->
            <div class="form-row">
                <input type="submit" class="submit1" value="Submit">
                <input type="reset" class="reset2" value="Reset">
            </div>

            <p>Already have an account? <a href="login.php">Login</a></p>

        </form>
    </div>    
</body>
</html>