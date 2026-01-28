<?php
namespace App\Core;

use App\Controllers\StudentController;
class Router
{
    private array $routes = [];

    public function add(string $method, string $uri, string $controller, string $function)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'function' => $function,
        ];
    }

    public function run()
    {
     $method = $_SERVER['REQUEST_METHOD'];
     $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

     foreach ($this->routes as $route) {
    
     }

     if ($method == 'GET' && $uri == '/students') {
         require_once './app/controllers/StudentController.php';
        $controller = new StudentController();
        $controller->index();
         return;
     }

          if ($method == 'GET' && $uri == '/students/create') {
                  require_once './app/controllers/StudentController.php';
        $controller = new StudentController();
        $controller->create();
         return;
     }

     http_response_code(404);
     echo "<h1>404 - Page Not Found</h1>";
     
    }

}
?>