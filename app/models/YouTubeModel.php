<?php

require_once 'config.php';


class YouTubeModel {
    private $apiKey;
    private $channelId;

    public function __construct() {
        $this->apiKey = API_KEY; 
        $this->channelId = CHANNEL_ID;
    }

    public function get_dat_videos(){
        $maxResults = 30; 
        $url = "https://www.googleapis.com/youtube/v3/search?key=$this->apiKey&channelId=$this->channelId&part=snippet,id&order=date&maxResults=$maxResults";
        
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        $videos = array_filter($data['items'], fn($video) => isset($video['id']['videoId']));

        $videoIds = implode(",", array_map(fn($v) => $v['id']['videoId'], $videos));
        $statsUrl = "https://www.googleapis.com/youtube/v3/videos?key=$this->apiKey&id=$videoIds&part=statistics,contentDetails";
        $statsResponse = file_get_contents($statsUrl);
        $statsData = json_decode($statsResponse, true);

        // Mapear estadísticas a cada video
        $statsMap = [];
        foreach ($statsData['items'] as $item) {
            $id = $item['id'];
            $statsMap[$id] = [
                'views' => number_format($item['statistics']['viewCount']),
                'likes' => isset($item['statistics']['likeCount']) ? number_format($item['statistics']['likeCount']) : "N/A",
                'comments' => isset($item['statistics']['commentCount']) ? number_format($item['statistics']['commentCount']) : "N/A",
                'duration' => $this->formatYouTubeDuration($item['contentDetails']['duration'])
            ];
        }

        return array_map(function ($video) use ($statsMap) {
            $id = $video['id']['videoId'];
            return [
                'id' => $id,
                'title' => $video['snippet']['title'],
                'thumbnail' => $video['snippet']['thumbnails']['medium']['url'],
                'publishedAt' => date("d M Y", strtotime($video['snippet']['publishedAt'])),
                'views' => $statsMap[$id]['views'] ?? "N/A",
                'likes' => $statsMap[$id]['likes'] ?? "N/A",
                'comments' => $statsMap[$id]['comments'] ?? "N/A",
                'duration' => $statsMap[$id]['duration'] ?? "N/A"
            ];
        }, $videos);
    }

    public function get_profile(){
        $url = "https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics,brandingSettings&id={$this->channelId}&key={$this->apiKey}";
        
        $response = file_get_contents($url);
        $data = json_decode($response, true);
        
        $datos_perfil = [];
        if (!empty($data['items'][0])) {
            $channel = $data['items'][0];
            $datoss= [
                "id_canal" => $this->channelId,
                "nom_can" => $channel['snippet']['title'],
                'img_perfil'=> $channel['snippet']['thumbnails']['high']['url'],
                'suscriptores' => $this->redondeo($channel['statistics']['subscriberCount']),
                'cant_videos' => $this->redondeo($channel['statistics']['videoCount']),
                'cant_vistas' => $this->redondeo($channel['statistics']['viewCount']),
                'img_portada' => $channel['brandingSettings']['image']['bannerExternalUrl']."=w2560-fcrop64=1,00000000ffffffff-nd-c0xffffffff-rj-k-no"
            ];
            return $datoss;
        }else{
            return $datos_perfil;
        }
    }
    private function formatYouTubeDuration($duration) {
        preg_match('/PT(\d+H)?(\d+M)?(\d+S)?/', $duration, $matches);
        $hours = isset($matches[1]) ? (int) rtrim($matches[1], 'H') : 0;
        $minutes = isset($matches[2]) ? (int) rtrim($matches[2], 'M') : 0;
        $seconds = isset($matches[3]) ? (int) rtrim($matches[3], 'S') : 0;
    
        return ($hours ? $hours . ":" : "") . str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
    }

    public function redondeo($dato){
        if($dato >=  10000000){
            return round($dato / 1000000, 1) . 'M';
        }elseif($dato < 10000000 && $dato >= 1000000){
            return number_format($dato / 1000000, 2) . 'M';
        }elseif($dato < 1000000 && $dato >= 1000){
            return round($dato / 1000, 1) . 'K';
        }else{
            return $dato;
        }
    }
} 
