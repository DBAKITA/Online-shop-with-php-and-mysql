<?php
require_once('files/functions.php');

$email = trim($_POST ['email']);
$password = trim($_POST ['password']);

if( loginuser($email,$password)) {
    alert('success', 'login successful');
    header('Location:account-orders.php');
    die();
} else  {
        alert('danger', 'You entered a wrong username or password');
        header ('Location: login.php');
        die();
}

