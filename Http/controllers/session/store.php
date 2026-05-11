<?php

//use Core\App; h.ç.s
use Core\Authenticator;
//use Core\Database; h.ç.s
use Core\Session;
use Http\Forms\LoginForm;

//$db = App::resolve(Database::class); h.ç.s



$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);


if (!$signedIn) {
    $form->error(
        'email', 'No matching account found for that email address and password.'
    )->throw();
}

redirect('/');

//Normalde
//return redirect('login') işe yarardı ama error gibi spesik bir problem var
//return view('session/create.view.php', [
//    'errors' => $form->errors()
//]);