<?php
require_once('files/functions.php');

$email = trim($_POST ['email']);
$password = trim($_POST ['password']);
$password_1 = trim($_POST['password_1']);
$phone_number = trim($_POST['phone_number']);
$last_name = trim($_POST['last_name']);
$first_name = trim($_POST['first_name']);

$sql = "SELECT * FROM users WHERE email = '{$email }' ";
$res = $conn->query($sql);

if ($password != $password_1) {
    alert('danger', 'Passwords did not match.');
    header('Location: login.php');
    die();
}

if($res->num_rows > 0){
    alert('danger', 'An account with this email already exists.');
    header('Location: login.php');
    die();
}



$password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO users(
    first_name,
    last_name,
    phone_number,
    password,
    email,
    user_type    

) VALUES(
    '{first_name}',
    '{last_name}',
    '{phone_number}',
    '{password}',
    '{email}',
    '{customer}'
   
)";

if($conn->query($sql)){
    loginuser($email,$password);
    alert('success', 'account created successfully.');  
    header('Location: account-orders.php ');
    die();
   
   
} else {
    alert('danger', 'Faild to create account.');
    header('Location: login.php');
    die();
}

