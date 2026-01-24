<?php
namespace Core;
class Router
{
    protected $routes = [];
    public function get($uri , $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET'
        ];
    }
    public function post($uri , $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST'
        ];
    }
    public function delete($uri , $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'DELETE'
        ];
    }
    public function put($uri , $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PUT'
        ];
    }
    public function patch($uri , $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'PATCH'
        ];
    }
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {

        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }


}


//
// TOPLU YORUMA ALMA " COMMAND K "
//$routes = require base_path('routes.php');
//

//
//
//function routerToController($uri , $routes)
//{
//if(array_key_exists($uri, $routes)) {
//require base_path($routes[$uri]);  //router require database and *router requires controller*
//}else{
//
//abort();
//}
//}
//
//
//
//$uri = parse_url($_SERVER['REQUEST_URI'])['path'];   //sadece “yol” kısmı verilir /notes
//routerToController($uri, $routes);
//
?>