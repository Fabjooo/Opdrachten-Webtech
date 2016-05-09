<?php 
    $conn = new mysqli("localhost", "root", "root"); // meestal localhost maar kan ook ip-adres zijn
    
    if( $conn->connect_errno() ){
        die("Sorry boss, the database is gone.")
        
    }

?>