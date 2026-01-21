<?php


const BASE_PATH = __DIR__.'/../'; // bu “Projenin kök klasörü burasıdır" demek yani /Users/any/websites/demo/

require BASE_PATH."function.php";


spl_autoload_register(function ($class) {
    require base_path( "Core/{$class}.php");
});
//require base_path("Database.php");
//require base_path("Response.php");
require base_path("router.php");

// *router require database* and we will has database class














?>