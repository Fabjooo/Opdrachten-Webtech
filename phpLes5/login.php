<?php

    function canLogin( $p_username, $p_password ){
        $conn = new mysqli("localhost", "root", "root", "imd");
        
        $sql = "select * from users
                where email = '".$conn->real_escape_string($p_username)."' ";
        
        $result = $conn->query($sql);
        if( $result->num_rows == 1 ){
            $user = $result->fetch_assoc();
            //print_r($user);
            $hash = $user['password'];
            
            if(password_verify($p_password, $hash) ){
                return true;
            }
            else{
                return false;
            }
        }else{
            return false;
        }

   if( !empty( $_POST ) ){
       $username = $_POST['email'];
       $password = $_POST['password'];
       if( canLogin( $username, $password ) ){

           session_start();
           $_SESSION['loggedin'] = "yes";

           // redirect to registratie.php
           header('location: registratie.php');

       }
       else{
           // feedback
           $error = "Woops, cannot login.";
       }
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
            if( isset($error) ) {
                echo "<p class='error'>$error</p>";
            }
          ?>
          <form class="login-form" method="POST" action="">
            <label>
              <input type="email" name="email" placeholder="Email">
            </label>
            <label>
              <input required type="password" name="password" placeholder="Password">
            </label>
            <input type="submit" value="Login">
          </form>
          <h5><a href="#">Forgot password</a></h5>
        </section>
</body>
</html>