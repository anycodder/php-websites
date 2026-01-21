<?php

$routes = require 'routes.php';

function abort($code = 404)
{

http_response_code($code);

require "views/{$code}.php";

die();
}


function routerToController($uri , $routes)
{
if(array_key_exists($uri, $routes)) {
require $routes[$uri];  //router require database and *router requires controller*
}else{

abort();
}
}


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];   //sadece “yol” kısmı verilir /notes
//dd($uri);
routerToController($uri, $routes);

?>