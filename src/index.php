<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href = "css/reset.css" rel = "stylesheet"/>
        <link href = "css/style.css" rel = "stylesheet"/>
        <title>Fang Shu Li</title>
    </head>

    <body>
        <!--<li><a href="#Projects">Projects</a></li>-->     
        <header>
            <nav>
                <h1 id="heading"><a href="index.php">Fang Shu Li</a></h1>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#AboutMe">About me</a></li>
                    <li><a href="#Experience">Experience</a></li>
                    <li><a href="#Skills">Skills</a></li>
                    <li><a href="#Education">Education</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </header>
        
        <div id="main">
            <div id="welcome">
                <p>Welcome to my portfolio</p>
                <?php session_start();
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                    echo '<p><a href="logout.php">Logout</a></p>';}
                else{
                    echo '<p><a href="login.php">Login</a></p>';}
                ?>
            </div>
        </div>

        <p class="clear"></p>

        <article>
            <section id="aboutMe">
                <span><img src="images/Myphoto.JPG" alt="my photo" width="300"></span>
                <aside>
                    <a name="AboutMe"><h2>About me</h2></a>
                    <p>My name is Fang Shu Li. I'm a 20 years old 1st year university student currently studying Undergraduate Computer Science course at Queen Mary University of London.</p>
                </aside>
            </section>
            <p class="clear"></p>
            <section id="Experience">
                <div class="left">
                    <a name="Experience"><h2>Experience</h2></a>
                </div>
                <aside>
                    <table>
                        <tr>
                            <td><strong>time</strong></td>
                            <td>some experience</td> 
                        </tr>
                        <tr>
                            <td><strong>2021-current</strong></td>
                            <td>BSc FT Computer Science-Queen Mary University of London</td> 
                        </tr>
                    </table>
                </aside>
            </section>
            <p class="clear"></p>
            <section>
                <aside><a name="Skills"><h2>Skills</h2></a></aside>
                <div class="left">
                    <p>1. Java</p>
                    <p>2. HTML</p>
                    <p>3. CSS</p>
                </div>
            </section>
            <p class="clear"></p>
            <section id="Education">
                <div class="left">
                    <a name="Education"><h2>Education</h2></a>
                </div>
                <aside>
                    <table>
                        <tr>
                            <td><strong>Past</strong></td>
                            <td>High school</td> 
                        </tr>
                        <tr>
                            <td><strong>2021-current</strong></td>
                            <td>BSc FT Computer Science-Queen Mary University of London</td> 
                        </tr>
                    </table>
                </aside>
            </section>
            <p class="clear"></p>
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
