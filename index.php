<?php
// Include Smarty library
require_once 'vendor/autoload.php';
require_once 'classes/User.php';
require_once 'utilities/Sanitize.php';

// Create Smarty instance
$smarty = new Smarty();
$smarty->setTemplateDir('templates');

$user = new User('users');

// Initialize error messages array
$errors = [];

if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if(empty($name)) {
        $errors['name'] = 'Please enter your name.';
    }else {
        $validatedUsername = Sanitize::validateUsername($name);
        if($validatedUsername === false){
            $errors['name'] = 'Username must be alphanumeric and between 3-20 characters.';
        } else {
            $name = $validatedUsername; // Update username with sanitized value
        }
    }
    if(empty($password)) {
        $errors['password'] = 'Please enter your password.';
    }else if(!Sanitize::validatePassword($password)){
        $errors['password'] = 'Password must not be less than 8 and should contain any mixture of small and uppercase letter and numbers';
    }
    if(empty($email)) {
        $errors['email'] = 'Please enter your email.';
    } else if (!Sanitize::sanitizeEmail($email)){
        $errors['email'] = 'Invalid email setup';
    } else if ($user->checkEmailExists($email)) {
        $errors['email'] = 'Email already exists. Please use a different email.';
    }

    // If there are no validation errors, proceed with user registration
    if(empty($errors)) {
    $user->setName($name);
    $user->setPassword($password);
    $user->setEmail($email);

    $reg_status = $user->register();
        if($reg_status){
        $smarty->assign('successMessage', 'User registered successfully.');
        }else{
            $smarty->assign('errorMessage', 'Failed to register user.');
        }
    }else{

        $smarty->assign('name', $_POST['name']);
        $smarty->assign('email', $_POST['email']);

        // Pass validation errors to Smarty template
        $smarty->assign('errors', $errors);
    }
 }



// Display the template
$smarty->display('register.tpl');
