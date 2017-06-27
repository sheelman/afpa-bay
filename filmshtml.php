<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
 <!--------------------------------------------------------------------------->     
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> 
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    
    
    <body>
 <!--------------------------------------------------------------------------->
        <header class="container-fluid">
            
        <?php
          include'header.php';
        ?>        
        </header> 
 <!--------------------------------------------------------------------------->
        <main>        
            
        <?php
        include 'films.php';
        ?>
        </main>
 <!--------------------------------------------------------------------------->        
        <footer>
                  
        <?php
        include 'footer.php';
        ?> 
        </footer> 
 <!--------------------------------------------------------------------------->    
    </body>
    
    
</html>
