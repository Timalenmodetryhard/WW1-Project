<?php

class Router
{
    public static function route()
    {
        require BASE_PATH . '/app/routes.php';

        // Récupérer l'URI sans les paramètres de requête
        $requestUri = $_SERVER['REQUEST_URI'];
        $parsedUrl = parse_url($requestUri);
        $path = isset($parsedUrl['path']) ? trim($parsedUrl['path'], "/") : '';

        // Utiliser le chemin sans les paramètres pour la logique de routage
        if (array_key_exists($path, routes)) {
            $controller = routes[$path][0];
            $method = routes[$path][1];
            $controllerClass = 'App\\Controllers\\' . $controller; // Utilisez l'espace de noms correct

            if (file_exists(BASE_PATH . '/app/controller/' . $controller . '.php')) {
                require_once BASE_PATH . '/app/controller/' . $controller . '.php';
                if (class_exists($controllerClass)) {
                    $class = new $controllerClass();
                    if (method_exists($class, $method)) {
                        $class->$method();

                        include_once BASE_PATH . '/app/view/footer.php';
                        exit;
                    }
                } else {
                    throw new Exception("Class $controllerClass not found");
                }
            }
        }

        http_response_code(404);
        include BASE_PATH . '/app/view/404.php';
    }
}

