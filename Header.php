<!DOCTYPE html>
<?php
?>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Styl.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <header>
        <nav class="navbar">
            <div class="nav-links">
                <ul>
                <?php
                    echo $course;
                    if(empty($_SESSION["products"])){
                        echo $panier."[0]";
                    }else{
                        echo $panier."[".count($_SESSION["products"])."]";
                    }
                    ?>
                </ul>
            </div>
            <img src="img/menu-burger.png" alt="menu hamburger" class="menu-hamburger">
        </nav>
    </header>