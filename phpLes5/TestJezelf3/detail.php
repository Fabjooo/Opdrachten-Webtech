<?php
    session_start();
    include_once("products.inc.php");
    $id = $_GET['product'];
    $product = $products[$id];
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail HexTie</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

    <a href="products.php">Back to all ties</a>
    <h1><?php echo $product['Name']?></h1>
    <img src="<?php echo $product['Foto'] ?>" alt="Foto HexTie">
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" id="inputfieldText" name="idForm" value="<?php echo $id; ?>">
        <input type="Submit" value="Buy now" name="verzend">
    </form>

</body>
</html>
<?php
if (isset($_POST['verzend'])) {
    if(!empty($_SESSION['cart'])){
        array_push($_SESSION['cart'], $product['Name']);
    }
    else
    {
        $_SESSION['cart']= array();
        array_push($_SESSION['cart'], $product['Name']);
    }
}
include_once("cart.inc.php"); ?>