<?php
$filename=basename($_SERVER['SCRIPT_FILENAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav>
        <div class="menu">  
            
           <a class="<?php echo $filename == 'index.php'?'active':''; ?>" href="index.php">HOME</a>
           <a class="<?php echo $filename == 'cocktail.php'?'active':''; ?>"href="cocktail.php">COCKTAIL</a>
           <a class="<?php echo $filename == 'mocktail.php'?'active':''; ?>"href="mocktail.php">MOCKTAIL</a>
           <a class="<?php echo $filename == 'contact.php'?'active':''; ?>"href="contact.php">CONTACT</a>
        </div>
    </nav> 
    
 
</body>
</html>