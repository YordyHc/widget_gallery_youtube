<?php
require_once 'app/Controller/VideoController.php';

$request = $_SERVER['REQUEST_URI'];

$request = strtok($request, '?');

if ($request == '/' || $request == '/widget_youtube/') {
    $controller = new VideoController();
    $controller->showVideos();  
} else if ($request == '/about') {
    echo "Página sobre nosotros";
} else {
    http_response_code(404);
    echo "Página no encontrada";
}
