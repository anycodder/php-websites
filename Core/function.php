<?php

use Core\Response;

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";


    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN ){
    if(! $condition){
        abort($status);     //you are not authorized to view it   403->FORBİDDEN
    }

}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}


function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true); //id güvence altına alma sor chat gbtye / birde session_regenerate_id üzerine gelince görevi göstersin
}

function logout()
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
?>