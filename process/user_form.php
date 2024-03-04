<?php
require_once '../classes/User.php';


$user = new User('users');

 if(isset($_POST['btn'])){
    $username = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $user->setName($username);
    $user->setPassword($password);
    $user->setEmail($email);

    $user->register();
 }
