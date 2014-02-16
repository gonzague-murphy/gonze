<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title;?></title>
    </head>
    <body>
        <h1><?php echo $title;?></h1>
        <h2><?php echo $subtitle;?></h2>
        <?php
        
        echo $content;
        ?>
        <form method="post" action="">
            <label>Pseudo :</label>
            <input type="text" name="pseudo" /><br/>
            <label>Password :</label>
            <input type="password" name="mdp" /><br/>
            <input type="submit" value="send"/>
        </form>
    </body>
</html>
