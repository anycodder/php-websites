<?php


const BASE_PATH = __DIR__.'/../'; // bu “Projenin kök klasörü burasıdır" demek yani /Users/any/websites/demo/

require BASE_PATH . "Core/function.php";


spl_autoload_register(function ($class) {
    //Core\Database
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class); //-> ters slash düzeltme
    require base_path( "{$class}.php");
});



//require base_path("Database.php");
//require base_path("Response.php");
require base_path("Core/router.php");

// *router require database* and we will has database class
/*
 * 🔹 AUTOLOAD NEDİR?

Autoload = “Bir class lazım olunca, PHP dosyasını otomatik bulup yükleme sistemi”

Normalde şöyle yapman gerekirdi:

require 'Core/Database.php';
$db = new Database();


Ama autoload sayesinde:

$db = new Database();


yazman yeterli 😎
PHP kendi kendine Core/Database.php dosyasını yüklüyor.
 */














?>