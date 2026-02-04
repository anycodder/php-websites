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
    // if yes, redirect to login page //Redirect = kullanıcıyı başka bir sayfaya göndermek.
    header('location: /');
}
else{
    // if no , save one to database, and then log the user  in
    $db->query(' INSERT INTO users (email, password) VALUES (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
}

//mark that the user has logged in
login($user);

//“Bu kullanıcı artık giriş yaptı” bilgisini geçici olarak sunucuda tut demek.
//Yani kullanıcı sayfalar arasında gezerken:
//Tekrar tekrar login olmasına gerek kalmasın diye
//Kim olduğu hatırlansın diye
//özet:Session = kullanıcının giriş yaptığını geçici olarak hatırlamak için kullanılır.

header('location: /');
exit();
//neden exit kullanıyoru çünkü “Redirect’ten (header) sonra kodun devam etmesini engellemek için.”

