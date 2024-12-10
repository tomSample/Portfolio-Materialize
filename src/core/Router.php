<?php
namespace App\Core;

class Router {
    private $routes = [];

    public function add($route, $controller, $action, $name = null) {
        $this->routes[] = [
            'route' => $route,
            'controller' => $controller,
            'action' => $action,
            'name' => $name
        ];
    }

    public function dispatch($url) {
        foreach ($this->routes as $route) {
            if ($route['route'] === $url) {
                $controllerName = 'App\\Controllers\\' . $route['controller'];
                $actionName = $route['action'];

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();

                    if (method_exists($controller, $actionName)) {
                        $controller->{$actionName}();
                    } else {
                        echo "Action non trouvée!";
                    }
                } else {
                    echo "Contrôleur non trouvé!";
                }
                return;
            }
        }
        echo "Route non trouvée!";
    }

    public function loadRoutesFromAnnotations($controllers) {
        foreach ($controllers as $controller) {
            $reflectionClass = new \ReflectionClass($controller);
            foreach ($reflectionClass->getMethods() as $method) {
                $docComment = $method->getDocComment();
                if ($docComment !== false) {
                    if (preg_match('/@Route\("([^"]+)",\s*name="([^"]+)"\)/', $docComment, $matches)) {
                        $route = $matches[1];
                        $name = $matches[2];
                        $this->add($route, $reflectionClass->getShortName(), $method->getName(), $name);
                    }
                }
            }
        }
    }
}
?>