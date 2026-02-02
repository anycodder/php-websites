<?php

use Core\App;
use Core\Validator;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

//validate the form input
$errors = [];

if(!Validator::email($email)){
    $errors['email'] = 'Please provide an email address.';
}

if(!Validator::string($password,7,255)){
    $errors['password'] = 'Please provide an password at least 7 characters.';
}
if(!empty($errors)){
    return view('/registration/create.view.php', [
        'errors'=>$errors
    ]);
}

$db = App::resolve(Database::class);
//check if account already exist
$user = $db->query(' select * from users where email = :email', [
    'email' => $email
])->find();

if($user){
    // if yes, redirect to login page
    header('location: /');
}
else{
    // if no , save one to database, and then log the user  in
    $db->query(' INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => $password
    ]);
}

//mark that the user has logged in
$_SESSION['user'] = [
    'email' => $email,
];

header('location: /');
exit();

