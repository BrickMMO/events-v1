<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Project</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <script src="https://kit.fontawesome.com/*******.js" crossorigin="anonymous"></script> <!-- provide your font awesome key here -->
</head>
<body>
    
    <header>
        <div class="content-wrapper container-header">
            <div class="container-header-burger">
                <img src="./images/burger.png" alt="" class="header-left" id="burger">
                <a href="https://github.com/BrickMMO" ><img src="./images/github.png" alt="" class="header-left"></a>
            </div>
            <nav>
                <ul class="menu">
                    <li><a href="https://brickmmo.com/">Home</a></li>
                    <li><a href="https://brickmmo.com/education">Education</a></li>
                    <li><a href="https://brickmmo.com/research">Research</a></li>
                    <li><a href="https://brickmmo.com/commissions">Commissions</a></li>
                    </ul>
            </nav>
                    <button class="get-started"><a href="https://brickmmo.com/get-started">Get Started</a></button>
                    <?php
                        if(isset($_SESSION['id'])){
                            echo '<li><a href="admin-logout.php" class="logout">Logout <span class="fa-solid fa-right-from-bracket"></span></a></li>';
                        }
                    ?>
                
        </div>
    </header>