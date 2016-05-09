<?php

    if( !empty( $_POST ) ){
        $email = $_POST['email'];
        $options = $options = [
            'cost' => 12
        ];

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
        //$password = hash('SHA256', $_POST['password']);

        // connectie
        $conn = new mysqli("localhost", "root", "root", "imd");
        if( $conn->connect_errno ){
            die("No database connection");
        }

        // query
        $query = "insert into users (email, password) values ('$email' , '$password');";
        if( $conn->query( $query ) ){
            $success = "Welcome aboard!";
        }
        
        //Bcrypt is veilig want salt er al in + duur om te berekenen, duurt lang om te berekenen
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facebook</title>
    <!-- LAYOUT BY ED BOND: http://codepen.io/edbond88/pen/yGjAu -->
    <link rel="stylesheet" href="css/facebook.css">
</head>
<body>
<section class="login-form-wrap">
    <h1>Facebook</h1>

    <?php
    if( isset($success) ){
        echo "<p class='message'>$success</p>";
    }
    ?>

    <form class="login-form" method="POST" action="">
        <label>
            <input type="email" name="email" placeholder="Email">
        </label>
        <label>
            <input required type="password" name="password" placeholder="Password">
        </label>
        <input type="submit" value="Sign up">
    </form>
    <h5><a href="#">Forgot password</a></h5>
</section>
</body>
</html>