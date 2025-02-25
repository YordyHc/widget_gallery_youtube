<?php
// Incluir el archivo de configuración y los controladores
require_once 'app/Controller/VideoController.php';

// Obtener la solicitud actual (ruta)
$request = $_SERVER['REQUEST_URI'];  // La URI solicitada

// Eliminar cualquier query string (por ejemplo, ?id=123)
$request = strtok($request, '?');

// Rutas definidas manualmente
if ($request == '/' || $request == '/widget_youtube/') {
    // Si es la raíz, cargar la vista predeterminada
    $controller = new VideoController();
    $controller->showVideos();  // Método para mostrar los videos
} else if ($request == '/about') {
    // Ruta "about"
    echo "Página sobre nosotros";
} else {
    // Si no se encuentra la ruta, mostrar un error 404
    http_response_code(404);
    echo "Página no encontrada";
}
