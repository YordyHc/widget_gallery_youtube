<?php
require_once 'app/models/YouTubeModel.php'; 

class VideoController {

    public function showVideos() {
        $youtubeModel = new YouTubeModel();
        $videos = $youtubeModel->get_dat_videos();  
        $datos = $youtubeModel->get_profile();
        include $_SERVER['DOCUMENT_ROOT'] . '/widget_youtube/app/View/index.php';
    }
}
