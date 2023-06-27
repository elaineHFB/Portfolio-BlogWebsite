<!DOCTYPE html>
<!--
//要有addpost和选择性登出选项
//不需要login因为addentry.pnp里面包含了,会自动跳转
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href = "css/reset.css" rel = "stylesheet"/>
        <link href = "css/viewBlog.css" rel = "stylesheet"/>
        <title>Fang Shu Li</title>
    </head>

    <body>
        <header>
            <nav>
                <h1 id="heading"><a href="index.php">Fang Shu Li</a></h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#Posts">Posts</a></li>
                    <?php
                    session_start();
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                        echo '<li><a href="logout.php">Logout</a></li>';}
                    else{
                        echo '<li><a href="login.php">Login</a></li>';}
                    ?>
                </ul>
            </nav>
        </header>  

        
        <div id="main">
            <div id="welcome">
                <p>Welcome to Post page</p>
                <p><a href="login.php">Add Post</a></p>
            </div>
        </div>

        <p class="clear"><a name="Posts"></a></p>

        <article>
            
            <?php
            require_once("php/config.php");
            // Prepare a select statement
            $sql = "SELECT Stitle, Spost, Stime FROM posts Order by Stime desc";
            
            mysqli_select_db( $conn, 'ecs417' );
            $mysqli = mysqli_query( $conn, $sql );
            if(! $mysqli ){ die('cant read data: ' . mysqli_error($conn)); }
            
            while($row = mysqli_fetch_assoc($mysqli))
            {
                echo '
                <div class = "line1">
                    <div id ="article-top-left"><span>' .$row['Stitle']. '</span></div>
                    <div id ="article-top-right"><span>' .$row['Stime']. '</span></div>
                </div>
                <div id ="article-bottom">' .$row['Spost']. '</div>
                <p class="clear"></p>';
            }
            ?>
            
        </article>  
        


        <footer>
            <nav id="footerContact">
                <ul>
                    <li><a id="email">Email: lfs_elaine@hotmail.com</a></li>
                    <li><a href="#facebook">facebook</a></li>
                    <li><a href="#linkln">linkln</a></li>
                    <li><a href="#whatsapp">whatsapp</a></li>
                </ul>
            </nav>
            <hr>
            <p>Copyright @2022 Fang Shu Li</p>
        </footer>
    </body>
</html>
