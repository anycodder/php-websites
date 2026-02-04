<?php

session_start();
const BASE_PATH = __DIR__.'/../'; // bu “Projenin kök klasörü burasıdır" demek yani /Users/any/websites/demo/

require BASE_PATH . "Core/function.php";


spl_autoload_register(function ($class) {
    //Core\Database
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class); //-> ters slash düzeltme
    require base_path( "{$class}.php");
});

require base_path( 'bootstrap.php' );


/*
 //require base_path("Database.php");
//require base_path("Response.php");
//require base_path("Core/Router.php");
*/

$router = new \Core\Router();   //nitilize ettkik ama natığım yetmedi uraya
$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];
$router->route($uri,$method);


/*
 * // *router require database* and we will has database class
 * 🔹 AUTOLOAD NEDİR?

Autoload = “Bir class lazım olunca, PHP dosyasını otomatik bulup yükleme sistemi”

Normalde şöyle yapman gerekirdi:

require 'Core/Database.php';
$db = new Database();


Ama autoload sayesinde:

$db = new Database();

PHP kendi kendine Core/Database.php dosyasını yüklüyor.
 */














?>