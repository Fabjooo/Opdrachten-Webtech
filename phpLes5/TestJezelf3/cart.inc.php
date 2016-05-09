<?php
    if(isset($_SESSION['cart'])) {
        $aantal = count($_SESSION['cart']);
    }
?><h1>Products in your shopping cart:</h1>
<ul>
<?php
    if($aantal == 0)
    {
        ?> <h3>No items in your shopping cart!</h3><?php
    }
    else
    {
        foreach($_SESSION['cart'] as $p):;
        ?> <li><?php echo $p ;?></li>
        <?php endforeach;
        ?> </li> <?php
    }
?>
</ul>