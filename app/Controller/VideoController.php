<?php
// Controlador para manejar los videos
require_once 'app/models/YouTubeModel.php'; 

class VideoController {

    // Método para cargar la vista con los videos
    public function showVideos() {
        $youtubeModel = new YouTubeModel();
        $videos = $youtubeModel->get_dat_videos();  // Obtener los videos desde el modelo
        $datos = $youtubeModel->get_profile();
        // Cargar la vista y pasar los videos
        include $_SERVER['DOCUMENT_ROOT'] . '/widget_youtube/app/View/index.php';

    }
}
