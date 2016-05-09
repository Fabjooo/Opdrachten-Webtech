<?php
    session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hextie Products</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
   
   <?php
    
    include_once("products.inc.php");
    
        foreach($products as $key => $product): ?>
            <h2><?php echo $product['Name'] . " " . $product['Price'];?></h2>
            <img src="<?php echo $product['Foto'] ?>" alt="<?php $product['Name'] ?>">
            <a href="detail.php?product=<?php echo $key;?>" >More info</a>
        <?php endforeach;
    
    include_once('cart.inc.php');
    
    ?>
    
</body>
</html>