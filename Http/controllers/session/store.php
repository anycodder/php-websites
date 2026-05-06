<?php

//use Core\App; h.ç.s
use Core\Authenticator;
//use Core\Database; h.ç.s
use Core\Session;
use Http\Forms\LoginForm;

//$db = App::resolve(Database::class); h.ç.s

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address and password.');
}



Session::flash('errors', $form->errors());

return redirect('/login');

//Normalde
//return redirect('login') işe yarardı ama error gibi spesik bir problem var
//return view('session/create.view.php', [
//    'errors' => $form->errors()
//]);