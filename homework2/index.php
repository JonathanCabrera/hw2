<?php
    include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Homework 2: </title>
    </head>
    <style>
        @import url("css/styles.css");
    </style>
    <body> 
    <img src="img/banner.png" alt="tic tac toe" class="center">

        <div id="main">
            
            <?php
                play();
            ?>
            
            <form>
                <input type="submit" value="Play Again!"/>
            </form>
            
        </div>
    </body>
</html>
